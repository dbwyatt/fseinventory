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
                <form action="offices/update_entry" method="post">
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
                                            echo '<option value='.$l["id"].' '.(isset($location_id)?($location_id==$l['id']?"selected":""):"").'>'. $l["location"].'</option>';
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
                                <div class="col-lg-6"> <!-- OFFICE ITEM -->
                                    <label for="office_item" class="col-form-label">Office Item</label>
                                    <br>
                                    <input type="text" class="form-control" name="office_item" placeholder="office item name..." value="<?php echo((isset($office_item)? $office_item : "")) ?>" required>
                                </div>

                                <div class="col-lg-4"> <!-- ITEM MODEL -->
                                    <label for="item_model" class="col-form-label">Item Model #</label>
                                    <br>
                                    <input type="text" class="form-control" name="item_model" placeholder="" value="<?php echo((isset($item_model)? $item_model : "")) ?>">
                                </div>
                            </div>
                            <div class="row padding_bottom_medium">
                                <div class="col-lg-3"> <!-- ITEM SERIAL -->
                                    <label for="item_serial" class="col-form-label">Item Serial #</label>
                                    <br>
                                    <input type="text" class="form-control" name="item_serial" placeholder="A1B2C3..." value="<?php echo((isset($item_serial)? $item_serial : "")) ?>">
                                </div>

                                <div class="col-lg-3"> <!-- ASSET TAG -->
                                    <label for="asset_tag" class="col-form-label">Asset Tag</label>
                                    <br>
                                    <input type="text" class="form-control" name="asset_tag" placeholder="123456..." value="<?php echo((isset($asset_tag)? $asset_tag : "")) ?>">
                                </div>

                                <div class="col-lg-2"> <!-- ITEM QUANTITY -->
                                    <label for="item_quantity" class="col-form-label">Item Quantity</label>
                                    <br>
                                    <select class="form-control" name="item_quantity">
                                        <?php for ($i=1;$i<21;$i++){echo '<option value="'.$i.'"'.(isset($item_quantity)?($item_quantity==$i?"selected":""):"").'>'.$i.'</option>';} ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row padding_medium">
                                <div class="col-lg-4"> <!-- CONDITION ASSESSMENT -->
                                    <label for="condition_assessment_id" class="col-form-label">Item Condition</label>
                                    <br>
                                    <select class="form-control" name="condition_assessment_id">
                                        <?php foreach ($condition_assessments as $ca) {
                                            echo '<option value='.$ca["id"].' '.(isset($condition_assessments)?($condition_assessments==$ca['id']?"selected":""):"").'>'.$ca["assessment"].'</option>';
                                        } ?>
                                    </select>
                                </div>

                                <div class="col-lg-4"> <!-- SINGLE UNIT VALUE -->
                                    <label for="single_unit_value" class="col-form-label">Item Value</label>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input id="priceInput3" type="number" class="form-control" name="single_unit_value" placeholder="0.00" value="<?php echo((isset($single_unit_value)? $single_unit_value : "")) ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row padding_bottom_medium">
                                <div class="col-lg-4"> <!-- TOTAL LINE VALUE -->
                                    <label for="total_line_value" class="col-form-label">Group Total Value</label>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input id="priceInput4" type="number" class="form-control" name="total_line_value" placeholder="0.00" value="<?php echo((isset($total_line_value)? $total_line_value : "")) ?>" required>
                                    </div>
                                </div>

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