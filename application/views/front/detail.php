<?php 
	define('title', 'Blog Detail');

	$this->load->view('front/header'); 
?>

	<div class="container pt-4">
		<h3 class="pb-4 pt-4">Blog</h3>

		<div class="row">
			<div class="col-lg-12 mb-3">
				<h3><strong><?= $article['title'];?></strong></h3>
			</div>
			<div class="mb-3">
			<?php
					if ($article['image'] != "" && file_exists('./public/uploads/articles/thumb_front/'.$article['image'])) {
				?>
					<img class="w-100 rounded pb-4" src="<?= base_url('public/uploads/articles/thumb_front/'.$article['image']);?>" >
				<?php
					}
				?>
			</div> 

			<div class="d-flex">
				<p class="text-muted">Posted By <strong><?= $article['author'];?></strong> On <strong><?= date(' d M Y',strtotime($article['created_at']));?> </strong></p>

				<a href="<?= base_url('blog/category/'.$article['category']);?>" class="text-muted p-2 bg-light text-uppercase"><strong><?= $article['category_name'];?></strong></a>
			</div>
			<P><?= $article['description'];?></P>
		</div>

	</div>

<?php $this->load->view('front/footer');?>
