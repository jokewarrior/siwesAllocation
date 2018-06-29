<?php
if ($estId == 0) {
    $notprompt = 'You do not have any Internship allocation Yet';
} else {
    $sucprompt = 'you have been Allocated to . . .';
}
?>
<div class="col-sm-12 segoe">
    <?php if (isset($notprompt)) { ?>
        <h3 style="margin-bottom:0;padding-bottom: 2" class="text-center txt_bold"><?php echo $notprompt; ?></h3>
        <p class="text-center">Click on button to get Allocation</p>
        <div class="col-sm-12" style="margin-top: 10px;">
            <div class="col-sm-6 col-sm-offset-4">
                <a href="assign.php" type="submit" class="btn btn-success btn-lg" name="get_est">Get allocation <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    <?php }; ?>
    <?php
    $getEst = "SELECT * FROM establishment where id ='$estId'";
    $getEstRun = mysqli_query($link, $getEst);
    if (mysqli_num_rows($getEstRun) == 1) {
        $row = mysqli_fetch_assoc($getEstRun);
        $comp_name = $row['Name'];
        $comp_add = $row['Address'];
        $comp_loc = $row['Location'];
    }
    ?>
    <?php if (isset($sucprompt)) { ?>
        <h3 style="margin-bottom:0;padding-bottom: 2" class="text-center txt_bold"><?php echo $sucprompt; ?></h3>
        <p class="text-center"></p>
        <div class="col-sm-12" style="margin-top: 10px;">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="entxt txt_bold"><?php echo ucfirst($comp_name); ?></div>
                <div class="entxt txt_bold"><i class="fa fa-home"></i> <?php echo ucfirst($comp_add); ?></div>
                <div class="entxt txt_bold"><i class="fa fa-map-marker"></i> <?php echo ucfirst($comp_loc); ?></div>
            </div>
            <div class="col-sm-12" style="margin-top: 10px;">
                <div class="col-sm-6 col-sm-offset-4">
                    <a href="print.php" type="submit" class="btn btn-success btn-lg" name="print">Print Slip <i class="fa fa-arrow-right"></i></a>
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