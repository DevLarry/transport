<?php 
session_start();
require('../config.php');
define('GW_UPLOADPATH', '../upload/');
if (isset($_POST['submit'])) {
    // Grab the score data from the POST
    $name = mysqli_real_escape_string($db, trim($_POST['name']));
    $email = mysqli_real_escape_string($db, trim($_POST['email']));
    $phone = mysqli_real_escape_string($db, trim($_POST['tel']));
    $make = mysqli_real_escape_string($db, trim($_POST['make']));
    $color = mysqli_real_escape_string($db, trim($_POST['color']));
    $seats = mysqli_real_escape_string($db, trim($_POST['seats']));
    $description = mysqli_real_escape_string($db, trim($_POST['description']));
    $reserved = mysqli_real_escape_string($db, trim($_POST['reserved']));
    $available = $seats-$reserved;
    $image = mysqli_real_escape_string($db, trim($_FILES['image']['name']));
    $passport = mysqli_real_escape_string($db, trim($_FILES['passport']['name']));
    // Move the file to the target upload folder
    $b_target = GW_UPLOADPATH .'bus/'. $image;
    $p_target = GW_UPLOADPATH .'driver/'. $passport;
    if(isset($_SESSION['admin'])){
        $b_sql = "SELECT * FROM buses WHERE email= '$email'";
        $b_info = mysqli_fetch_array(mysqli_query($db, $b_sql));
        if(is_null($b_info) || count($b_info)==0){
            if (move_uploaded_file($_FILES['image']['tmp_name'], $b_target) && move_uploaded_file($_FILES['passport']['tmp_name'], $p_target)) {
                // Connect to the database
                // Write the data to the database
                $query = "INSERT INTO `buses` (`id`, `name`, `email`, `make`, `phone`, `color`, `seats`, `reserved`, `available`, `description`, `view`, `passport`) VALUES (NULL, '$name', '$email', '$make', '$phone', '$color', '$seats', '$reserved', '$available', '$description', '$image', '$passport') ";
                mysqli_query($db, $query);
                echo "<script>alert('DATA ADDED SUCCESSFULLY!!')</script>";
            }
            else{
                echo "<script>alert('Error Uploading files')</script>";
            }
        }else{
            echo "<script>alert('Driver information already Uploaded!')</script>";
        }
    }else{
        die("You are not logged in as an admin!");
    }
}
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Eazy Access</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/Testimonials.css">
</head>

<body>
    <div class="contact-clean">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <h2 class="text-center">Bus and Driver's info!</h2>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Driver Name" required></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="tel" name="tel" placeholder="Phone Number"></div>
            <div class="form-group"><input type="text" class="form-control" name="make" id="make" placeholder="Vehicle Make/Model"></div>
            <div class="form-group"><input type="text" class="form-control" name="color" id="color" placeholder="Vehicle Color"></div>
            <div class="form-group"><label for="seats">One picture of the bus</label><input type="file" class="form-control" accept="image/*" name="image" id="image"></div>
            <div class="form-group"><label for="seats">One passport of the Driver</label><input type="file" class="form-control" accept="image/*" name="passport" id="passport"></div>
            <div class="form-group"><label for="seats">Total Number of seats</label><input type="number" class="form-control" name="seats" min="6" max="100" id="seats" placeholder="Total Number of seats"></div>
            <div class="form-group"><label for="available">Reserved seats</label><input type="number" class="form-control" name="reserved" min="0" max="10" id="reserved" placeholder="Seats Available"></div>
            <div class="form-group"><textarea class="form-control" name="description" id="description" placeholder="Vehicle description"></textarea></div>
            <div class="form-group"><input name="submit" class="btn btn-primary" type="submit" value="Save"></div>
        </form>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>