<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/8/2017
 * Time: 2:09 PM
 */

?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage permission'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a data-toggle="modal" data-target="#addPer" class ='btn btn-primary'>
            <i class="fa fa-plus"></i> <?= $this->lang->line('Add new permission'); ?>
        </a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Permission name'); ?></th>
					<th><?= $this->lang->line('Permission group'); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Permission name'); ?></th>
					<th><?= $this->lang->line('Permission group'); ?></th>
                </tr>
                </tfoot>
                <tbody>
                    <?php foreach($permission as $permissions): ?>
                        <tr>
                            <td><?= $permissions['permission_name']?></td>
							<td><?= $permissions['permission_group_name']; ?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>
<div id="addPer" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new permission')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('SysAdmin/addPermission'); ?>
                <div class="row">
					<div class="form-group">
						<label for="label" class="text-align-left control-label"><?= $this->lang->line('Permission ID')?></label>
						<input type="text" name="permission_id" class="form-control number-field">
					</div>
					<div class="form-group">
						<label for="label" class="text-align-left control-label"><?= $this->lang->line('Permission name')?></label>
						<input type="text" name="name" class="form-control number-field">
					</div>
					<div class="form-group">
						<label for="group" class="text-align-left control-label"><?= $this->lang->line('Permission group')?></label>
						<select class="form-control" id="group" name="group_id">
							<?php foreach($group as $group): ?>
								<option value="<?= $group['permission_group_id']?>"><?= $group['permission_group_name']?></option>
							<?php endforeach; ?>
						</select>
					</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update'); ?></button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>