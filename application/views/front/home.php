<?php 
	define('title', 'Codeigniter Web Application');

	$this->load->view('front/header'); 
?>

  	<!-- Slider -->
  	<div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="<?= base_url('public/images/slide1.jpg');?>" class="d-block w-100" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="<?= base_url('public/images/slide2.jpg');?>" class="d-block w-100" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="<?= base_url('public/images/slide3.jpg');?>" class="d-block w-100" alt="...">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>

	<!-- about Us -->
	<div class="container pt-4 pb-4">
		<h3 class="pb-3">About Company</h3>

		<p class="text-muted">CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP. Its goal is to enable you to develop projects much faster than you could if you were writing code from scratch, by providing a rich set of libraries for commonly needed tasks, as well as a simple interface and logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task.</p>

		<p class="text-muted">Where possible, CodeIgniter has been kept as flexible as possible, allowing you to work in the way you want, not being forced into working any certain way. The framework can have core parts easily extended or completely replaced to make the system work the way you need it to. In short, CodeIgniter is the malleable framework that tries to provide the tools you need while staying out of the way.</p>
	</div>

	<!-- Services -->
	<div class="bg-light pb-4">
		<div class="container ">
			<h3 class="pb-3">Our Services</h3>

			<div class="row">
				<div class="col-md-3">
					<div class="card">
					  <img src="<?= base_url('public/images/box1.jpg');?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Website Development</h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card" >
					  <img src="<?= base_url('public/images/box2.jpg');?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Digital Marketing</h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card" >
					  <img src="<?= base_url('public/images/box3.jpg');?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Mobile App Development</h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card" >
					  <img src="<?= base_url('public/images/box4.jpg');?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">It Servies</h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Blog -->

	<?php
		if (!empty($articles)) {
	?>
	<div class="pt-4 pb-4">
		<div class="container ">
			<h3 class="pb-3">Latest Blogs</h3>

			<div class="row">
				<?php
					foreach ($articles as $article) {
				?>
				<div class="col-md-3">
					<div class="card">
						<?php
							if (file_exists('./public/uploads/articles/thumb_admin/'.$article['image'])) {
						?>
							<img src="<?= base_url('public/uploads/articles/thumb_admin/'.$article['image']);?>" class="card-img-top" style="height: 200px">
						<?php
							}
						?>
					 
					  <div class="card-body">
					    <p class="card-text"><?= substr($article['title'],0,45);?></p>
					  </div>
					</div>
				</div>
			<?php }?>
				<!-- <div class="col-md-3">
					<div class="card" >
					  <img src="<?= base_url('public/images/box2.jpg');?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card" >
					  <img src="<?= base_url('public/images/box3.jpg');?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card" >
					  <img src="<?= base_url('public/images/box4.jpg');?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div> -->
		    </div>
		</div>
	</div>
	<?php } ?>

<?php $this->load->view('front/footer');?>