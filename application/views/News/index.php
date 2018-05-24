<script>
    $(document).ready(function() {
        $('.news-content-summary').readmore({
            speed: 45,
            moreLink: '<a href="#"></a>',
        });
        $('.news-content-summary').find('img').remove();
        $('.news-content-summary').find('.description:first').remove();
        $('.news-content-summary').find('iframe').remove();
        clean(document.body);
    });
</script>

<script>
setTimeout(function (){
    var h = $("#home-content").height();
    $("#sidebar-list").height(h);
}, 1000);
</script>
<div class="row">
	<div class="col-md-12" id="news-header">
		<div class="col-md-12">
			<div class="container">
				<div class="news-header-container">
					<div class="inline">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= $this->lang->line('Home');?></a></li>
							<li class="breadcrumb-item"><?= $this->lang->line($breadcrumb);?></li>
						  </ol>
						</nav>
					</div>
					<div class="pull-right">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search for...">
							<span class="input-group-btn">
								<button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="container">
			<?php foreach($news as $index=>$newses):?>
			<hr>
			<div class="row news-content-news">
				<div class="col-md-3">
					<img src="<?= base_url().'assets/uploads/news/'.$newses['image']?>" width="auto" style="width: 100%">
				</div>
				<div class="col-md-9">
					<p><i class="far fa-clock"></i><?= date(" H:i:s d/m/Y", $newses['created_date'])?></p>
					<div class="news-title-news">
						<h5><a href="<?= base_url().'news/detail/'.$newses['url'] ?>"><?= $newses['title'] ?></a></h5>
					</div>
					<div class="news-content-summary">
						<?= $newses['content']?>
					</div>
				</div>
			</div>
			<?php if($index==(count($news)-1)):?>
				<hr>
			<?php endif;?>
			<?php endforeach;?>
			<?php if (isset($links)):?>
			<div class="row">
				<div id="pagination" class="col-md-4 offset-md-4">
					<?php echo $links?>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</div>
</div>
<div class="col">
	
</div>