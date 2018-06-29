<div class="col-sm-12 segoe">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#ViewUser" data-toggle="tab">Student Allocation</a></li>
    </ul>
    <div class="tab-content">
        <?php
        $sel_users = "SELECT * FROM students ORDER BY ID DESC";
        $sel_query = mysqli_query($link, $sel_users);
        $num_row = mysqli_num_rows($sel_query);









        //echo "<script>alert('$num_row');</script>";
        ?>
        <div class="" id="ViewUser">
            <div class="col-sm-12 table-responsive" style="margin-top: 10px;">
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Reg Number</th>
                        <th>Establishment</th>
                        <th>Supervisor</th>
                        <th>Location</th>
                    </tr>
                    <?php
                    while ($users = mysqli_fetch_array($sel_query)) {

                        $est = $users['EstablishmentId'];
                        $sup = $users['SupervisorId'];
                        $fnames = $users['Firstname'];
                        $lnames = $users['Lastname'];
                        $Reg_no = $users['RegNumber'];
                        ?>
                        <?php
                        $kwery = mysqli_query($link, "SELECT * FROM establishment WHERE id = '$est'");
                        $fetci = mysqli_fetch_assoc($kwery);
                        $array_Name = $fetci['Name'];
                        $Location = $fetci['Location'];


                        $kwery2 = mysqli_query($link, "SELECT * FROM supervisor WHERE id = '$sup'");
                        $fetch2 = mysqli_fetch_assoc($kwery2);
                        $array_Name2 = $fetch2['Name'];
                        $array_Email = $fetch2['Email'];
                        ?>
                        <tr>

                            <td><?php echo $fnames . " " . $lnames; ?></td>
                            <td><?php echo $Reg_no; ?></td>
                            <td><?php echo $array_Name; ?></td>
                            <td><?php echo $array_Name2; ?></td>  
                            <td><?php echo $Location; ?><td>   
                        </tr>

                    <?php } ?>

                </table>
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