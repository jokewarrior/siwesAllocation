<?php
if (isset($_POST['send'])) {
    $subject = filter_input(INPUT_POST, 'subject');
    $message = filter_input(INPUT_POST, 'message');

    if ($subject == "" || $message == "") {
        $msg_prompt = "*Check Fields";
    } else {
        $qwary = "INSERT INTO message (Subject, Message, SenderId) VALUES('{$subject}', '{$message}', "
                . "'{$user_id}')";
        $msgReturn = mysqli_query($link, $qwary);
        if ($msgReturn) {
            $msg_prompt = "Message Sent successfully";
        }
    }
}
?>
<div class="row">
    <div class="col-sm-12">
        <form method="POST" action="">
            <div class="personal-details" style="margin-top:10px;">
                <p class="text-center">Please make sure to fill all the following fields...</p>
                <h5 class="text-center"> <span style="color:#c00;">*</span> make sure to specify the subject</h5>
                <?php if (isset($msg_prompt)) { ?>
                    <div class="col-sm-4 col-sm-offset-4" style="color:green;margin-bottom: 10px;"><?php echo $msg_prompt; ?></div>
                <?php } ?>
            </div>
            <div class="form-group col-sm-6 col-sm-offset-3" style="margin-top: 10px">
                <div class="col-sm-12">
                    <select class="form-control cus-inp" name="subject">
                        <option selected disabled>Subject</option>
                        <option value="Allocation Change">Allocation Change</option>
                        <option value="Password Issue">Password Issue</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-sm-6 col-sm-offset-3" style="margin-top: 10px">
                <div class="col-sm-12">
                    <textarea required name="message" placeholder="Message" class="form-control cus-inp" style="height:150px;"></textarea>
                </div>
            </div>
            <div class="form-group col-sm-4 col-sm-offset-4" style="margin-top: 10px">
                <button type="submit" name="send" class="btn btn-success">Send <i class="fa fa-arrow-right"></i></button>
            </div>
        </form>
    </div>
</div>