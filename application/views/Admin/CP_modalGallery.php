<style>
	.gallery-picker {
		visibility:hidden;
	}
	
	label {
		cursor: pointer;
	}
</style>
<div id="gallery" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Gallery')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('Admin/addFromGallery'); ?>
				<div class="row text-center text-lg-left gallery">
					<?php foreach ($gallery as $key => $gallery):?>
					<div class="col-lg-3 col-md-4 col-xs-6">
						<label for="gallery_image<?= $key?>">
							<img class="img-fluid gallery-picker-image-normal gallery-picker-image<?= $key?>" src="<?= base_url().'assets/uploads/gallery/'.$gallery['gallery']?>" height="170px" width="100%" style="object-fit: cover;">
							<input class="d-block mb-4 h-100 gallery-picker" data-image="gallery-picker-image<?= $key?>" type="radio" name="image_id" value="<?= $gallery['gallery_id']?>" id="gallery_image<?= $key?>">
						</label>
						<div class="form-group">
							<input type="hidden" name="destination" value="<?= $destination?>">
						</div>
					</div>
					<?php endforeach;?>
				</div>
            </div>
            <div class="modal-footer">
                <button id="model-gallery" type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>
