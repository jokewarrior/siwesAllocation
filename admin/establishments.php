<?php
if (isset($_POST['sub_est'])) {
    $name = filter_input(INPUT_POST, 'name');
    $location = filter_input(INPUT_POST, 'location');
    $address = filter_input(INPUT_POST, 'address');

    if ($name == "" || $location == "" || $address == "") {
        $reg_prompt = "*Check fields";
    } else {
        $reg_user = "INSERT INTO establishment(Name, Location, Address)VALUES('{$name}','{$location}','{$address}')";
        $reg_query = mysqli_query($link, $reg_user);
        if ($reg_query) {
            $prompt = "Establishment Registration Successful";
        } else {
            $prompt = "Establishment Registration Failed";
        }
    }
}
?>
<div class="col-sm-12 segoe">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#ViewUser" data-toggle="tab">View Establishments</a></li>
        <li><a href="#CreateUser" data-toggle="tab">Add Establishments</a></li>
    </ul>
    <div class="tab-content">
        <?php
        $sel_est = "SELECT * FROM establishment ORDER BY ID DESC";
        $est_query = mysqli_query($link, $sel_est);
        $count = mysqli_num_rows($est_query);
        while ($estab = mysqli_fetch_array($est_query)) {
            $est_id[] = $estab['id'];
            $estab_name[] = $estab['Name'];
            $estab_loc[] = $estab['Location'];
            $estab_address[] = $estab['Address'];
        }
        ?>
        <div class="tab-pane active" id="ViewUser">
            <div class="col-sm-12 table-responsive" style="margin-top: 10px;">
                <table class="table table-striped">
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Location</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php for ($s = 0; $s < $count; $s++) { ?>
                        <tr>
                            <td><?php echo $s + 1 ?></td>
                            <td><?php echo ucfirst($estab_name[$s]); ?></td>
                            <td><?php echo $estab_address[$s]; ?></td>
                            <td><?php echo ucfirst($estab_loc[$s]); ?></td>
                            <!--<td><a href="#" class="lnk_col"><i class="fa fa-pencil"></i></a></td>-->
                            <td><a href="deleteEst.php?est_id=<?php echo $est_id[$s]; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $estab_name[$s];?> ???');" class="lnk_col"><i class="fa fa-trash "></i></a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="CreateUser">
            <div class="col-sm-8 col-sm-offset-2" style="margin-top: 10px;">
                <form method="POST" action="">
                    <div class="personal-details">
                        <h3 style="margin-bottom:0;padding-bottom: 2" class="text-center">Add New Establishment</h3>
                        <p class="text-center">Please make sure to fill all the following fields...</p>
                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <?php if (isset($prompt)) { ?>
                                <div class="" style="color:red;margin-bottom: 10px;font-weight: 600;"><?php echo $prompt; ?></div>
                            <?php } ?>
                            <div class="col-sm-12">
                                <input type="hidden" required name="" class="form-control cus-inp" value=""/>
                            </div>
                        </div>
                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <input type="text" required name="name" placeholder="Name" class="form-control cus-inp"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <input type="text" required name="address" placeholder="Address" class="form-control cus-inp"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <select class="form-control cus-inp" name="location">
                                    <option selected disabled>Location</option>
                                    <option value="abia">Abia</option>
                                    <option value="adamawa">Adamawa</option>
                                    <option value="akwa ibom">Akwa Ibom</option>
                                    <option value="anambra">Anambra</option>
                                    <option value="bauchi">Bauchi</option>
                                    <option value="bayelsa">Bayelsa</option>
                                    <option value="benue">Benue</option>
                                    <option value="borno">Borno</option>
                                    <option value="cross river">Cross River</option>
                                    <option value="delta">Delta</option>
                                    <option value="ebonyi">Ebonyi</option>
                                    <option value="edo">Edo</option>
                                    <option value="ekiti">Ekiti </option>
                                    <option value="enugu">Enugu</option>
                                    <option value="gombe">Gombe</option>
                                    <option value="imo">Imo</option>
                                    <option value="jigawa">Jigawa</option>
                                    <option value="kaduna">Kaduna</option>
                                    <option value="kano">Kano</option>
                                    <option value="katsina">Katsina</option>
                                    <option value="kebbi">Kebbi</option>
                                    <option value="kogi">Kogi</option>
                                    <option value="kwara">Kwara</option>
                                    <option value="lagos">Lagos</option>
                                    <option value="nassarawa">Nassarawa</option>
                                    <option value="niger">Niger</option>
                                    <option value="ogun">Ogun</option>
                                    <option value="ondo">Ondo</option>
                                    <option value="osun">Osun</option>
                                    <option value="oyo">Oyo</option>
                                    <option value="plateau">Plateau</option>
                                    <option value="rivers">Rivers</option>
                                    <option value="sokoto">Sokoto</option>
                                    <option value="taraba">Taraba</option>
                                    <option value="yobe">Yobe</option>
                                    <option value="zamfara">Zamfara</option>
                                    <option value="fct">FCT</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-8 col-sm-offset-2" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success btn-lg" name="sub_est">Submit <i class="fa fa-arrow-right"></i></button>
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