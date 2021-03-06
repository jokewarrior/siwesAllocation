<?php
//call database
require_once './database/connect_db.php';

//start session
session_start();

if (isset($_POST['login_submit'])) {

    $reg_no = filter_input(INPUT_POST, 'reg_no');
    $password = filter_input(INPUT_POST, 'password');
    $password_hash = md5($password);

    //confirm existence
    $check = "SELECT * FROM students WHERE Password = '$password_hash' && RegNumber = '$reg_no' LIMIT 1";
    $result = mysqli_query($link, $check);
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $edit = (empty($row['Gender'])) ? true : false;
        $_SESSION['user_id'] = $row['id'];
        //$_SESSION['firstname'] = $user['firstname'];
        ($edit) ? header("location:./first_log.php") : header("location:./student/home");
    } else {
        $log_prompt = "Check Your password";
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

        <title>Student Login</title>

        <!-- Theme CSS -->

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/rendro-easy-pie-chart-97b5824/demo/style.css">
        <link rel="stylesheet" href="nprogress-master/nprogress-master/nprogress.css">

        <!-- JS -->
        <script src="js/jquery-1.11.3.js"></script>
        <script src="bootstrap.min.js"></script>
        <script src="css/rendro-easy-pie-chart-97b5824/dist/easypiechart.js"></script>
        <script src="nprogress-master/nprogress-master/nprogress.js"></script>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body style="overflow-y:hidden; background:#1f525d;color: #fff;">
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <span class="navbar-brand page-scroll" href="#page-top" style="color:#1f525d;">DYNAMIC SIWES ALLOCATION SYSTEM</span>
                </div>
            </div>
            <!-- /.container -->
        </nav>
        <section>
            <div class="container segoe" style="margin-top:10%">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <img style="display:block;margin:0px auto" src="img/img_placeholder_avatar.jpg" height="100" width="100" class="img-circle"/>
                        <h2>Student Login</h2>
                    </div>
                    <?php if (isset($log_prompt)) { ?>
                        <div class="text-center" style="color:red;margin-bottom: 10px;"><?= $log_prompt ?></div>
                    <?php } ?>
                    <form class="loginForm" action="" method="POST">
                        <div class="form-group col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
                            <div class="input-group">
                                <span style="background:transparent;color:#333" class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input style="height:40px" type="text" maxlength="50" name="reg_no" placeholder="Registration Number" class="form-control" required="" />
                            </div>
                            <div class="input-group" style="margin-top: 10px;">
                                <span style="background:transparent;color:#333" class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input style="height:40px" type="password" maxlength="50" name="password" placeholder="Password" class="form-control" required="" />
                            </div>
                            <div class="input-group center-block" style="margin-top: 20px;">
                                <button style="height:40px" type="submit" name="login_submit" class="btn btn-primary">
                                    Login <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </section>
        <section>

        </section>
    </body>

</html>
