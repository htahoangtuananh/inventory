<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/30/2017
 * Time: 8:51 AM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Sponsor');?> : <?= $sponsor['sponsor_name'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/viewSponsor/'.$sponsor['sponsor_id']); ?>
							<div class="form-group">
                                <label for="class_link" class="text-align-left control-label required"><?= $this->lang->line('Sponsor name')?></label>
                                <input type="text" name="name" class="form-control number-field" value="<?= $sponsor['sponsor_name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="class_link" class="text-align-left control-label"><?= $this->lang->line('Link')?></label>
                                <input type="text" name="link" class="form-control number-field" value="<?= $sponsor['link'] ?>">
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
