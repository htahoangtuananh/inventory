<section class="content-header">
    <h1><?= $this->lang->line('Manage menu'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addMenu"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new menu')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Menu name'); ?></th>
                    <th><?= $this->lang->line('Menu price'); ?></th>
                    <th><?= $this->lang->line('Language'); ?></th>
					<th class="deleteLink"><?= $this->lang->line('Delete') ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Menu name'); ?></th>
                    <th><?= $this->lang->line('Menu price'); ?></th>
                    <th><?= $this->lang->line('Language'); ?></th>
					<th class="deleteButton"><?= $this->lang->line('Delete') ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($menu as $menu): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewMenu/".$menu["menu_id"]?>'><?= $menu['name']?></a></td>
                        <td><?= $menu['price']?></td>
                        <td><?= $menu['lang']?></td>
						<td><a href='<?= base_url()."Admin/deleteMenu/".$menu["menu_id"]?>' class="deleteLink" onclick="return confirm('Are you sure?')" title="<?= $this->lang->line('Delete') ?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addMenu" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new menu')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addMenu'); ?>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Menu name')?></label>
                    <input type="text" name="name" class="form-control number-field">
                </div>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Menu price')?></label>
                    <input type="text" name="price" class="form-control number-field">
                </div>
				<div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Order')?></label>
                    <input type="text" name="order" class="form-control number-field"></textarea>
                </div>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Description')?></label>
                    <textarea rows="4" cols="50" name="description" class="form-control number-field"></textarea>
                </div>
                <div class="form-group">
                    <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Language')?></label>
                    <select class="form-control" id="lang" name="lang">
                        <?php foreach($lang as $lang): ?>
                            <option value="<?= $lang['lang_acronym']?>"><?= $lang['lang_name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
				<div class="form-group">
                    <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Menu category')?></label>
                    <select class="form-control" id="category" name="category">
                        <?php foreach($category as $category): ?>
                            <option value="<?= $category['category_id']?>"><?= $category['name']?></option>
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