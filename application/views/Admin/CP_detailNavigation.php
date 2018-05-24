<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/30/2017
 * Time: 8:51 AM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Navigation');?> : <?= $navigation['nav_name'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/viewNavigation/'.$navigation['header_nav_id']); ?>
                            <div class="form-group">
                                <label for="class_name" class="text-align-left control-label required"><?= $this->lang->line('Navigation name')?></label>
                                <input type="text" name="nav_name" class="form-control number-field" value="<?= $navigation['nav_name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="class_link" class="text-align-left control-label required"><?= $this->lang->line('Navigation link')?></label>
                                <input type="text" name="nav_link" class="form-control number-field" value="<?= $navigation['nav_link'] ?>" required>
                            </div>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Navigation order')?></label>
								<input type="number" name="nav_order" class="form-control number-field" min="1" value="<?= $navigation['nav_order'] ?>">
							</div>
                            <div class="form-group">
                                <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Language')?></label>
                                <select class="form-control" id="lang" name="lang">
                                    <?php foreach($lang as $langs): ?>
                                        <option value="<?= $langs['lang_acronym']?>" <?php if($langs['lang_acronym'] == $navigation['lang']): ?> selected <?php endif;?>><?= $langs['lang_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</section>
</div>
