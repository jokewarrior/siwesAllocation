<?php
$sel_users = "SELECT * FROM students WHERE SupervisorId = '$sup_id' ORDER BY ID DESC LIMIT 0,6";
$sel_query = mysqli_query($link, $sel_users);
$student_details = array();
$count = mysqli_num_rows($sel_query);

while ($users = mysqli_fetch_array($sel_query)) {
    $array_row = array();
    $array_row['id'] = $users['id'];
    $array_row['firstname'] = $users['Firstname'];
    $array_row['lastname'] = $users['Lastname'];
    $array_row['regNo'] = $users['RegNumber'];
    $array_row['estId'] = $EstId = $users['EstablishmentId'];
    $kwery = mysqli_query($link, "SELECT * FROM establishment WHERE id = '$EstId'");
    $fetch = mysqli_fetch_assoc($kwery);
    $array_row['name'] = $fetch['Name'];
    $array_row['loc'] = $fetch['Location'];

    array_push($student_details, $array_row);
}
?>
<div class="col-sm-12 segoe">
    <div class="row">
        <div class="col-sm-6 text-center std_no">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="txt_bold">Total Students</h3>
                </div>
                <div class="panel-body" style="background:#cfcfcf;">
                    <?php echo $count; ?>
                </div>
            </div>
        </div>
<!--        <div class="col-sm-6 text-center std_no">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="txt_bold">New Messages</h3>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>-->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="txt_bold text-center">Newest students</h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12 table-responsive" style="margin-top: 10px;">
                        <table class="table table-striped">
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Registration Number</th>
                                <th>Establishment</th>
                                <th>Location</th>
                            </tr>
                            <?php
                            foreach ($student_details as $serial_no => $detail_row) {

                                echo '<tr>
                                <td>' . ($serial_no + 1) . '</td>
                                <td>' . $detail_row['firstname'] . " " . $detail_row['lastname'] . '</td>
                                <td>' . $detail_row['regNo'] . '</td>
                                <td>' . $detail_row['name'] . '</td>  
                                <td>' . ucfirst($detail_row['loc']) . '<td>   
                            </tr>';
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .txt_bold{
        font-weight: 600;
        font-variant: small-caps;
    }
    .std_no{
        font-size: 45px;
        font-weight: 700;
    }
</style>