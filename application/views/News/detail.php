<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 3/20/2018
 * Time: 11:02 AM
 */
?>
<script>
setTimeout(function (){
    var h = $("#home-content").height();
    $("#sidebar-list").height(h);
}, 1000);
</script>
<style>
	@media (max-width: 768px) {
		img{
			width: 100%!important;
			height:auto!important;
		}
		
		.news-header-container{
			padding: 0;
		}
	}

</style>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-12">
			<div class="news-header-container">
				<div class="row">
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= $this->lang->line('Home')?></a></li>
						<li class="breadcrumb-item"><a href="<?= base_url().$this->uri->segment(1); ?>"><?= $this->lang->line($this->uri->segment(1))?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $news['title']?></li>
					  </ol>
					</nav>
				</div>
				<div class="row">
					<h4><?= $news['title']?></h4>
				</div>
				<div class="row">
					<p><i class="far fa-clock"></i><?= date(" H:i:s d/m/Y", $news['created_date'])?></p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="news-header-container col-md-12">
					<?= $news['content']?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 offset-md-1 related-news">
					<div class="row">
						<h4><?= $this->lang->line('Related news')?></h4>
					</div>
					<div class="row">
						<ul class="list-unstyled fa-ul">
						<?php foreach ($related as $relateds):?>
							<li><span class="fa-li"><i class="fas fa-angle-right fa-sm"></i></span> <a href="<?= base_url().$this->uri->segment(1).'/detail/'.$relateds['url'] ?>"> <?= $relateds['title']?></a></li>
						<?php endforeach;?>
						</ul>
					</div>
				</div>
				<div class="col-md-4 offset-md-1 related-news">
					<div class="row">
						<h4><?= $this->lang->line('Most viewed news')?></h4>
					</div>
					<div class="row">
						<ul class="list-unstyled fa-ul">
						<?php foreach ($mostViewed as $mostVieweds):?>
							<li><span class="fa-li"><i class="fas fa-angle-right fa-sm"></i></span> <a href="<?= base_url().$this->uri->segment(1).'/detail/'.$mostVieweds['url'] ?>"> <?= $mostVieweds['title']?></a></li>
						<?php endforeach;?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col">
	
</div>
