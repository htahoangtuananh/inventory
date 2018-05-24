<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/29/2017
 * Time: 2:21 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage theme'); ?></h1>
</section>
<section class="content">
	<div class="form-group">
	<?php if(in_array('canCreateTheme', $this->permission)):?>
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addTheme"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new theme')?></a>
    <?php endif;?>
	</div>
    <div class="box box-default">
        <div class="box-body">
            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Theme name'); ?></th>
                    <th><?= $this->lang->line('Element'); ?></th>
                    <th><?= $this->lang->line('Theme color'); ?></th>
                    <th><?= $this->lang->line('Updated by'); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Theme name'); ?></th>
                    <th><?= $this->lang->line('Element'); ?></th>
                    <th><?= $this->lang->line('Theme color'); ?></th>
                    <th><?= $this->lang->line('Updated by'); ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($theme as $theme): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewTheme/".$theme["theme_id"]?>'><?= $theme['theme_name']?></a></td>
                        <td><?= $theme['element']?></td>
						<td><?= $theme['color']?></td>
                        <td><?= $theme['username']?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addTheme" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new theme')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addTheme'); ?>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label required"><?= $this->lang->line('Theme name')?></label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label required"><?= $this->lang->line('Element')?></label>
                    <input type="text" name="element" class="form-control" required>
                </div>
				<div class="form-group">
					<label for="label" class="text-align-left control-label"><?= $this->lang->line('Theme color')?></label>
					<input type="text" name="color" class="form-control" id="color-picker">
				</div>
                <div class="form-group">
					<label for="label" class="text-align-left control-label"><?= $this->lang->line('Custom CSS')?></label>
					<input type="text" name="custom_css" class="form-control ">
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
