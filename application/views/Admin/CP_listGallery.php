<script>
	$(document).ready(function(){
		$('.gallery-toggle').click(function(){
			var button =  $(this).attr('data-gallery');
			$('#'.button).toggle();
		});
	});
</script>
<section class="content-header">
    <h1><?= $this->lang->line('Manage gallery'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
	<?php if(in_array('canCreateGallery',$this->permission)):?>
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addGallery"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new gallery')?></a>
	<?php endif;?>
    </div>
    <div class="box box-default">
        <div class="box-body">
			<div class="row text-center text-lg-left gallery">
				<?php foreach ($gallery as $key => $gallery):?>
				<div class="col-lg-3 col-md-4 col-xs-6">
					<a data-toggle="collapse" href="#collapse<?= $key?>" class="d-block mb-4 h-100 gallery-toggle" data-gallery="<?= $key?>" >
						<img class="img-fluid" src="<?= base_url().'assets/uploads/gallery/'.$gallery['gallery']?>" alt="" height="200px" width="100%" style="object-fit: cover;<?php if($gallery['is_enable']==1): ?> border: 3px solid #2ecc71<?php endif;?>" >
					</a>
					<div class="collapse" id="collapse<?= $key?>">
						<a href="<?= base_url().'Admin/viewGallery/'.$gallery['gallery_id']?>" class="btn btn-default col-md-4"><i class="fa fa-eye fa-fw"></i> <?= $this->lang->line('Update')?></a>
						<?php if(in_array('canDeleteGallery',$this->permission)):?>
							<a href="<?= base_url().'Admin/deleteGallery/'.$gallery['gallery_id']?>" class="btn btn-danger col-md-4"><i class="fa fa-times fa-fw"></i> <?= $this->lang->line('Delete')?></a>
						<?php endif;?>
						<?php if(in_array('canReviewGallery',$this->permission)):?>
							<a class="toggle-button col-md-4"><input data-id="<?= $gallery["gallery_id"]; ?>" data-table="gallery" data-enable='<?= $gallery['is_enable'];?>'  class="toggle" <?php if($gallery['is_enable']==1):?>checked<?php endif;?> data-toggle="toggle" type="checkbox"></a>
						<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</section>
<div id="addGallery" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new gallery')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addGallery'); ?>
				<div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Name')?></label>
                    <input type="text" name="name" class="form-control">
                </div>
				<div class="form-group">
					<label for="label" class="text-align-left control-label"><?= $this->lang->line('Order')?></label>
					<input type="number" name="gallery_order" class="form-control number-field" min="1">
				</div>
				<div class="form-group">
					<label for="category" class="text-align-left control-label"><?= $this->lang->line('Category')?></label>
					<select class="form-control" id="category" name="category">
							<option>--</option>
						<?php foreach($category as $categories): ?>
							<option value="<?= $categories['gallery_category_id']?>"><?= $categories['category_name']?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Title')?></label>
                    <input type="text" name="img_title" class="form-control">
                </div>
				<div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Alt')?></label>
                    <input type="text" name="img_alt" class="form-control">
                </div>
				<div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Description')?></label>
                    <input type="text" name="img_description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="carousel_img" class="text-align-left control-label"><?= $this->lang->line('Gallery image')?></label>
                    <input id="fileUpload" type="file" name="gallery"/>
                    <div id="image-holder"> </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>
<script>
    $('.toggle-button').click(function(){
        var table = $(this).find('input').attr('data-table');
        var target_id = $(this).find('input').attr('data-id');
        var enable = $(this).find('input').attr('data-enable');
        enable = (enable==0)? 1:0;

        var csrf = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            data: {'id': target_id,'table': table, 'enable': enable, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrf_token},
            type: "POST",
            url: '<?= base_url()."Admin/handleAjax"?>',
        }).success(function (result) {
            location.reload();
        });
    });
</script>