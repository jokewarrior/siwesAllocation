<?php
if (isset($_POST['update'])) {
    $up_email = filter_input(INPUT_POST, 'email');
    $up_Fullname = filter_input(INPUT_POST, 'fullname');
    $up_phone = filter_input(INPUT_POST, 'phone');

    if ($up_email == "" || $up_Fullname == "" || $up_phone == "") {
        $prompt = "fill In all Fields";
    } else {
        $query = "UPDATE supervisor SET Name = '$up_Fullname',Email = '$up_email', Phone = '$up_phone' WHERE id = '$sup_id'";
        $result = mysqli_query($link, $query);
        if (!$result) {
            $prompt = "Update Not successfully, Check Fields";
        } else {
            $prompt = "Profile Updated Successfully";
            // header("location:home.php");
        }
    }
}

if (isset($_POST['change'])) {
    $prevPass = md5(filter_input(INPUT_POST, 'pword'));
    $newPass = md5(filter_input(INPUT_POST, 'new_pword'));
    $confirmPass = md5(filter_input(INPUT_POST, 'confirm_pword'));

    if ($prevPass != $supPass) {
        $prompt = '*Previous password does not match';
    } else {
        if ($newPass != $confirmPass) {
            $prompt = 'New passwords do not match';
        } else {
            $passchange = mysqli_query($link, "UPDATE supervisor SET Password = '$confirmPass' WHERE id ='$sup_id'");
            if ($passchange) {
                $prompt = '*Password Change successful';
            } else {
                $prompt = 'unsuccessful Password change Contact AdMIN';
            }
        }
    }
}
?>
<div class="col-sm-12 segoe">
    <div class="row" style="margin-top:10px;">
        <div class="profile-userpic col-sm-4 col-md-push-8" style="margin-top:0px;">
            <img src="../img/img_placeholder_avatar.jpg" height="200" width="200" class="img-circle"/>
        </div>
        <div class="col-sm-8 col-md-pull-4" >
            <?php if (isset($prompt)) { ?>
                <div class="text-center" style="color:red;margin-bottom: 10px;"><?= $prompt ?></div>
            <?php } ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title txt_bold">Personal Details</h3>
                </div>
                <div class="panel-body" style="margin-top:0px;">
                    <div class="col-sm-12 display-deatils">
                        <span class="fa fa-user"></span>  <?= ucfirst($supName); ?>
                    </div>
                    <div class="col-sm-12 display-deatils">
                        <span class="fa fa-envelope"></span>  <?= $supEmail ?>
                    </div>
                    <div class="col-sm-12 display-deatils">
                        <span class="fa fa-phone"></span>  <?= $supPhone ?>
                    </div>
                    <div class="col-sm-12 display-deatils">
                        <span class="fa fa-map-marker"></span>  <?= ucfirst($supLocation) ?>
                    </div>
                    <div class="col-sm-6 display-deatils" style="border:none;">
                        <a type="btn" class="btn btn-success pull-right" data-toggle="modal" data-target="#edit-profile">Edit Profile <i class="fa fa-pencil"></i></a>
                    </div>
                    <div class="col-sm-6 display-deatils" style="border:none;">
                        <a type="btn" class="btn btn-success pull-right" data-toggle="modal" data-target="#edit-password">Change password <i class="fa fa-pencil"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="POST" action="">
                            <div class="personal-details" style="margin-top:10px;">
                                <p class="text-center">Please make sure to fill all the following fields...</p>
                                <div class="form-group col-sm-12" style="margin-top: 10px">
                                    <div class="col-sm-12">
                                        <input type="text" required name="fullname" placeholder="Fullname" value="<?= $supName ?>" class="form-control cus-inp"/>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12" style="margin-top: 10px">
                                    <div class="col-sm-12">
                                        <input type="text" required name="phone" placeholder="Phone Number" value="<?= $supPhone ?>" class="form-control cus-inp"/>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12" style="margin-top: 10px">
                                    <div class="col-sm-12">
                                        <input type="email" required name="email" placeholder="Email" value="<?= $supEmail ?>" class="form-control cus-inp"/>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12" style="margin-top: 10px">
                                    <button type="submit" name="update" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<!-- password change !-->
<div class="modal fade" id="edit-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="POST" action="">
                            <div class="personal-details" style="margin-top:10px;">
                                <p class="text-center">Please make sure to fill all the following fields...</p>
                            </div>
                            <div class="form-group col-sm-12" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <input type="password" required name="pword" placeholder="previous password" value="" class="form-control cus-inp"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-12" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <input type="password" required name="new_pword" placeholder="new password" value="" class="form-control cus-inp"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-12" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <input type="password" required name="confirm_pword" placeholder="Confrm password" value="" class="form-control cus-inp"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-12" style="margin-top: 10px">
                                <button type="submit" name="change" class="btn btn-success">Change</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>    
        <div class="modal-footer">

        </div>
    </div>
</div>
</div>
<style>
    .txt_bold{
        font-weight: 600;
        font-size: 25px;
        font-variant: small-caps;
    }
    .display-deatils{
        font-size:17px;
        border-bottom: 1px solid #ccc;
        padding: 10px;
        font-weight: 600;

    }
</style>
