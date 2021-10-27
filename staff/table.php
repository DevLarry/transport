<?php 
    require('../config.php');
    $sql = "SELECT * FROM orders_request WHERE status = ";
    $case = (isset($_GET['status']))?"'responded'":"'pending'";
    $sql .= $case;
    $result = mysqli_query($db, $sql);
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
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" href="http://transport.eazyaccess.com.ng/favicon.png" type="image/png">
</head>

<body>
    <form action="" class="form-clean p-3">
        <table class="table table-stripped bg-light">
            <tr class="row pl-2">
                <th class="col-1 text-center">S/N</th>
                <th class="col-7">Name - Location</th>
                <th class="col-4">Functions</th>
            </tr>
            <?php while($resp = mysqli_fetch_array($result)){ 
                $res = json_decode($resp['req'], true);
                ?>
            <tr class="row pl-2">
                <td class="col-1 text-center"><li>&nbsp;</li></td>
                <td class="col-7"><?php echo ($res['name']).' - '.($res['to']) ?></td>
                <td class="col-4">
                    <button class="btn btn-info mr-2" onclick="seen(<?php echo $resp['id']; ?>)"><span class="fa fa-eye"></span> seen</button>
                    <button class="btn btn-warning" onclick="decline(<?php echo $resp['id']; ?>)"><span class="fa fa-times"></span> decline</button>
                </td>
            </tr>
            <?php } ?>
        </table>
    </form>
    <script src="../assets/js/view.js"></script>
</body>
</html>