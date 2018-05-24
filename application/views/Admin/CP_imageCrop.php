<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/30/2017
 * Time: 8:51 AM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Crop image');?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/cropImage/', array('id' => 'coords', 'class' => 'coords')); ?>
							
							<img src="<?= base_url().'assets/uploads/'.$image ?>" id="target"  alt="">
							 <div class="inline-labels">
							 <div class="form-group">
								<label><?= $this->lang->line('Ratio');?></label>
								<select id="ratio-select" class="custom-select form-control">
									<option value="0">Free crop</option>
									<option value="4/3">4:3</option>
									<option value="16/9">16:9</option>
									<option value="16/10">16:10</option>
									<option value="16/6">16:6</option>
								</select>
							 </div>
								<input type="text" size="4" name="type" class=" hidden" value="<?= $type?>"/>
								<input type="text" size="4" name="filename" class=" hidden" value="<?= $filename?>"/>
								<input type="text" size="4" name="image" class=" hidden" value="<?= $image?>"/>
								<input type="text" size="4" id="x" name="x" class=" hidden"/>
								<input type="text" size="4" id="y" name="y" class=" hidden"/>
								<label><?= $this->lang->line('Width');?></label><input class="form-control" type="text" size="4" id="w" name="w" />
								<label><?= $this->lang->line('Height');?></label><input class="form-control" type="text" size="4" id="h" name="h" />
							</div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</section>
</div>
