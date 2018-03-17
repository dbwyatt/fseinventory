<script>
    $('#priceInput3').change(function(){
        $('#priceInput3').val(parseFloat($('#priceInput3').val()).toFixed(2));});
    $('#priceInput4').change(function(){
        $('#priceInput4').val(parseFloat($('#priceInput4').val()).toFixed(2));});
</script>

<div class="modal fade wide_modalform" id="<?php echo $modal_id; ?>" tabindex="-1" role="dialog" aria-labelledby="modalform" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                
                <h5 class="modal-title" id="modal_title"><?php echo $modal_title; ?></h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
          
            </div>
                <form action="tools/update_entry" method="post">
                    <div class="modal-body">
                        <div class="container">
                            
                            <div class="row padding_top_medium">
                                                      <!-- HIDDEN ID -->
                                <input type="hidden" name="id" value="<?php echo (isset($id)?$id:NULL); ?>">

                                <div class="col-lg-4"> <!-- LOCATION -->
                                    <label for="location_id" class="col-form-label">Location</label>
                                    <br>
                                    <select class="form-control" name="location_id">
                                        <option value="0">-- Select a Location --</option>
                                        <?php foreach ($locations as $l) {
                                            echo '<option value='.$l["id"].' '.(isset($location_id)?($location_id==$l['id']?"selected":""):"").'>'.$l["location"].'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row padding_bottom_medium">
                                <div class="col-lg-4"> <!-- DEPARTMENT -->
                                    <label for="department_id" class="col-form-label">Department</label>
                                    <br>
                                    <select class="form-control" name="department_id">
                                        <option value="0">-- Select a Department --</option>
                                        <?php foreach ($departments as $d) {
                                            echo '<option value='.$d["id"].' '.(isset($department_id)?($department_id==$d['id']?"selected":""):"").'>'.$d['department'].'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row padding_top_medium">
                                <div class="col-lg-3"> <!-- VEHICLE MAKE -->
                                    <label for="vehicle_make" class="col-form-label">Vehicle Make / Company</label>
                                    <br>
                                    <input type="text" class="form-control" name="vehicle_make" placeholder="jeep" value="<?php echo((isset($vehicle_make)? $vehicle_make : "")) ?>">
                                </div>

                                <div class="col-lg-6"> <!-- VEHICLE MODEL -->
                                    <label for="vehicle_model" class="col-form-label">Vehicle Model</label>
                                    <br>
                                    <input type="text" class="form-control" name="vehicle_model" placeholder="vehicle model, i.e. grand cherokee..." value="<?php echo((isset($vehicle_model)? $vehicle_model : "")) ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2"> <!-- VEHICLE YEAR -->
                                    <label for="vehicle_year" class="col-form-label">Production Year</label>
                                    <br>
                                    <select class="form-control" name="vehicle_year">
                                        <option value="0">-- Year --</option>
                                        <?php for($i=(date('Y')+1);$i>1899;$i--){echo '<option value="'.$i.'"'.(isset($vehicle_year)?($vehicle_year==$i?"selected":""):"").'>'.$i.'</option>';} ?>
                                    </select>
                                </div>

                                <div class="col-lg-2"> <!-- ODOMETER -->
                                    <label for="odometer" class="col-form-label">Odometer</label>
                                    <br>
                                    <input type="number" class="form-control" name="odometer" placeholder="24000..." value="<?php echo((isset($odometer)? $odometer : "")) ?>" required>
                                </div>

                                <div class="col-lg-3"> <!-- CONDITION ASSESSMENT -->
                                    <label for="condition_assessment_id" class="col-form-label">Vehicle Condition</label>
                                    <br>
                                    <select class="form-control" name="condition_assessment_id">
                                        <?php foreach ($condition_assessments as $ca) {
                                            echo '<option value='.$ca["id"].' '.(isset($condition_assessments)?($condition_assessments==$ca['id']?"selected":""):"").'>'.$ca["assessment"].'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2"> <!-- LICENSE STATE -->
                                    <label for="license_state" class="col-form-label">License State</label>
                                    <br>
                                    <select class="form-control" name="license_state">
                                        <option value="0">-- Select State --</option>
                                        <?php foreach ($states_index as $s) {
                                            echo '<option value='.$d["id"].' '.(isset($license_state)?($license_state==$s['id']?"selected":""):"").'>'.$s['state'].'</option>';
                                        } ?>
                                    </select>
                                </div>

                                <div class="col-lg-4"> <!-- LICENSE PLATE # -->
                                    <label for="license_plate" class="col-form-label">License Plate #</label>
                                    <br>
                                    <input type="text" class="form-control" name="license_plate" placeholder="123456..." value="<?php echo((isset($license_plate)? $license_plate : "")) ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4"> <!-- VIN NUMBER -->
                                    <label for="vin_number" class="col-form-label">VIN #</label>
                                    <br>
                                    <input type="text" class="form-control" name="vin_number" placeholder="5TDYK3DC6FS545662..." value="<?php echo((isset($vin_number)? $vin_number : "")) ?>">
                                    <small id="vin_help" class="form-text text-muted">17 digit unique code</small>
                                </div>

                                <div class="col-lg-2"> <!-- ASSET TAG -->
                                    <label for="asset_tag" class="col-form-label">Asset Tag</label>
                                    <br>
                                    <input type="text" class="form-control" name="asset_tag" placeholder="123456..." value="<?php echo((isset($asset_tag)? $asset_tag : "")) ?>">
                                </div>
                            </div>

                            <div class="row padding_medium">
                                <div class="col-lg-4"> <!-- PURCHASE PRICE -->
                                    <label for="purchase_price" class="col-form-label">Purchase Price</label>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input id="priceInput1" type="number" class="form-control" name="purchase_price" placeholder="0.00" value="<?php echo((isset($purchase_price)? $purchase_price : "")) ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row padding_bottom_medium">
                                <div class="col-lg-4"> <!-- SPOT INVENTORY DATE -->
                                    <label for="spot_inventory_date" class="col-form-label">Inventory Date</label>
                                    <br>
                                    <input class="form-control" type="date" value="<?php echo(isset($spot_inventory_date)? date('Y-m-d',strtotime($spot_inventory_date)) : date('Y-m-d')); ?>" name="spot_inventory_date" required>
                                </div>
                            </div>

                            <div class="row padding_top_medium">
                                <div class="col-lg-4"> <!-- IMAGE -->
                                    <label for="image" class="col-form-label">Image</label>
                                    <br>
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
        </div>
    </div>
</div>