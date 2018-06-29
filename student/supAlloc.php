<?php
if ($supId == 0) {
    $notprompt = 'You do not have any Supervisor Yet';
} else {
    $sucprompt = 'you have been Assigned to . . .';
}
?>
<div class="col-sm-12 segoe">
    <?php if (isset($notprompt)) { ?>
        <h3 style="margin-bottom:0;padding-bottom: 2" class="text-center txt_bold"><?php echo $notprompt; ?></h3>
        <p class="text-center">Click on button to get Allocation</p>
        <div class="col-sm-12 table-responsive" style="margin-top: 10px;">
            <div class="col-sm-6 col-sm-offset-4">
                <a href="supAssign.php" type="submit" class="btn btn-success btn-lg" name="get_est">Get Supervisor <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    <?php }; ?>
    <?php
    $getSup = "SELECT * FROM supervisor where id ='$supId'";
    $getSupRun = mysqli_query($link, $getSup);
    if (mysqli_num_rows($getSupRun) == 1) {
        $row = mysqli_fetch_assoc($getSupRun);
        $comp_name = $row['Name'];
        $comp_email = $row['Email'];
        $comp_phone = $row['Phone'];
    }
    ?>
    <?php if (isset($sucprompt)) { ?>
        <h3 style="margin-bottom:0;padding-bottom: 2" class="text-center txt_bold"><?php echo $sucprompt; ?></h3>
        <p class="text-center"></p>
        <div class="col-sm-12 table-responsive" style="margin-top: 10px;">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="entxt txt_bold"><?php echo ucfirst($comp_name); ?></div>
                <div class="entxt txt_bold"><i class="fa fa-home"></i> <?php echo ucfirst($comp_email); ?></div>
                <div class="entxt txt_bold"><i class="fa fa-map-marker"></i> <?php echo ucfirst($comp_phone); ?></div>
            </div>

            <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Send Message</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="POST" action="">
                                        <div class="personal-details" style="margin-top:10px;">
                                            <p class="text-center">Please make sure to fill all the following fields...</p>
                                        </div>
                                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                                            <div class="col-sm-12">
                                                <input type="text" required name="subject" placeholder="Subject" class="form-control cus-inp"/>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                                            <div class="col-sm-12">
                                                <textarea required name="message" placeholder="Message" class="form-control cus-inp"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4 col-sm-offset-4" style="margin-top: 10px">
                                            <button type="submit" name="send" class="btn btn-success">Send <i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>    

                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    <?php }; ?>
</div>
<style>
    .txt_bold{
        font-weight: 600;
        font-variant: small-caps;
    }
    .entxt{
        font-size: 28px;
    }
</style>