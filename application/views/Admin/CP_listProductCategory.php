<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/29/2017
 * Time: 2:21 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage product category'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addType"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new category')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
					<th><?= $this->lang->line('Product Category Name'); ?></th>
                    <th><?= $this->lang->line('Category Id'); ?></th>
					<th><?= $this->lang->line('Created date'); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
					<th><?= $this->lang->line('Product Category Name'); ?></th>
                    <th><?= $this->lang->line('Category Id'); ?></th>
					<th><?= $this->lang->line('Created date'); ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($category as $categories): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewProductCategory/".$categories["product_category_id"]?>'><?= $categories['name']?></a></td>
                        <td><?= $categories['product_category_id']?></td>
						<td><?= date('d-m-Y', $categories['created_date'])?></td>
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
                <h4 class="modal-title"><?= $this->lang->line('Add new category')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addProductCategory'); ?>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label required"><?= $this->lang->line('Category Id')?></label>
                    <input type="text" name="category_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label required"><?= $this->lang->line('Product Category Name')?></label>
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

