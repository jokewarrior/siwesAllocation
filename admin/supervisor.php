<?php
if (isset($_POST['sub_sup'])) {
    $email = filter_input(INPUT_POST, 'email');
    $phone_number = filter_input(INPUT_POST, 'phone_number');

    if ($email == "" || $phone_number == "") {
        $sup_prompt = "*Check fields";
    } else {
        $password = md5($phone_number);
        $reg_user = "INSERT INTO supervisor(Email, Phone, Password)VALUES('{$email}','{$phone_number}','{$password}')";
        $reg_query = mysqli_query($link, $reg_user);
        if ($reg_query) {
            $sup_prompt = "Supervisor Registration Successful";
        } else {
            $sup_prompt = "Supervisor Details Registration Failed";
        }
    }
}
?>
<div class="col-sm-12 segoe">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#ViewUser" data-toggle="tab">View Supervisors</a></li>
        <li><a href="#CreateUser" data-toggle="tab">Add Supervisors</a></li>
    </ul>
    <div class="tab-content">
        <?php
        $sel_sup = "SELECT * FROM supervisor ORDER BY ID DESC";
        $sup_query = mysqli_query($link, $sel_sup);
        $count = mysqli_num_rows($sup_query);
        while ($sup = mysqli_fetch_array($sup_query)) {
            $sup_id[] = $sup['id'];
            $sup_name[] = $sup['Name'];
            $sup_email[] = $sup['Email'];
            $sup_phone[] = $sup['Phone'];
        }
        ?>
        <div class="tab-pane active" id="ViewUser">
            <div class="col-sm-12 table-responsive" style="margin-top: 10px;">
                <table class="table table-striped">
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php for ($s = 0; $s < $count; $s++) { ?>
                        <tr>
                            <td><?php echo $s + 1 ?></td>
                            <td><?php echo ucfirst($sup_name[$s]); ?></td>
                            <td><?php echo $sup_email[$s]; ?></td>
                            <td><?php echo $sup_phone[$s]; ?></td>
                            <td><a href="deleteSup.php?sup_id=<?php echo $sup_id[$s]; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $sup_name[$s]; ?> ???');" class="lnk_col"><i class="fa fa-trash "></i></a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="CreateUser">
            <div class="col-sm-8 col-sm-offset-2" style="margin-top: 10px;">
                <form method="POST" action="">
                    <div class="personal-details">
                        <h3 style="margin-bottom:0;padding-bottom: 2" class="text-center">Create New Supervisor</h3>
                        <p class="text-center">Please make sure to fill all the following fields...</p>
                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <?php if (isset($sup_prompt)) { ?>
                                <div class="col-sm-4 col-sm-offset-4" style="color:red;margin-bottom: 10px;"><?php echo $sup_prompt; ?></div>
                            <?php } ?>
                            <div class="col-sm-12">
                                <input type="hidden" required name="" class="form-control cus-inp" value=""/>
                            </div>
                        </div>
                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <input required name="email" placeholder="Email" class="form-control cus-inp"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <input required name="phone_number" placeholder="Phone Number" class="form-control cus-inp"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success btn-lg" name="sub_sup">Submit <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .lnk_col{
        color:#000;
    }
    .lnk_col:hover{
        color:#1c8;
    }
</style>