<div class="col-sm-12 segoe">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#ViewUser" data-toggle="tab">View Students</a></li>
    </ul>
    <div class="tab-content">
        <?php
        $sel_users = "SELECT * FROM students WHERE SupervisorId = '$sup_id' ORDER BY ID DESC";
        $sel_query = mysqli_query($link, $sel_users);
        $student_details = array();
        //$count = mysqli_num_rows($sel_query);
        
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
        <div class="" id="ViewUser">
            <div class="col-sm-12 table-responsive" style="margin-top: 10px;">
                <table class="table table-striped">
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Reg Number</th>
                        <th>Establishment</th>
                        <th>Location</th>
                    </tr>
                    <?php
                    foreach ($student_details as $serial_no => $detail_row) {

                        echo '<tr>
                                <td>' . ($serial_no + 1) . '</td>
                                <td>' . $detail_row['firstname']." ".$detail_row['lastname'] . '</td>
                                <td>' . $detail_row['regNo'] . '</td>
                                <td>' . $detail_row['name'] . '</td>  
                                <td>' . ucfirst($detail_row['loc']). '<td>   
                            </tr>';
                    }
                    ?>
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