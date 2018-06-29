<?php
$msgSel = "SELECT * FROM message WHERE SuperId = '$sup_id' ORDER BY id DESC";
$res = mysqli_query($link, $msgSel);
$msg_details = array();

while ($msg = mysqli_fetch_array($res)) {
    $msgRow = array();
    $msgRow['id'] = $msg['id'];
    $msgRow['subject'] = $msg['Subject'];
    $msgRow['message'] = $msg['Message'];
    $msgRow['senderId'] = $stId = $msg['SenderId'];
    $newt = mysqli_query($link, "SELECT * FROM students WHERE id = '$stId'");
    $catch = mysqli_fetch_assoc($newt);
    $msgRow['firstname'] = $catch['Firstname'];
    $msgRow['lastname'] = $catch['Lastname'];
    $msgRow['regNo'] = $catch['RegNumber'];

    array_push($msg_details, $msgRow);
}
?>
<div class="col-sm-12 segoe">
    <h3 style="margin-bottom:0;padding-bottom: 2" class="text-center txt_bold">Messages</h3>
    <div class="col-sm-12 table-responsive" style="margin-top: 10px;">
        <table class="table table-striped">
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Registration Number</th>
                <th>Subject</th>
                <th></th>
            </tr>
            <?php
            foreach ($msg_details as $serial_no => $message_row) { ?>

                <tr>
                                <td>' . ($serial_no + 1) . '</td>
                                <td>' . $message_row['firstname'] . " " . $message_row['lastname'] . '</td>
                                <td>' . $message_row['regNo'] . '</td>
                                <td>' . ucfirst($message_row['subject']) . '</td> 
                                <td><button class="btn btn-default" id="readMsg">Read</button></td>
                                
                            </tr>';
                
            }
           <?php } ?>
        </table>
        
    </div>
</div>

<!--<div class="modal fade" id="read-msg" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Messsage</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="well col-sm-12">

                        </div>
                        
                    </div>
                </div>
            </div>    
            <div class="modal-footer">
                <button class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>-->

<style>
    .txt_bold{
        font-weight: 600;
        font-variant: small-caps;
    }
</style>
<script>
    var stuff = true;
    function show() {
        //alert();
        if (stuff) {
            $("#replyMsg").removeClass('hidden');
            stuff = false;
        } else {
            $("#replyMsg").addClass('hidden');
            stuff = true;
        }

    }


</script>

<script>
    $(document).ready(function () {
        $("#readMsgDiv").hide();
    });

    $("#readMsg").click(function () {
        $("#readMsgDiv").toggle();
    });

</script>