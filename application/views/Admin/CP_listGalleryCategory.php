<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/29/2017
 * Time: 2:21 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage gallery category'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addNavigation"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new category')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Category name'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
					<th class="deleteLink"><?= $this->lang->line('Delete') ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Category name'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
					<th class="deleteLink"><?= $this->lang->line('Delete') ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($category as $categories): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewGalleryCategory/".$categories["gallery_category_id"]?>'><?= $categories['category_name']?></a></td>
                        <td><?= date('d-m-Y',$categories['created_date'])?></td>
						<td><a href='<?= base_url()."Admin/deleteGalleryCategory/".$categories["gallery_category_id"]?>' class="deleteLink" onclick="return confirm('Are you sure?')" title="<?= $this->lang->line('Delete') ?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addNavigation" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new category')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addGalleryCategory'); ?>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Category name')?></label>
                    <input type="text" name="category_name" class="form-control number-field">
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
