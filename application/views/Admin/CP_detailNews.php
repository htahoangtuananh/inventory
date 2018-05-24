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

</script>
<section class="content-header">
    <h1><?= $this->lang->line('News');?> : <?= $news['title'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open_multipart('Admin/viewNews/'.$news['news_id']); ?>
                            <div class="form-group">
                                <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Language')?></label>
                                <select class="form-control" id="lang" name="lang">
                                    <?php foreach($lang as $langs): ?>
                                        <option value="<?= $langs['lang_acronym']?>" <?php if($langs['lang_acronym'] == $news['lang']): ?> selected <?php endif;?>><?= $langs['lang_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
							<div class="form-group">
								<label for="type" class="text-align-left control-label"><?= $this->lang->line('Type')?></label>
								<select class="form-control" id="type" name="type">
									<option value="news" <?php if($news['type'] == 'news'): ?> selected <?php endif;?>><?= $this->lang->line('News')?></option>
									<option value="notify" <?php if($news['type'] == 'notify'): ?> selected <?php endif;?>><?= $this->lang->line('Notify')?></option>
									<option value="event" <?php if($news['type'] == 'event'): ?> selected <?php endif;?>><?= $this->lang->line('Event')?></option>
									<option value="intro" <?php if($news['type'] == 'intro'): ?> selected <?php endif;?>><?= $this->lang->line('Intro')?></option>
									<option value="recruit" <?php if($news['type'] == 'recruit'): ?> selected <?php endif;?>><?= $this->lang->line('Recruit')?></option>
									<option value="program" <?php if($news['type'] == 'program'): ?> selected <?php endif;?>><?= $this->lang->line('Program')?></option>
									<option value="outdoor" <?php if($news['type'] == 'outdoor'): ?> selected <?php endif;?>><?= $this->lang->line('Outdoor')?></option>
									<option value="tradition" <?php if($news['type'] == 'tradition'): ?> selected <?php endif;?>><?= $this->lang->line('Tradition')?></option>
								</select>
							</div>
							 <div class="form-group">
                                <label for="label" class="text-align-left control-label required"><?= $this->lang->line('News title')?></label>
                                <input type="text" name="title" class="form-control number-field" value="<?= $news['title'] ?>" required>
                            </div>
							<div class="form-group">
                                <label for="label" class="form-check-label"><?= $this->lang->line('Pin post')?></label>
                                <input type="checkbox" class="form-check-input" name="pin" <?php if($news['is_pin'] != 0 ):?>checked<?php endif;?>>
                            </div>
							<div class="form-group">
                                <label for="label" class="text-align-left control-label required"><?= $this->lang->line('News url')?></label>
								<i class="far fa-question-circle fa-sm tool-tip" data-toggle="tooltip" data-placement="top" title="<?= $this->lang->line('News url tooltip')?>"> </i>
                                <input type="text" name="url" class="form-control number-field" value="<?= $news['url'] ?>" required>
                            </div>
							<div class="form-check row">
								<div class="col-md-3">
									<input id="primary" type="checkbox" class="form-check-input" name="primary" <?php if($is_in_primary):?>checked<?php endif;?>>
									<label for="label" class="text-align-left control-label"><?= $this->lang->line('Primary')?></label>
								</div>
								<div class="col-md-3">
									<input id="primary_pin" type="checkbox" class="form-check-input" name="primary_pin" <?php if($is_in_primary['is_pin'] == 1):?>checked<?php endif;?>>
									<label for="label" class="text-align-left control-label"><?= $this->lang->line('Pin post')?></label>
								</div>
							</div>
							
							<div class="form-check row">
								<div class="col-md-3">
									<input id="secondary" type="checkbox" class="form-check-input" name="secondary" <?php if($is_in_secondary):?>checked<?php endif;?>>
									<label for="label" class="text-align-left control-label" ><?= $this->lang->line('Secondary')?></label>
								</div>
								<div class="col-md-3">
									<input id="secondary_pin" type="checkbox" class="form-check-input" name="secondary_pin" <?php if($is_in_secondary['is_pin'] == 1):?>checked<?php endif;?>>
									<label for="label"class="text-align-left control-label"><?= $this->lang->line('Pin post')?></label>
								</div>
							</div>
							
							<div class="form-check row">
								<div class="col-md-3">
									<input id="highschool" type="checkbox" class="form-check-input" name="highschool" <?php if($is_in_highschool):?>checked<?php endif;?>>
									<label for="label" class="text-align-left control-label"><?= $this->lang->line('Highschool')?></label>
								</div>
								<div class="col-md-3">
									<input id="highschool_pin" type="checkbox" class="form-check-input" name="highschool_pin" <?php if($is_in_highschool['is_pin'] == 1):?>checked<?php endif;?>>
									<label for="label" class="text-align-left control-label"><?= $this->lang->line('Pin post')?></label>
								</div>
                            </div>
							
                            <div class="form-group">
                                <label for="label" class="text-align-left control-label"><?= $this->lang->line('News content')?></label> 
                                <textarea id="news-content"  name="content" class="col-md-12 news-add my_editor" rows="5" ><?= htmlentities($news['content'])?></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
							<div class="form-group">
								<label for="fileUpload" class="text-align-left control-label"><?= $this->lang->line('News thumbnail')?></label>
								<input type="file" name="image" id="fileUpload" class="form-control" />
								<div id="image-holder">
									<img src="<?php if(isset($gallery_data)):?>
									<?= base_url().'assets/uploads/gallery/'.$gallery_data['gallery']?>
									<?php else:?>
									<?= base_url().'assets/uploads/news/'.$news['image']?>
									<?php endif;?>
									" 
									style="max-height: 300px">
								</div>
								<p><?= $this->lang->line('Thumbnail name')?> : <?= $news['ori_name']?></p>
								<a href="<?= base_url().'Admin/resizeImage/'.$news['image'].'/news'?>" class="btn btn-warning"><?= $this->lang->line('Crop image')?></a>
								<a id="getGallery" class ='btn btn-success' data-toggle="modal" data-target="#gallery"><i class="fa fa-plus"></i> <?= $this->lang->line('Add from gallery')?></a>
							</div>
							<?php if(isset($gallery_data)):?>
								<div class="form-group">
									<input type="hidden" name="image_file" value="<?= $gallery_data['gallery']?>">
								</div>
								<div class="form-group">
									<input type="hidden" name="ori_name" value="<?= $gallery_data['ori_name']?>">
								</div>
							<?php endif;?>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Thumbnail title')?></label>
								<input type="text" name="img_title" class="form-control" value="<?php if(isset($gallery_data)):?><?= $gallery_data['title'] ?><?php else:?><?= $news['img_title'] ?><?php endif;?>">
							</div>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Thumbnail alt')?></label>
								<input type="text" name="img_alt" class="form-control" value="<?php if(isset($gallery_data)):?><?= $gallery_data['alt']?><?php else:?><?= $news['alt'] ?><?php endif;?>">
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
