<div class="modal fade wide_modalform" id="<?php echo $modal_id; ?>" tabindex="-1" role="dialog" aria-labelledby="modalform" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                
                <h5 class="modal-title" id="modal_title"><?php echo $modal_title; ?></h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
          
            </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="container">
                            
                            <div class="row padding_top_medium">
                                <div class="col-lg-4"> <!-- LOCATION -->
                                    <label for="<?php echo $columns[1]; ?>" class="col-form-label"><?php echo $columns_strrep[1]; ?></label>
                                    <br>
                                    <select class="form-control" name="<?php echo $columns[1]; ?>">
                                        <?php foreach ($locations as $location) {
                                            echo '<option>$location</option';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row padding_bottom_medium">
                                <div class="col-lg-4"> <!-- DEPARTMENT -->
                                    <label for="<?php echo $columns[2]; ?>" class="col-form-label"><?php echo $columns_strrep[2]; ?></label>
                                    <br>
                                    <select class="form-control" name="<?php echo $columns[2]; ?>">
                                        <?php foreach ($departments as $department) {
                                            echo '<option>$department</option';
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row padding_top_medium">
                                <div class="col-lg-6"> <!-- TOOL DESCRIPTION -->
                                    <label for="<?php echo $columns[3]; ?>" class="col-form-label"><?php echo $columns_strrep[3]; ?></label>
                                    <br>
                                    <input type="text" class="form-control" name="<?php echo $columns[3]; ?>" placeholder="tool name...">
                                </div>

                                <div class="col-lg-4"> <!-- TOOL MODEL -->
                                    <label for="<?php echo $columns[4]; ?>" class="col-form-label"><?php echo $columns_strrep[4]; ?> #</label>
                                    <br>
                                    <input type="text" class="form-control" name="<?php echo $columns[4]; ?>" placeholder="">
                                </div>
                            </div>
                            <div class="row padding_bottom_medium">
                                <div class="col-lg-3"> <!-- TOOL SERIAL -->
                                    <label for="<?php echo $columns[5]; ?>" class="col-form-label"><?php echo $columns_strrep[5]; ?> #</label>
                                    <br>
                                    <input type="text" class="form-control" name="<?php echo $columns[5]; ?>" placeholder="ACD111...">
                                </div>

                                <div class="col-lg-3"> <!-- ASSET TAG -->
                                    <label for="<?php echo $columns[6]; ?>" class="col-form-label"><?php echo $columns_strrep[6]; ?></label>
                                    <br>
                                    <input type="text" class="form-control" name="<?php echo $columns[6]; ?>" placeholder="">
                                </div>

                                <div class="col-lg-2"> <!-- TOOL QUANTITY -->
                                    <label for="<?php echo $columns[8]; ?>" class="col-form-label"><?php echo $columns_strrep[8]; ?></label>
                                    <br>
                                    <!-- <input type="text" class="form-control" name="<?php echo $columns[8]; ?>" placeholder=""> -->
                                    <select class="form-control" name="<?php echo $columns[8]; ?>">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row padding_medium">
                                <div class="col-lg-4"> <!-- CONDITION ASSESSMENT -->
                                    <label for="<?php echo $columns[7]; ?>" class="col-form-label"><?php echo $columns_strrep[7]; ?></label>
                                    <br>
                                    <select class="form-control" name="<?php echo $columns[7]; ?>">
                                        <?php foreach ($assessments as $assessment) {
                                            echo '<option>$assessment</option';
                                        } ?>
                                    </select>
                                </div>

                                <div class="col-lg-4"> <!-- SINGLE UNIT VALUE -->
                                    <label for="<?php echo $columns[9]; ?>" class="col-form-label"><?php echo $columns_strrep[9]; ?></label>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control" name="<?php echo $columns[9]; ?>" placeholder="0.00"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row padding_bottom_medium">
                                <div class="col-lg-4"> <!-- TOTAL LINE VALUE -->
                                    <label for="<?php echo $columns[10]; ?>" class="col-form-label"><?php echo $columns_strrep[10]; ?></label>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control" name="<?php echo $columns[10]; ?>" placeholder="0.00"/>
                                    </div>
                                </div>

                                <div class="col-lg-4"> <!-- SPOT INVENTORY DATE -->
                                    <label for="<?php echo $columns[11]; ?>" class="col-form-label"><?php echo $columns_strrep[11]; ?></label>
                                    <br>
                                    <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name="<?php echo $columns[11]; ?>">
                                </div>
                            </div>

                            <div class="row padding_top_medium">
                                <div class="col-lg-4"> <!-- IMAGE -->
                                    <label for="<?php echo $columns[12]; ?>" class="col-form-label"><?php echo $columns_strrep[12]; ?></label>
                                    <br>
                                    <input type="file" name="<?php echo $columns[12]; ?>" class="form-control-file">
                                </div>
                            </div>

                            

                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-primary">Save new row</button>
                    </div>
            </form>
        </div>
    </div>
</div>