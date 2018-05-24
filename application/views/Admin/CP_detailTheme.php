<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 3/5/2018
 * Time: 3:52 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Theme');?> : <?= $theme['theme_name'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/viewTheme/'.$theme['theme_id']); ?>
                            <div class="form-group">
                                <label for="class_name" class="text-align-left control-label required"><?= $this->lang->line('Theme name')?></label>
                                <input type="text" name="name" class="form-control number-field" value="<?= $theme['theme_name'] ?>" required>
                            </div>
							<div class="form-group">
								<label for="label" class="text-align-left control-label required"><?= $this->lang->line('Element')?></label>
								<input type="text" name="element" class="form-control" value="<?= $theme['element'] ?>" required>
							</div>
                            <div class="form-group">
                                <label for="class_link" class="text-align-left control-label"><?= $this->lang->line('Theme color')?></label>
                                <input name="color" class="form-control number-field" id="color-picker" value="<?= $theme['color'] ?>">
                            </div>
							<div class="form-group">
								<label for="label" class="text-align-left control-label"><?= $this->lang->line('Custom CSS')?></label>
								<input type="text" name="custom_css" class="form-control " value="<?= $theme['custom_css'] ?>">
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
