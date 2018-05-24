<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 3/21/2018
 * Time: 4:26 PM
 */

?>
<script>
$('a#getGallery').on('click', function(e){
  e.preventDefault();
  $('#gallery').modal('show').find('.modal-body').load($(this).attr('href'));
});
</script>
<section class="content-header">
    <h1><?= $this->lang->line('Manage banner'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
	<?php if(in_array('canCreateBanner', $this->permission)):?>
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addBanner"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new banner')?></a>
		<a id="getGallery"  href="<?= base_url().'Admin/getGallery/'?>" class ='btn btn-success' data-toggle="modal" data-target="#gallery"><i class="fa fa-plus"></i> <?= $this->lang->line('Add from gallery')?></a>
    <?php endif;?>
	</div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Name'); ?></th>
					<th><?= $this->lang->line('Order'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
					<th><?= $this->lang->line('Created by'); ?></th>
					<?php if(in_array('canReviewBanner', $this->permission)):?>
						<th><?= $this->lang->line('Enable'); ?></th>
					<?php endif;?>
					
                    <?php if(in_array('canDeleteBanner', $this->permission)):?>
						<th class="deleteLink"><?= $this->lang->line('Delete') ?></th>
					<?php endif;?>
                
				</tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Name'); ?></th>
					<th><?= $this->lang->line('Order'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
					<th><?= $this->lang->line('Created by'); ?></th>
                    <?php if(in_array('canReviewBanner', $this->permission)):?>
						<th><?= $this->lang->line('Enable'); ?></th>
					<?php endif;?>
					
                    <?php if(in_array('canDeleteBanner', $this->permission)):?>
						<th class="deleteLink"><?= $this->lang->line('Delete') ?></th>
					<?php endif;?>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($banner as $key=>$banner): ?>
                    <tr>
                        <td class="preview-image"><a href="<?= base_url().'Admin/viewBanner/'.$banner["banner_id"] ?>" data-class="preview-<?= $key ?>"><?= $banner['name']?></a><div class="popup preview-<?= $key ?>" style="display:none;"><img src="<?= base_url().'assets/uploads/gallery/'.$banner['banner']?>" width="100%" height="200"></div></td>
                        <td><?= $banner['banner_order']?></td>
						<td><?= date('d-m-Y',$banner['created_date'])?></td>
						<td><?= $banner['username']?></td>
						<?php if(in_array('canReviewBanner', $this->permission)):?>
							<td class="toggle-button"><input data-id="<?= $banner["banner_id"]; ?>" data-table="banner" data-enable='<?= $banner['is_enable'];?>'  class="toggle" <?php if($banner['is_enable']==1):?>checked<?php endif;?> data-toggle="toggle" type="checkbox"></td>
                        <?php endif;?>
						
						<?php if(in_array('canDeleteBanner', $this->permission)):?>
							<td><a href='<?= base_url()."Admin/deleteBanner/".$banner["banner_id"]?>' class="deleteLink" onclick="return confirm('Are you sure?')" title="<?= $this->lang->line('Delete') ?>"><i class="fa fa-times"></i></a></td>
						<?php endif;?>
					</tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addBanner" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new banner')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addBanner'); ?>
				<div class="form-group">
                    <label for="label" class="text-align-left control-label required"><?= $this->lang->line('Name')?></label>
                    <input type="text" name="name" class="form-control" required>
                </div>
				<div class="form-group">
					<label for="label" class="text-align-left control-label"><?= $this->lang->line('Order')?></label>
					<input type="number" name="banner_order" class="form-control number-field" min="1">
				</div>
				<div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Link')?></label>
                    <input type="url" name="link" class="form-control" placeholder="Ex: https://misvn.edu.vn/">
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
                    <label for="carousel_img" class="text-align-left control-label"><?= $this->lang->line('Banner image')?></label>
                    <input id="fileUpload" type="file" name="banner"/>
                    <div id="image-holder"> </div>
                </div>
                <div class="form-group">
                    <p><?= $this->lang->line('Banner upper limit')?></p>
                    <p><?= $this->lang->line('Banner lower limit')?></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>


