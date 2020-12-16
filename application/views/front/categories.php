<?php 
	define('title', 'Categories');

	$this->load->view('front/header'); 
?>

	<div class="container pt-4">
		<h3 class="pb-4 pt-4">Categories</h3>

		<div class="row">
			<?php
				if (!empty($categories)) {
				foreach ($categories as $category) {
			?>
			<div class="col-md-4 mb-4">
				<div class="card">
					<a href="<?= base_url('blog/category/'.$category['id']);?>">
						<?php
							if (!empty($category['image'])) {
						?>
							<img class="w-100 rounded" src="<?= base_url('public/uploads/category/thumb/'.$category['image']);?>" height="250">
						<?php
							}
						?>
					</a>
					<div class="card-body">
						<a href="<?= base_url('blog/category/'.$category['id']);?>"><h5 class="card-title"><?= $category['name'];?></h5></a>
					</div>
				</div>
			</div>
		<?php } }?>
		</div>
	</div>

<?php $this->load->view('front/footer');?>
