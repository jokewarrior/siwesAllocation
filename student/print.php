<?php
ob_start();
//call database
include '../database/connect_db.php';
include '../functions/functions.php';

//start session
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location:../login.php");
}
$user = getuserdata();
$user_id = $user['id'];
$userFname = $user['Firstname'];
$userLname = $user['Lastname'];
$userOname = $user['Othername'];
$userPhone = $user['Phone'];
$userReg = $user['RegNumber'];
$userGender = $user['Gender'];
$userEmail = $user['Email'];
$user_pass = $user['Password'];
$supId = $user['SupervisorId'];
$estId = $user['EstablishmentId'];
$userLocation = $user['Location'];

$sucprompt = 'you have been Allocated to';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Student || Allocation</title>
        <!-- Theme CSS -->

        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/rendro-easy-pie-chart-97b5824/demo/style.css">

        <!-- JS -->
        <script src="../js/jquery-1.11.3.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../css/rendro-easy-pie-chart-97b5824/dist/easypiechart.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body style="overflow-y:hidden" onload="printPage()">
        <?php
        $getEst = "SELECT * FROM establishment where id ='$estId'";
        $getEstRun = mysqli_query($link, $getEst);
        if (mysqli_num_rows($getEstRun) == 1) {
            $row = mysqli_fetch_assoc($getEstRun);
            $comp_name = $row['Name'];
            $comp_add = $row['Address'];
            $comp_loc = $row['Location'];
        }
        ?>

        <div class="mainBody container-fluid segoe" style="overflow-y:auto">
            <div class="row ">
                <div class="col-md-8 col-md-offset-2 " style="border:1px solid #000;height: 500px;">
                    <?php if (isset($sucprompt)) { ?>
                        <h3 style="margin-bottom:0;padding-bottom: 2" class="text-center txt_bold"><?php echo $sucprompt; ?></h3>
                        <div class="col-sm-12" style="margin-top: 10px;">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="entxt txt_bold"><?php echo ucfirst($comp_name); ?></div>
                                <div class="entxt txt_bold"><i class="fa fa-home"></i> <?php echo ucfirst($comp_add); ?></div>
                                <div class="entxt txt_bold"><i class="fa fa-map-marker"></i> <?php echo ucfirst($comp_loc); ?></div>
                            </div>
                        </div>
                    <?php }; ?>
                </div>
            </div>
        </div>
    </body>
    <script>

        function printPage() {
            window.print();
        }
    </script>
</html>