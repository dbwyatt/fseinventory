
<div class="modal fade wide_modalform" id="<?php echo $modal_id; ?>" tabindex="-1" role="dialog" aria-labelledby="modalform" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                
                <h5 class="modal-title" id="modal_title"><?php echo $modal_title; ?></h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
          
            </div>
            
            <div class="modal-body">
                
                <div class="container">
                    
                        <?php
                            
                            $col_count = 0;
                            $div_added = false;
                            $array_iteration = 0;
                            $array_length = count($columns);

                            foreach ($columns as $column) {
                                $array_iteration++;
                                // only show options we will allow chainging manually
                                if (!in_array(strtolower($column), $hidden_values)) {
                                    // form formatting
                                    if ($col_count == 0 && $div_added == false) {
                        ?>
                                        <div class="row">
                        <?php
                                    }
                                    if ($col_count < 2) {
                        ?>
                                            <div class="col-sm-4">
                                                <label for="<?php echo $column; ?>" class="col-form-label"><?php echo $column; ?></label>
                                                <br>
                                                <input type="text" class="form-control" name="" placeholder="test">
                                            </div>

                        <?php
                                        if ($col_count == 1) {
                        ?>
                                            </div>
                        <?php
                                        }
                                        $col_count++;
                                    }
                                    else {
                                        $col_count = 0;
                                        if ($array_iteration < $array_length) {
                        ?>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="<?php echo $column; ?>" class="col-form-label"><?php echo $column; ?></label>
                                                    <br>
                                                    <input type="text" class="form-control" name="" placeholder="test">
                                                </div>
                        <?php
                                            $div_added = true;
                                        }
                                        elseif ($array_iteration == $array_length) {
                        ?>
                                            </div>
                        <?php
                                        }
                                    }
                                }
                            }
                        ?>
                    
                </div>

            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>

        </div>
    </div>
</div>