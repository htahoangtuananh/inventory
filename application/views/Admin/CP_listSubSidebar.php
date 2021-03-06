<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 3/5/2018
 * Time: 3:25 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage sub sidebar'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addSubSidebar"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new sub sidebar')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Sub Sidebar name'); ?></th>
                    <th><?= $this->lang->line('Sidebar name'); ?></th>
                    <th><?= $this->lang->line('Language'); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Sub Sidebar name'); ?></th>
                    <th><?= $this->lang->line('Sidebar name'); ?></th>
                    <th><?= $this->lang->line('Language'); ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($subsidebar as $subsidebar): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewSubSidebar/".$subsidebar["sub_sidebar_id"]?>'><?= $subsidebar['sub_name']?></a></td>
                        <td><?= $subsidebar['name'] ?></td>
                        <td><?= $subsidebar['lang'] ?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addSubSidebar" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new sub sidebar')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addSubSidebar'); ?>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Sub Sidebar name')?></label>
                    <input type="text" name="sub_name" class="form-control number-field">
                </div>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Sidebar name')?></label>
                    <select class="form-control" id="sidebar" name="sidebar_id">
                        <?php foreach($sidebar as $sidebar): ?>
                            <option value="<?= $sidebar['sidebar_id']?>"><?= $sidebar['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Language')?></label>
                    <select class="form-control" id="lang" name="lang">
                        <?php foreach($lang as $langs): ?>
                            <option value="<?= $langs['lang_acronym']?>"><?= $langs['lang_name']?></option>
                        <?php endforeach; ?>
                    </select>
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
