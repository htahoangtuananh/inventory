<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/29/2017
 * Time: 2:21 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage product color'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addNavigation"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new color')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
					<th><?= $this->lang->line('Color'); ?></th>
                    <th><?= $this->lang->line('Color Id'); ?></th>
					<th><?= $this->lang->line('Created date'); ?></th>
                    <th><?= $this->lang->line('Product Color Name'); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
					<th><?= $this->lang->line('Color'); ?></th>
                    <th><?= $this->lang->line('Color Id'); ?></th>
					<th><?= $this->lang->line('Created date'); ?></th>
                    <th><?= $this->lang->line('Product Color Name'); ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($color as $colors): ?>
                    <tr>
						<td><div class="col-md-8 offset-md-2" style="background:<?= $colors['color']?>;height:20px" ></div></td>
                        <td><a href='<?= base_url()."Admin/viewProductColor/".$colors["product_color_id"]?>'><?= $colors['product_color_id']?></a></td>
						<td><?= date('d-m-Y', $colors['created_date'])?></td>
                        <td><?= $colors['name']?></td>
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
                <h4 class="modal-title"><?= $this->lang->line('Add new color')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addProductColor'); ?>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label required"><?= $this->lang->line('Color Id')?></label>
                    <input type="text" name="color_id" class="form-control number-field" required>
                </div>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label required"><?= $this->lang->line('Product Color Name')?></label>
                    <input type="text" name="name" class="form-control number-field" required>
                </div>
				<div class="form-group">
					<label for="label" class="text-align-left control-label"><?= $this->lang->line('Color')?></label>
					<input type="text" name="color" class="form-control" id="color-picker">
				</div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>

