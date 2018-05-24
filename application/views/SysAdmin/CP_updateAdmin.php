
<section class="content-header">
    <h1><?= $this->lang->line('Manage Admin'); ?></h1>
</section>
<section class="content">
    <div class="box box-default">
        <?php echo validation_errors(); ?>
                <?php echo form_open('SysAdmin/updateAdmin/'.$admin['admin_id']); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="label" class="text-align-left col-md-4 control-label"><?= $this->lang->line('Username'); ?></label>
                            <div class="col-md-8">
                                <?= $admin['username'] ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="text-align-left col-md-4 control-label"><?= $this->lang->line('Email'); ?></label>
                            <div class="col-md-8">
                                <?= $admin['email'] ?>
                            </div>
                        </div>
						<div class="row">
							<div class="col-md-12">
								<div class="panel-group">
									<div class="panel panel-default">
										  <div class="panel-heading">
											<h4 class="panel-title">
											  <a data-toggle="collapse" href="#permission"><?= $this->lang->line('Permission')?><span class="pull-right"><i class="fas fa-chevron-down"></i></span></a>
											</h4>
										  </div>
										<div id="permission" class="panel-collapse collapse in">
											<div class="panel-body">
												<?php foreach($permission as $permission):?>
												<div class="col-md-6">
													<div class="form-check">
													  <input class="form-check-input" name="permission[]" type="checkbox" value="<?= $permission['permission_id'] ?>" id="<?= $permission['permission_id'] ?>" 
													  <?php for($i = 0;$i<count($current_permission); $i++):?>
														  <?php if($permission['permission_id'] == $current_permission[$i]['permission_id']):?> 
														  checked 
														  <?php endif;?>
													  <?php endfor;?>
													  > 
													  <label class="form-check-label" for="<?= $permission['permission_id'] ?>">
														<?= $permission['permission_name'] ?>
													  </label>
													</div>
												</div>
												<?php endforeach;?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update'); ?></button>
            </div>
            <?php echo form_close(); ?>
    </div>
</section>
</div>