<?php
require('config.php');
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$_GET['id']."/verify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => '',
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer  FLWSECK-50cb00a3aac5f7c3cf8df94cc6a5688f-X"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response, true);
if($data['status'] == 'success'){
    $t_id = trim($_GET["id"]);
    $sql1 = "SELECT * FROM logs WHERE id= $t_id";
    $sql2 = mysqli_fetch_array(mysqli_query($db, $sql1));
    if(is_null($sql2) || !count($sql2)){
        $sql = "INSERT INTO `logs` (`id`, `ref`, `bus`, `status`, `user`, `used`) VALUES(".$_GET['id'].", '".$data['data']['flw_ref']."', '".$_GET['b']."', '".$data['status']."', '".$_GET['u']."', false)";
        mysqli_query($db, $sql);
        $u_id = $_GET['b'];
        $sql = "UPDATE buses SET available = available-1 WHERE id= $u_id";
        mysqli_query($db, $sql);
    }
    $sql2 = mysqli_fetch_array(mysqli_query($db, $sql1));
}
$bus_id = $_GET['b'];
$bus_sql = "SELECT * FROM buses WHERE id= $bus_id";
$bus = mysqli_fetch_array(mysqli_query($db, $bus_sql));
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
        <form class="form" action="" id="paymentForm" style="align-content: center;">
            <div class="align-center" style="text-align: center"><img class="image-inline" src="favicon.png" alt="Logo" width="60px" height="60px"><h3 style="display: inline;">Eazy Access</h3></div>
            <div class="row">
                <div class="col-6" style="text-align: right; font-size: large;">Name:</div>
                <div class="col-6" style="text-align: left; font-size: large;"><?php echo $data['data']['customer']['name'] ?></div>
                <div class="col-6" style="text-align: right; font-size: large;">Payment ID:</div>
                <div class="col-6" style="text-align: left; font-size: large;"><?php echo $sql2['id'] ?></div>
                <div class="col-6" style="text-align: right; font-size: large;">Amount:</div>
                <div class="col-6" style="text-align: left; font-size: large;">N150</div>
                <div class="col-6" style="text-align: right; font-size: large;">Status:</div>
                <div class="col-6" style="text-align: left; font-size: large;"><?php echo $data['status'] ?></div>
                <div class="col-6" style="text-align: right; font-size: large;">Day:</div>
                <div class="col-6" style="text-align: left; font-size: large;"><?php echo explode('T', $data['data']['created_at'])[0] ?></div>
                <div class="col-6" style="text-align: right; font-size: large;">Time:</div>
                <div class="col-6" style="text-align: left; font-size: large;"><?php echo explode('.', explode('T', $data['data']['created_at'])[1])[0] ?></div>
                <div class="col-6" style="text-align: right; font-size: large;">To:</div>
                <div class="col-6" style="text-align: left; font-size: large;"><?php echo $bus['to'] ?></div>
            </div>
            <button class="btn btn-primary" onclick="window.print()"><span class="fas fa-print"></span>Print</button>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
</body>

</html>