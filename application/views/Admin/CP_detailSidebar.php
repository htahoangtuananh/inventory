<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 3/5/2018
 * Time: 3:52 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Sidebar');?> : <?= $sidebar['name'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/viewSidebar/'.$sidebar['sidebar_id']); ?>
                            <div class="form-group">
                                <label for="class_name" class="text-align-left control-label required"><?= $this->lang->line('Sidebar name')?></label>
                                <input type="text" name="name" class="form-control number-field" value="<?= $sidebar['name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="class_link" class="text-align-left control-label"><?= $this->lang->line('Sidebar color')?></label>
                                <input name="color" class="form-control number-field" id="color-picker" value="<?= $sidebar['color'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Language')?></label>
                                <select class="form-control" id="lang" name="lang">
                                    <?php foreach($lang as $langs): ?>
                                        <option value="<?= $langs['lang_acronym']?>" <?php if($langs['lang_acronym'] == $sidebar['lang']): ?> selected <?php endif;?>><?= $langs['lang_name']?></option>
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
