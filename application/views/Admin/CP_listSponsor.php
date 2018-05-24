<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 3/21/2018
 * Time: 4:26 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage sponsor'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addBanner"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new sponsor')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Sponsor name'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                    <th class="deleteLink"><?= $this->lang->line('Delete') ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Sponsor name'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                    <th class="deleteButton"><?= $this->lang->line('Delete') ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($sponsor as $key=>$sponsor): ?>
                    <tr>
                        <td class="preview-image"><a href="<?= base_url().'Admin/viewSponsor/'.$sponsor['sponsor_id']?>" data-class="preview-<?= $key ?>"><?= $sponsor['sponsor_name']?></a><div class="popup preview-<?= $key ?>" style="display:none;"><img src="<?= base_url().'assets/uploads/sponsor/'.$sponsor['sponsor_logo']?>"></div></td>
                        <td><?= date('d-m-Y',$sponsor['created_date'])?></td>
                        <td class="toggle-button"><input data-id="<?= $sponsor["sponsor_id"]; ?>" data-table="sponsor" data-enable='<?= $sponsor['is_enable'];?>'  class="toggle" <?php if($sponsor['is_enable']==1):?>checked<?php endif;?> data-toggle="toggle" type="checkbox"></td>
                        <td><a href='<?= base_url()."Admin/deleteSponsor/".$sponsor["sponsor_id"]?>' class="deleteLink" onclick="return confirm('Are you sure?')" title="<?= $this->lang->line('Delete') ?>"><i class="fa fa-times"></i></a></td>
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
                <h4 class="modal-title"><?= $this->lang->line('Add new sponsor')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addSponsor'); ?>
				<div class="form-group">
                    <label for="label" class="text-align-left control-label required"><?= $this->lang->line('Sponsor name')?></label>
                    <input type="text" name="name" class="form-control" required>
                </div>
				<div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Link')?></label>
                    <input type="text" name="link" class="form-control">
                </div>
                <div class="form-group">
                    <label for="carousel_img" class="text-align-left control-label"><?= $this->lang->line('Sponsor image')?></label>
                    <input id="fileUpload" type="file" name="sponsor"/>
                    <div id="image-holder"> </div>
                </div>
                <div class="form-group">
                    <p><?= $this->lang->line('Sponsor upper limit')?></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>
