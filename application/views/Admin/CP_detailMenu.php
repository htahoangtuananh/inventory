<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/22/2017
 * Time: 10:43 AM
 */
?>
<section class="content-header">
    <h1><?= $menu['name'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open_multipart('Admin/viewMenu/'.$menu['menu_id']); ?>
                            <div class="form-group">
                                <label for="class_name" class="text-align-left control-label"><?= $this->lang->line('Menu name')?></label>
                                <input type="text" name="name" class="form-control number-field" value="<?= $menu['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="class_link" class="text-align-left control-label"><?= $this->lang->line('Menu price')?></label>
                                <input type="text" name="price" class="form-control number-field" value="<?= $menu['price'] ?>">
                            </div>
							<div class="form-group">
                                <label for="class_link" class="text-align-left control-label"><?= $this->lang->line('Order')?></label>
                                <input type="text" name="order" class="form-control number-field" value="<?= $menu['order'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="class_content" class="text-align-left control-label"><?= $this->lang->line('Menu description')?></label>
                                <textarea rows="5" cols="50" name="description" class="form-control number-field" ><?= $menu['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Language')?></label>
                                <select class="form-control" id="lang" name="lang">
                                    <?php foreach($lang as $langs): ?>
                                        <option value="<?= $langs['lang_acronym']?>" <?php if($langs['lang_acronym']==$menu['lang']): ?> selected <?php endif;?>><?= $langs['lang_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
							<div class="form-group">
								<label for="category" class="text-align-left control-label"><?= $this->lang->line('Category name')?></label>
								<select class="form-control" id="category" name="category">
									<?php foreach($category as $category): ?>
										<option value="<?= $category['category_id']?>" <?php if($category['category_id'] == $menu['category_id']): ?> selected <?php endif;?>><?= $category['name']?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>
                    </div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
        </div>
        

    </div>
</section>
</div>



