<?php
ob_start();
//call database connection
require_once '../database/connect_db.php';
require '../functions/functions.php';
//start session
session_start();
//confirm session
if (!isset($_SESSION['sup_id'])) {
    header("location:login.php");
}
else{
    $sup_id = $_SESSION['sup_id'];
}

$super = getsupdata();
$supId = $super['id'];
$supName = $super['Name'];
$supEmail = $super['Email'];
$supPhone = $super['Phone'];
$supLocation = $super['Location'];
$supPass = $super['Password'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Dashboard || Supervisor</title>
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

        <!--<style>

            .mainBody .row ul li a.activeClass:after{
                font-family: FontAwesome;
                content: "\f0d9";
                margin-right: -16px;
                float: right;
                color: #FFF;
                font-weight: 800;
                font-size: 20px;
                line-height: 0.9;
                text-rendering: auto;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

        </style>-->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body style="overflow-y:hidden">
        <nav class="navbar navbar-default navbar-fixed-top NavBare" role="navigation" style="background: #1f525d;">
            <div class="container-fluid">
                <div class="navbar-header col-md-10 col-md-offset-1">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".profile-usermenu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

            </div>
        </nav>
        <div class="mainBody container-fluid segoe" style="overflow-y:auto">
            <div class="row ">
                <div style="min-height:700px;z-index:9999;" class="col-lg-2 col-sm-3 profile profile-usermenu collapse navbar-collapse ">
                    <div class="profile-sidebar">
                        <div class="profile-userpic">
                            <img style="display:block;margin:0px auto" src="../img/img_placeholder.jpg" height="100" width="100" class="img-circle"/>
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                <h5>Welcome</h5>
                            </div>
                        </div>
                        <ul class="nav" id="nav-ex" style="overflow-y: auto;">
                            <li><a href="home"><i class="fa fa-home"></i> Dashboard</a></li>
                            <li><a href="student"><i class="fa fa-user-plus"></i> Supervisees</a></li>
                            <li><a href="profile"><i class="fa fa-user"></i> Profile</a></li>
                            <!--<li><a href="message"><i class="fa fa-envelope"></i> Messages</a></li>-->
                            <li><a href="logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="container-fluid main-content segoe" style="margin-top:50px;padding-bottom:60px">
                    <?php
                    if (isset($_GET['s'])) {
                        $allowed_pages = array('home','student', 'profile', 'message','logout');
                        $s = $_GET['s'];
                        if (in_array($s, $allowed_pages)) {
                            require $s . '.php';
                        }else {
                            require 'home.php';
                        }
                    } else {
                        require 'home.php';
                    }
                    ?>
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
<?php
    ob_end_flush();
?>