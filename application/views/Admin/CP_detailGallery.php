<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/30/2017
 * Time: 8:51 AM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Gallery');?> : <?= $gallery['name'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/viewGallery/'.$gallery['gallery_id']); ?>
							<div class="form-group">
								<label for="label" class="text-align-left control-label required"><?= $this->lang->line('Name')?></label>
								<input type="text" name="name" class="form-control" value="<?= $gallery['name'] ?>" required>
							</div>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Order')?></label>
								<input type="number" name="gallery_order" class="form-control number-field" min="1" value="<?= $gallery['gallery_order']?>">
							</div>
							<div class="form-group">
                                <label for="category" class="text-align-left control-label"><?= $this->lang->line('Category')?></label>
                                <select class="form-control" id="category" name="category">
									<option>--</option>
                                    <?php foreach($category as $categories): ?>
                                        <option value="<?= $categories['gallery_category_id']?>" <?php if($gallery['category_id'] == $categories['gallery_category_id']): ?> selected <?php endif;?>><?= $categories['category_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="class_link" class="text-align-left control-label"><?= $this->lang->line('Title')?></label>
                                <input type="text" name="img_title" class="form-control number-field" value="<?= $gallery['title'] ?>">
                            </div>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Alt')?></label>
								<input type="text" name="img_alt" class="form-control number-field" value="<?= $gallery['alt'] ?>">
							</div>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Description')?></label>
								<input type="text" name="img_description" class="form-control number-field" value="<?= $gallery['description'] ?>">
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
					<img src="<?= base_url().'assets/uploads/gallery/'.$gallery['gallery']?>" width="100%">
					<a href="<?= base_url().'Admin/resizeImage/'.$gallery['gallery'].'/gallery'?>" class="btn btn-success"><?= $this->lang->line('Crop image')?></a>
				</div>
			</div>
		</div>
    </div>
</section>
</div>
