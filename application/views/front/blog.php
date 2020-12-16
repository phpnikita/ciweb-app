<?php 
	define('title', 'Blog');

	$this->load->view('front/header'); 
?>

	<div class="container pt-4">
		<h3 class="pb-4 pt-4">Blog</h3>
		<?php
			if (!empty($articles)) {
				foreach ($articles as $article) {

		?>
		<div class="row mb-5">
			<div class="col-md-4">
				<?php
					if (!empty($article['image'])) {
				?>
					<img class="w-100 rounded pb-4" src="<?= base_url('public/uploads/articles/thumb_admin/'.$article['image']);?>" height="270">
				<?php
					}
				?>
			</div>
			<div class="col-md-8">
				<p class="bg-light pt-3 pb-2 pl-4">
					<a href="<?= base_url('blog/category/'.$article['category']);?>" class="text-uppercase text-muted"><?= $article['category_name'];?></a>
				</p>

				<h3><a href="<?= base_url('blog/detail/'.$article['id']);?>"><?= word_limiter($article['title'],6);?></a></h3>
				<!-- strip_tags() remove all html tags -->
				<!-- word_limiter is method of text helper in ci -->
				<p><?= word_limiter(strip_tags($article['description']),50);?></p>

				<p class="text-uppercase">Posted By <strong><?= $article['author'];?></strong> On <strong><?= date(' d M Y',strtotime($article['created_at']));?></strong></p>
			</div>
		</div>
	<?php } }?>

		<div class="row">
			<div class="col-md-12">
				<?= $pagination_links;?>
			</div>
		</div>
		
	</div>

<?php $this->load->view('front/footer');?>
