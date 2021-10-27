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
    <script src="https://js.paystack.co/v1/inline.js"></script> 
        <?php if(isset($_GET['b'])){ ?>
        <form class="form" method="POST" action="pay.php" id="paymentForm">
        <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required />
        </div>
        <div class="form-group">
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number">
        <input type="hidden" class="form-control" id="email" name="phone" value="" required />
        </div>
        <div class="form-group">
            <label for="first-name">Full Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="John Doe" />
        </div>
        <div class="form-group">  
            <input type="hidden" class="form-control" value="<?php echo $_GET['b'] ?>" id="last_name" name="last_name" />
        </div>
        <div class="form-submit">
        <button type="submit" class="btn btn-primary"> Pay </button>
        </div>
    </form>
    <?php }else{ ?>
        <h1>Select a bus please!</h1>
    <?php } ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
</body>

</html>