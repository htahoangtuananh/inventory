<?php

?>
<section class="content-header">
    <h1><?= $this->lang->line('News config');?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/viewNewsConfig/'); ?>
                            <div class="form-group">
                                <label for="overview" class="text-align-left control-label required"><?= $this->lang->line('Overview width')?></label>
                                <input id="overview" type="number" name="overview" class="form-control number-field" value="<?= $news_config['overview_width'] ?>" min="50" required>
                            </div>
                            <div class="form-group">
                                <label for="limit" class="text-align-left control-label"><?= $this->lang->line('Limit news')?></label>
                                <input id="limit" type="number" name="limit" class="form-control number-field" value="<?= $news_config['limit_news'] ?>" min="1">
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
