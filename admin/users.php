<?php
if (isset($_POST['sub_user'])) {
    $reg_no = filter_input(INPUT_POST, 'reg_no');
    $phone_number = filter_input(INPUT_POST, 'phone_number');

    $check = mysqli_query($link, "SELECT * FROM students WHERE RegNumber = '$reg_no'");
    if (mysqli_num_rows($check) >= 1) {
        //$reg_prompt = "*Students have been registered";
        echo "<script>alert('Student have been registered')</script>";
    } else {
        $password = md5($phone_number);
        $reg_user = "INSERT INTO students(RegNumber, Phone, Password)VALUES('{$reg_no}','{$phone_number}','{$password}')";
        $reg_query = mysqli_query($link, $reg_user);
        if ($reg_query) {
            $reg_prompt = "Student Registration Successful";
        } else {
            $reg_prompt = "Student Details Registration Failed";
        }
    }
}
?>
<div class="col-sm-12 segoe">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#ViewUser" data-toggle="tab">View Students</a></li>
        <li><a href="#CreateUser" data-toggle="tab">Add Student</a></li>
    </ul>
    <div class="tab-content">
        <?php
        $sel_users = "SELECT * FROM students ORDER BY ID DESC";
        $sel_query = mysqli_query($link, $sel_users);
        $count = mysqli_num_rows($sel_query);
        while ($users = mysqli_fetch_array($sel_query)) {
            $user_id[] = $users['id'];
            $firstname[] = $users['Firstname'];
            $lastname[] = $users['Lastname'];
            $location[] = $users['Location'];
            $user_email[] = $users['Email'];
            $user_reg_no[] = $users['RegNumber'];
            $user_phone[] = $users['Phone'];
        }
        ?>
        <div class="tab-pane active" id="ViewUser">
            <div class="col-sm-12 table-responsive" style="margin-top: 10px;">
                <table class="table table-striped">
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Reg Number</th>
                        <th>Phone Number</th>
                        <th>Location</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php for ($s = 0; $s < $count; $s++) { ?>
                        <tr>
                            <td><?php echo $s + 1 ?></td>
                            <td><?php echo ucfirst($firstname[$s]) . ' ' . ucfirst($lastname[$s]); ?></td>
                            <td><?php echo $user_reg_no[$s]; ?></td>
                            <td><?php echo $user_phone[$s]; ?></td>
                            <td><?php echo ucfirst($location[$s]); ?></td>
                            <td><a href="" class="lnk_col" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil "></i></a></td>
                            <td><a href="deleteUser.php?user_id=<?php echo $user_id[$s]; ?>" class="lnk_col" onclick="return confirm('Are you sure you want to delete <?php echo ucfirst($firstname[$s]) . ' ' . ucfirst($lastname[$s]); ?>');"><i class="fa fa-trash "></i></a></td>
                        </tr>
                    <?php } ?>
                </table>
                
            </div>
        </div>
        <div class="tab-pane fade" id="CreateUser">
            <div class="col-sm-8 col-sm-offset-2" style="margin-top: 10px;">
                <form method="POST" action="">
                    <div class="personal-details">
                        <h3 style="margin-bottom:0;padding-bottom: 2" class="text-center">Create New Student</h3>
                        <p class="text-center">Please make sure to fill all the following fields...</p>
                        <?php if (isset($reg_prompt)) { ?>
                            <div class="col-sm-4 col-sm-offset-4" style="color:red;margin-bottom: 10px;"><?php echo $reg_prompt; ?></div>
                        <?php } ?>
                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <input type="hidden" required name="" class="form-control cus-inp" value=""/>
                            </div>
                        </div>
                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <input type="text" required name="reg_no" placeholder="Registration Number" class="form-control cus-inp"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <input type="text" required name="phone_number" placeholder="Phone Number" class="form-control cus-inp"/>
                            </div>
                        </div>

                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success btn-lg" name="sub_user">Submit <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php for ($d = 0; $d < $count; $d++) { ?>
<!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                          <p>Your REGISTRATION NO is <?php echo $user_reg_no[$d]; ?></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                </div>
<?php }?>
<style>
    .lnk_col{
        color:#000;
    }
    .lnk_col:hover{
        color:#1c8;
    }
</style>