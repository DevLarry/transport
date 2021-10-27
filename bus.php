<?php
    require('bullshit.php');
    require('config.php');
    require('classes.php');
    // $page = $_GET['page'];
    $time = isset($_GET['time']);
    $time = $time?$_GET['time']:7;
    $sql = "SELECT * FROM buses WHERE going = 1 AND available > 0";
    if(isset($_GET['p']) && isset($_GET['c']) && $_GET['p']==1){
        $p = $_GET['p'];
        $c = $_GET['c'];
        $campus = $c==1?"GK":($c==2?"Bosso":"");
        $sql.=" AND going=1 AND `to`='$campus'";
        $sql.= " AND time = '".$time."'";
        // $plan = $p==1?"Bosso":$p==2?"GK":"";
    }
    $result = mysqli_query($db, $sql);
    // echo count(mysqli_fetch_array($result));
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
    <link rel="shortcut icon" href="http://transport.eazyaccess.com.ng/favicon.png" type="image/png">
</head>

<body>
    <div class="testimonials-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">BUSES AVAILABLE!</h2>
                <p class="text-center">Here are the lists of the busses you can book right now! Grab yours before another person does.</p>
            </div>
            <div class="row people justify-content-center">
            <?php 
                if(isset($_GET['p']) && $_GET['p']==2){
                while ($row = mysqli_fetch_array($result)) {
              // $obj =
                $a_bus = new bus($row);
                ?>

                <div class="col-md-6 col-lg-4 item">
                    <div class="box"  style="background-image: url('upload/bus/<?php echo $row['view'] ?>');">
                        <p class="description" style="background: rgba(100, 100, 100, .7); color: white; padding: 6px; border-radius: 3px;"><?php echo $row['description'] ?></p>
                    </div>
                    <div class="author"><img class="rounded-circle" src="upload/driver/<?php echo $row['passport'] ?>">
                        <h5 class="name"><?php echo $a_bus->name ?></h5>
                        <p class="title"><?php echo $a_bus->make.', '.$a_bus->color ?></p>
                        <p class="text" style="display: inline;">Seats available: <?php echo $a_bus->availableSeats ?></p>
                        <a href="fill.php?b=<?php echo $a_bus->getId() ?>" class="btn btn-inline btn-primary">Book now!</a>
                    </div>
                </div>
                <?php }}else{ 
                    if(!isset($_GET['time']) || @is_null($_GET['time'])){
                    ?>

                        <div class="row justify-content-center">
                            <a href="bus.php?time=7" style="background: <?php echo passed('first')?'#f1f1f1; color:black;':'green'; ?>;" class="btn btn-block btn-primary btn-lg m-4 <?php echo passed('passed')?'disabled':''; ?>">7 O'clock am</a>
                            <a href="bus.php?time=11" style="background: <?php echo passed('second')?'#f1f1f1; color:black;':'green'; ?>;" class="btn btn-block btn-primary btn-lg m-4 <?php echo passed('passed')?'disabled':''; ?>">Half past 11 am</a>
                            <a href="bus.php?time=2" style="background: <?php echo passed('third')?'#f1f1f1; color:black;':'green'; ?>;" class="btn btn-block btn-lg btn-primary m-4 <?php echo passed('passed')?'disabled':''; ?>">half past 2 pm</a>
                            <a href="bus.php?time=6" style="background: <?php echo passed('fourth')?'#f1f1f1; color:black;':'green'; ?>;" class="btn btn-block btn-lg btn-primary m-4 <?php echo passed('passed')?'disabled':''; ?>">6 O'clock pm</a>
                        </div>
                    <?php }}?>
            </div>
        </div>
    </div>
    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <p class="copyright">Copyright &copy; 2021 Eazy Access | Powered by Ornagle inc.</p>
                </div>
            </div>
        </footer>
    </div>
    <script>
        sessionStorage.setItem("c", "<?php echo $_GET['c'] ?>");
        sessionStorage.setItem("p", "<?php echo $_GET['p'] ?>");
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
