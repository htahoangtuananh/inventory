<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 3/19/2018
 * Time: 10:42 AM
 */
 if(isset($this->session->gallery)){
	$gallery_data =  $this->session->gallery;
 }
?>
<script>
	$
</script>
<section class="content-header">
    <h4 class="modal-title"><?= $this->lang->line('Add new product')?></h4>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open_multipart('Admin/addProduct/'); ?>
                            <div class="form-group">
                                <label for="gender_id" class="text-align-left control-label"><?= $this->lang->line('Gender Id')?></label>
                                <select class="form-control" id="gender_id" name="gender_id">
                                    <?php foreach($gender as $genders): ?>
                                        <option value="<?= $genders['product_gender_id']?>"><?= $genders['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
							<div class="form-group">
                                <label for="type_id" class="text-align-left control-label"><?= $this->lang->line('Type Id')?></label>
                                <select class="form-control" id="type_id" name="type_id">
                                    <?php foreach($type as $types): ?>
                                        <option value="<?= $types['product_type_id']?>"><?= $types['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
							<div class="form-group">
								<label for="type" class="text-align-left control-label"><?= $this->lang->line('Type')?></label>
								<select class="form-control" id="type" name="type">
									<option value="news" ><?= $this->lang->line('News')?></option>
									<option value="notify"><?= $this->lang->line('Notify')?></option>
									<option value="event"><?= $this->lang->line('Event')?></option>
									<option value="intro"><?= $this->lang->line('Intro')?></option>
									<option value="recruit"><?= $this->lang->line('Recruit')?></option>
									<option value="program"><?= $this->lang->line('Program')?></option>
									<option value="outdoor"><?= $this->lang->line('Outdoor')?></option>
									<option value="tradition"><?= $this->lang->line('Tradition')?></option>
								</select>
							</div>
							<div class="form-group">
                                <label for="label" class="text-align-left control-label required"><?= $this->lang->line('News title')?></label>
                                <input id="news-title" type="text" name="title" class="form-control number-field" required>
                            </div>
							<div class="form-check">
                                <label for="label" class="text-align-left control-label"><?= $this->lang->line('Pin post')?></label>
                                <input type="checkbox" class="form-check-input" name="pin">
                            </div>
							
							<div class="form-check row">
								<div class="col-md-3">
									<input id="primary" type="checkbox" class="form-check-input" name="primary">
									<label for="label" class="text-align-left control-label"><?= $this->lang->line('Primary')?></label>
								</div>
								<div class="col-md-3">
									<input id="primary_pin" type="checkbox" class="form-check-input" name="primary_pin">
									<label for="label" class="text-align-left control-label"><?= $this->lang->line('Pin post')?></label>
								</div>
							</div>
							
							<div class="form-check row">
								<div class="col-md-3">
									<input id="secondary" type="checkbox" class="form-check-input" name="secondary">
									<label for="label" class="text-align-left control-label" ><?= $this->lang->line('Secondary')?></label>
								</div>
								<div class="col-md-3">
									<input id="secondary_pin" type="checkbox" class="form-check-input" name="secondary_pin">
									<label for="label"class="text-align-left control-label"><?= $this->lang->line('Pin post')?></label>
								</div>
							</div>
							
							<div class="form-check row">
								<div class="col-md-3">
									<input id="highschool" type="checkbox" class="form-check-input" name="highschool">
									<label for="label" class="text-align-left control-label"><?= $this->lang->line('Highschool')?></label>
								</div>
								<div class="col-md-3">
									<input id="highschool_pin" type="checkbox" class="form-check-input" name="highschool_pin">
									<label for="label" class="text-align-left control-label"><?= $this->lang->line('Pin post')?></label>
								</div>
                            </div>
							
                            <div class="form-group">
                                <label for="label" class="text-align-left control-label"><?= $this->lang->line('News content')?></label> 
                                <textarea id="news-content"  name="content" class="col-md-12 news-add my_editor" rows="5" ></textarea>
                            </div>
                            <div class="form-group">
								<label for="fileUpload" class="text-align-left control-label"><?= $this->lang->line('News thumbnail')?></label>
								<input type="file" name="image" id="fileUpload" class="form-control" />
								<div id="image-holder">
									<?php if(isset($gallery_data)):?>
										<img src="<?= base_url().'assets/uploads/gallery/'.$gallery_data['gallery']?>" height="200px" style="max-width:100%">
									<?php endif;?>
								</div>
								<a id="getGallery" class ='btn btn-success' data-toggle="modal" data-target="#gallery"><i class="fa fa-plus"></i> <?= $this->lang->line('Add from gallery')?></a>
							</div>
							<?php if(isset($gallery_data)):?>
								<div class="form-group">
									<input type="hidden" name="image_file" value="<?= $gallery_data['gallery']?>">
								</div>
								<div class="form-group">
									<input type="hidden" name="ori_image" value="<?= $gallery_data['ori_name']?>">
								</div>
							<?php endif;?>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Thumbnail title')?></label>
								<input type="text" name="img_title" class="form-control" <?php if(isset($gallery_data)):?>value="<?= $gallery_data['title']?>"<?php endif;?>>
							</div>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Thumbnail alt')?></label>
								<input type="text" name="img_alt" class="form-control" <?php if(isset($gallery_data)):?>value="<?= $gallery_data['alt']?>"<?php endif;?>>
							</div>
                            <div class="form-group">
                                <button id="news-submit" type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
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

<script>
	$( window ).unload(function() {
		sessionStorage.setItem("title", $('#news-title').val());
		sessionStorage.setItem("content", $('#news-content').val());
		sessionStorage.setItem("lang", $('#lang').val());
		sessionStorage.setItem("type", $('#type').val());
	});
	
	window.onload=function(){
		if (localStorage.getItem("title") != null) {
			document.getElementById('news-title').value = sessionStorage.getItem('title');
		}
		if (localStorage.getItem("content") != null) {
			tinyMCE.get('news-content').setContent(sessionStorage.getItem('content'));
		}
		if (localStorage.getItem("lang") != null) {
			document.getElementById('lang').value = sessionStorage.getItem('lang');
		}
		if (localStorage.getItem("type") != null) {
			document.getElementById('type').value = sessionStorage.getItem('type');
		}
	};
	
</script>
<style>
	.gallery-picker {
		visibility:hidden;
	}
	
	label {
		cursor: pointer;
	}
</style>
<div id="tinymce_gallery" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Gallery')?></h4>
            </div>
            <div class="modal-body">
				<div class="row text-center text-lg-left gallery">
					<?php foreach ($gallery as $key => $gallery):?>
					<div class="col-lg-3 col-md-4 col-xs-6">
						<label for="gallery_image<?= $key?>">
							<img class="img-fluid gallery-picker-image-normal gallery-picker-image<?= $key?>" src="<?= base_url().'assets/uploads/gallery/'.$gallery['gallery']?>" height="170px" width="100%" style="object-fit: cover;">
							<input class="d-block mb-4 h-100 gallery-picker" data-image="gallery-picker-image<?= $key?>" type="radio" name="image_id" value="<?= $gallery['gallery']?>" id="gallery_image<?= $key?>">
						</label>
					</div>
					<?php endforeach;?>
				</div>
            </div>
            <div class="modal-footer">
                <button id="tinymce_gallery_button" type="button" class="btn btn-primary"><?= $this->lang->line('Add')?></button>
            </div>
        </div>

    </div>
</div>





