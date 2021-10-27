<?php 
if(isset($_GET['p'])){
    $plan = $_GET['p'];
    if($plan==3){
        header('Location: order.php');
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
    <link rel="shortcut icon" href="http://transport.eazyaccess.com.ng/favicon.png" type="image/png">
</head>

<body>
    <div class="contact-clean">
        <div class="row justify-content-center">
            <div style="text-align: center" class="alert alert-warning col-10"><?php echo $plan==1?'BUS SEAT BOOKING':($plan==2?'FULL BUS BOOKING':'ORDER BUS FOR TRIP');  ?></div>
            <form action="" method="get" class="justify-content-center">
                <a href="bus.php?c=1&p=<?php echo $_GET['p'] ?>" class="btn btn-primary btn-lg">From Bosso to GK</a>
                <a href="bus.php?c=2&p=<?php echo $_GET['p'] ?>" class="btn btn-primary btn-lg">From GK to Bosso</a>
            </form>
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
</body>
<?php } ?>
</html>