<?php
//call database
include './database/connect_db.php';
//call function
include './functions/functions.php';

//start session
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location:./login.php");
}
//} else {
//    $user_id = $_SESSION['user_id'];
//}
//get user details
$user = getuserdata();
$user_id = $user['id'];
$userFname = $user['Firstname'];
$userLname = $user['Lastname'];
$userOname = $user['Othername'];
$userPhone = $user['Phone'];
$userReg = $user['RegNumber'];
$userGender = $user['Gender'];
$userEmail = $user['Email'];
$estId = $user['EstablishmentId'];
$userLocation = $user['Location'];

if (isset($_POST['update'])) {
    $up_firstname = filter_input(INPUT_POST, 'firstname');
    $up_lastname = filter_input(INPUT_POST, 'lastname');
    $up_othername = filter_input(INPUT_POST, 'othername');
    $up_email = filter_input(INPUT_POST, 'email');
    $up_gender = filter_input(INPUT_POST, 'gender');
    $up_location = filter_input(INPUT_POST, 'location');
    $up_regNo = filter_input(INPUT_POST, 'reg_no');
    $up_phone = filter_input(INPUT_POST, 'phone');

    if ($up_email == "" || $up_firstname == "" || $up_lastname == "" || $up_phone == "" || $up_regNo == "") {
        $prompt = "fill In all Fields";
    } else {
        $query = "UPDATE students SET Firstname = '$up_firstname', Lastname ='$up_lastname', Othername = '$up_othername',"
                . "Gender = '$up_gender', Location = '$up_location', Email = '$up_email',"
                . "RegNumber = '$up_regNo', Phone = '$up_phone' WHERE id = '$user_id'";
        $result = mysqli_query($link, $query);
        if (!$result) {
            $prompt = "Update Not successfully, Check Fields";
        } else {
            header("location:student/home");
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
        <title>FirstLOG || STudent</title>
        <!-- Theme CSS -->

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/rendro-easy-pie-chart-97b5824/demo/style.css">
        <link rel="stylesheet" href="nprogress-master/nprogress-master/nprogress.css">

        <!-- JS -->
        <script src="js/jquery-1.11.3.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="css/rendro-easy-pie-chart-97b5824/dist/easypiechart.js"></script>
        <script src="nprogress-master/nprogress-master/nprogress.js"></script>


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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#3e8f3e;">
            <div class="container-fluid">
                <div class="navbar-header col-md-10 col-md-offset-1">

                </div>
            </div>
        </nav>
        <div class="mainBody container-fluid segoe" style="overflow-y:auto">
            <div class="row ">
                <div class="col-sm-6 col-sm-offset-3" style="margin-top:50px;">
<?php if (isset($prompt)) { ?>
                        <div class="text-center"><?php echo $prompt; ?></div>
                    <?php } ?>
                    <form method="POST" action="">
                        <div class="personal-details">
                            <h3 style="margin-bottom:0;padding-bottom: 2" class="text-center">UPdate Details</h3>
                            <p class="text-center">Please make sure to fill all the following fields...</p>
                            <div class="form-group col-sm-12" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <input required name="firstname" placeholder="Firstname" value="<?php echo $userFname; ?>" class="form-control cus-inp"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-12" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <input required name="lastname" placeholder="Lastname" value="<?php echo $userLname; ?>" class="form-control cus-inp"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-12" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <input required name="othername" placeholder="Othername" value="<?php echo $userOname; ?>" class="form-control cus-inp"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-12" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <input required name="email" placeholder="Email" value="<?php echo $userEmail; ?>" class="form-control cus-inp"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-6" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <select class="form-control cus-inp" name="gender">
                                        <option selected disabled >Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <select class="form-control cus-inp" name="location">
                                        <option selected disabled>Location</option>
                                        <option value="abia">Abia</option>
                                        <option value="adamawa">Adamawa</option>
                                        <option value="akwa ibom">Akwa Ibom</option>
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
                                    <input required name="phone" placeholder="Phone" value="<?php echo $userPhone; ?>" class="form-control cus-inp"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-6" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <input required name="reg_no" placeholder="Reg Number" value="<?php echo $userReg; ?>" class="form-control cus-inp"/>
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