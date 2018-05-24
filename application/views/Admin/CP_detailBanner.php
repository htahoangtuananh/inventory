<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/30/2017
 * Time: 8:51 AM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Banner');?> : <?= $banner['ori_name'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/viewBanner/'.$banner['banner_id']); ?>
							<div class="form-group">
                                <label for="class_link" class="text-align-left control-label required"><?= $this->lang->line('Name')?></label>
                                <input type="text" name="name" class="form-control number-field" value="<?= $banner['name'] ?>" required>
                            </div>
							<div class="form-group">
                                <label for="label" class="text-align-left control-label"><?= $this->lang->line('Order')?></label>
                                <input type="number" name="banner_order" class="form-control number-field" value="<?= $banner['banner_order'] ?>" max="<?= count($banner) ?>" min="1">
                            </div>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Link')?></label>
								<input type="url" name="link" class="form-control" value="<?= $banner['link'] ?>">
							</div>
                            <div class="form-group">
                                <label for="class_link" class="text-align-left control-label"><?= $this->lang->line('Title')?></label>
                                <input type="text" name="img_title" class="form-control number-field" value="<?= $banner['title'] ?>">
                            </div>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Alt')?></label>
								<input type="text" name="img_alt" class="form-control number-field" value="<?= $banner['alt'] ?>">
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
		<div class="col-md-5">
			<div class="box box-primary">
                <div class="box-body">
					<img src="<?= base_url().'assets/uploads/banner/'.$banner['banner']?>" width="100%">
					<a href="<?= base_url().'Admin/resizeImage/'.$banner['banner'].'/banner'?>" class="btn btn-success"><?= $this->lang->line('Crop image')?></a>
				</div>
			</div>
		</div>
    </div>
</section>
</div>
