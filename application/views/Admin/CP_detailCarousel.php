<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/30/2017
 * Time: 8:51 AM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Carousel');?> : <?= $carousel['ori_name'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/viewCarousel/'.$carousel['carousel_id']); ?>
                            <div class="form-group">
                                <label for="class_link" class="text-align-left control-label"><?= $this->lang->line('Title')?></label>
                                <input type="text" name="img_title" class="form-control number-field" value="<?= $carousel['title'] ?>">
                            </div>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Alt')?></label>
								<input type="text" name="img_alt" class="form-control number-field" value="<?= $carousel['alt'] ?>">
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
