<?php
//call database
include '../database/connect_db.php';
//call function
include '../functions/functions.php';

//start session
session_start();
if (!isset($_SESSION['sup_id'])) {
    header("location:./login.php");
} else {
    $sup_id = $_SESSION['sup_id'];
}


if (isset($_POST['update'])) {
    $up_fullname = filter_input(INPUT_POST, 'name');
    $up_email = filter_input(INPUT_POST, 'email');
    $up_location = filter_input(INPUT_POST, 'location');
    $up_phone = filter_input(INPUT_POST, 'phone');

    if ($up_email == "" || $up_fullname == "" || $up_location == "" || $up_phone == "") {
        $prompt = "fill In all Fields";
    } else {
        $query = "UPDATE supervisor SET Name = '$up_fullname', Location ='$up_location', Phone = '$up_phone',"
                . "Email = '$up_email' WHERE id = '$sup_id'";
        $result = mysqli_query($link, $query);
        if (!$result) {
            $prompt = "Update Not successfully, Check Fields";
        } else {
            header("location:./home");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>FirstLOG || Supervisor</title>
        <!-- Theme CSS -->

        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/rendro-easy-pie-chart-97b5824/demo/style.css">
        <link rel="stylesheet" href="../nprogress-master/nprogress-master/nprogress.css">

        <!-- JS -->
        <script src="../js/jquery-1.11.3.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../css/rendro-easy-pie-chart-97b5824/dist/easypiechart.js"></script>
        <script src="../nprogress-master/nprogress-master/nprogress.js"></script>


        <script type="text/javascript">
            $(document).ready(function () {
                $('.mainBody .row div ul li a').each(function (index) {
                    if (this.href.trim() == window.location) {

                        $(this).addClass('activeClass');
                    }
                });
            });
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body style="overflow-y:hidden">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#1f525d;">
            <div class="container-fluid">
                <div class="navbar-header col-md-10 col-md-offset-1">

                </div>
            </div>
        </nav>
        <div class="mainBody container-fluid segoe" style="overflow-y:auto">
            <div class="row ">
                <div class="col-sm-6 col-sm-offset-3" style="margin-top:50px;">
                    <?php if (isset($prompt)) { ?>
                        <div class="text-center " style="color: red;"><?php echo $prompt; ?></div>
                    <?php } ?>
                    <form method="POST" action="">
                        <div class="personal-details">
                            <h3 style="margin-bottom:0;padding-bottom: 2" class="text-center">UPdate Details</h3>
                            <p class="text-center">Please make sure to fill all the following fields...</p>
                            <div class="form-group col-sm-12" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <input required name="name" placeholder="Fullname" class="form-control cus-inp"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-12" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <input type="email" required name="email" placeholder="Email" class="form-control cus-inp"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-6" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <select class="form-control cus-inp" name="location">
                                        <option selected disabled>Location</option>
                                        <option value="abia">Abia</option>
                                        <option value="adamawa">Adamawa</option>
                                        <option value="akwaibom">Akwa Ibom</option>
                                        <option value="anambra">Anambra</option>
                                        <option value="bauchi">Bauchi</option>
                                        <option value="bayelsa">Bayelsa</option>
                                        <option value="benue">Benue</option>
                                        <option value="borno">Borno</option>
                                        <option value="cross river">Cross River</option>
                                        <option value="delta">Delta</option>
                                        <option value="ebonyi">Ebonyi</option>
                                        <option value="edo">Edo</option>
                                        <option value="ekiti">Ekiti </option>
                                        <option value="enugu">Enugu</option>
                                        <option value="gombe">Gombe</option>
                                        <option value="imo">Imo</option>
                                        <option value="jigawa">Jigawa</option>
                                        <option value="kaduna">Kaduna</option>
                                        <option value="kano">Kano</option>
                                        <option value="katsina">Katsina</option>
                                        <option value="kebbi">Kebbi</option>
                                        <option value="kogi">Kogi</option>
                                        <option value="kwara">Kwara</option>
                                        <option value="lagos">Lagos</option>
                                        <option value="nassarawa">Nassarawa</option>
                                        <option value="niger">Niger</option>
                                        <option value="ogun">Ogun</option>
                                        <option value="ondo">Ondo</option>
                                        <option value="osun">Osun</option>
                                        <option value="oyo">Oyo</option>
                                        <option value="plateau">Plateau</option>
                                        <option value="rivers">Rivers</option>
                                        <option value="sokoto">Sokoto</option>
                                        <option value="taraba">Taraba</option>
                                        <option value="yobe">Yobe</option>
                                        <option value="zamfara">Zamfara</option>
                                        <option value="fct">FCT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <input required name="phone" placeholder="Phone" class="form-control cus-inp"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-4 col-sm-offset-4" style="margin-top: 20px">
                                <div class="col-sm-12">
                                    <button type="submit" name="update" type="btn" class="btn btn-success center-block">
                                        Update <i class="fa fa-arrow-circle-o-up"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>

        NProgress.start();

        var interval = setInterval(function () {
            NProgress.inc();
        }, 1000);
        $(window).on('beforeunload', function () {
            NProgress.start();
        });

        $(window).load(function () {

            clearInterval(interval);
            NProgress.done();

        });

    </script>
</html>