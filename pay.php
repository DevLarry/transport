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
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <?php
    require('config.php');


    if(isset($_POST['email'])){
        $user_sql1 = "SELECT * FROM `users` WHERE email ='".trim($_POST['email'])."'";
        $user_sql2 = "INSERT INTO `users` (`id`, `name`, `email`, `phone`) VALUES(0, '".$_POST['first_name']."', '".$_POST['email']."', '".$_POST['phone']."')";
        // $user_query1 = mysqli_query($db, $user_sql1);
        $user = mysqli_fetch_array(mysqli_query($db, $user_sql1));
        if(is_null($user) || count($user)!=1){
            mysqli_query($db, $user_sql2);
        }
        $user = mysqli_fetch_array(mysqli_query($db, $user_sql1));
        $bus_sql = "SELECT available FROM buses WHERE id='".$_POST['last_name']."'";
        $bus_query = mysqli_query($db, $bus_sql);
    ?>
    <script>
        function makePayment() {
            FlutterwaveCheckout({
            public_key: "FLWPUBK-a948bd7059a9d0f25b89dccb6f398f04-X",
            tx_ref: "RX1",
            amount: 150,
            currency: "NGN",
            country: "NG",
            payment_options: " ",
            meta: {
                consumer_id: 0,
                consumer_mac: "",
            },
            customer: {
                email: "<?php echo $_POST['email'] ?>",
                phone_number: "<?php echo $_POST['phone'] ?>",
                name: "<?php echo $_POST['first_name'] ?>",
            },
            callback: function (data) {
                // var res = JSON.parse(data);
                return window.location = 'http://'+window.location.host+'/verify.php?id='+data.transaction_id+'&b=<?php echo $_POST["last_name"] ?>'+'&u=<?php echo $user['id'] ?>';
            },
            onclose: ()=> {
                alert("Payment Cancelled!");
                document.write("Transaction terminated!");
            },
            customizations: {
                title: "Eazy Access",
                description: "Transport booking fee",
                logo: "https://transport.eazyaccess.com.ng/favicon.png",
            },
            });
        }
        makePayment();
    </script>
    
    <?php
        }else{ ?>
        <div class="contact-clean"><h1>Please select a bus to order!</h1></div>
    <?php } ?>
</body>
</html>
