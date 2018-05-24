<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/29/2017
 * Time: 2:21 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage product type'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addType"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new type')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
					<th><?= $this->lang->line('Product Type Name'); ?></th>
                    <th><?= $this->lang->line('Type Id'); ?></th>
					<th><?= $this->lang->line('Created date'); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
					<th><?= $this->lang->line('Product Type Name'); ?></th>
                    <th><?= $this->lang->line('Type Id'); ?></th>
					<th><?= $this->lang->line('Created date'); ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($type as $types): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewProductType/".$types["product_type_id"]?>'><?= $types['name']?></a></td>
                        <td><?= $types['product_type_id']?></td>
						<td><?= date('d-m-Y', $types['created_date'])?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addType" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new type')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addProductType'); ?>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label required"><?= $this->lang->line('Type Id')?></label>
                    <input type="text" name="type_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label required"><?= $this->lang->line('Product Type Name')?></label>
                    <input type="text" name="name" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>

