<?php
require('config.php');
if(isset($_POST['email'])){
    // var_dump(json_encode($_POST));
    $sql = "INSERT INTO orders_request VALUES(0, '".json_encode($_POST)."', 'pending')";
    mysqli_query($db, $sql);
    die('<div class="contact-clean"><form class="form" method="POST" " id="paymentForm"><h3>Thanks for Submitting your request form, we will get back to you as soon as possible</h3></form></div>');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Eazy Access</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" href="http://transport.eazyaccess.com.ng/favicon.png" type="image/png">
</head>

<body>
    <div class="contact-clean">
        <form class="form" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" id="paymentForm">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required />
            </div>
            <div class="form-group">
                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Contact Phone Number" required>
                <span class="text-warning">Preferably <span class="fa fa-whatsapp"></span>Whatsapp number</span>
            </div>
            <div class="form-group">
                <label for="first-name">Full Name(Personal or Body)</label>
                <input type="text" class="form-control" id="first_name" name="name" placeholder="John Doe" required />
            </div>
            <div class="form-group">
                <label for="to">Where to:</label>
                <input type="text" name="to" id="to" class="form-control" placeholder="Bida, Niger State" required>
            </div>
            <div class="form-group">
                <label for="off">Take off Date:</label>
                <input type="date" name="date" id="off" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="pass">Number of Passengers:</label>
                <input type="number" name="passengers" id="pass" class="form-control" placeholder="0" required>
            </div>
            <div class="form-group">
                <label for="info">More information:</label>
                <textarea class="form-control" name="info" id="info" rows="4" required></textarea>
            </div>
            <div class="form-submit">
                <button type="submit" class="btn btn-primary"> Submit Form </button>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>