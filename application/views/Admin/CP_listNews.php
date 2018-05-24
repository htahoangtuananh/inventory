<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/29/2017
 * Time: 2:21 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage news'); ?></h1>
</section>
<section class="content">
	<?php if(in_array('canCreateNews',$this->permission)):?>
    <div class="form-group">
        <a href="<?= base_url().'Admin/addNews'?>" class ='btn btn-primary'><i class="fa fa-plus"></i> <?= $this->lang->line('Add new news')?></a>
    </div>
	<?php endif;?>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('News title'); ?></th>
					<th><?= $this->lang->line('Type'); ?></th>
					<th><?= $this->lang->line('Created by'); ?></th>
                    <th><?= $this->lang->line('Created date'); ?></th>
					<th><?= $this->lang->line('Viewed'); ?></th>
                    <th><?= $this->lang->line('Language'); ?></th>
					
					<?php if(in_array('canReviewNews',$this->permission)):?>
						<th><?= $this->lang->line('Enable'); ?></th>
					<?php endif;?>
					
					<?php if(in_array('canDeleteNews',$this->permission)):?>
						<th class="deleteLink"><?= $this->lang->line('Delete') ?></th>
					<?php endif;?>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('News title'); ?></th>
					<th><?= $this->lang->line('Type'); ?></th>
					<th><?= $this->lang->line('Created by'); ?></th>
                    <th><?= $this->lang->line('Created date'); ?></th>
					<th><?= $this->lang->line('Viewed'); ?></th>
                    <th><?= $this->lang->line('Language'); ?></th>
                    <?php if(in_array('canReviewNews',$this->permission)):?>
						<th><?= $this->lang->line('Enable'); ?></th>
					<?php endif;?>
					
					<?php if(in_array('canDeleteNews',$this->permission)):?>
						<th class="deleteLink"><?= $this->lang->line('Delete') ?></th>
					<?php endif;?>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($news as $news): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewNews/".$news["news_id"]?>'><?= $news['title']?></a></td>
						<td><?= $this->lang->line($news['type']) ?></td>
						<td><?= $news['username'] ?></td>
                        <td><?= date("d/m/Y H:i:s", $news['created_date']);?></td>
						<td><?= $news['viewed'];?></td>
                        <td><?= $news['lang'] ?></td>
						
						<?php if(in_array('canReviewNews',$this->permission)):?>
							<td class="toggle-button"><input data-id="<?= $news["news_id"]; ?>" data-table="news" data-enable='<?= $news['is_enable'];?>'  class="toggle" <?php if($news['is_enable']==1):?>checked<?php endif;?> data-toggle="toggle" type="checkbox"></td>
						<?php endif;?>
						
						<?php if(in_array('canDeleteNews',$this->permission)):?>
							<td><a href='<?= base_url()."Admin/deleteNews/".$news["news_id"]?>' class="deleteLink" onclick="return confirm('Are you sure?')" title="<?= $this->lang->line('Delete') ?>"><i class="fa fa-times"></i></a></td>
						<?php endif;?>
					</tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>
<script>
    $('.toggle-button').click(function(){
        var table = $(this).find('input').attr('data-table');
        var target_id = $(this).find('input').attr('data-id');
        var enable = $(this).find('input').attr('data-enable');
        enable = (enable==0)? 1:0;

        var csrf = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            data: {'id': target_id,'table': table, 'enable': enable, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrf_token},
            type: "POST",
            url: '<?= base_url()."Admin/handleAjax"?>',
        }).success(function (result) {
            location.reload();
        });
    });
</script>
