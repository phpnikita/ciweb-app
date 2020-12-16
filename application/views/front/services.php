<?php 
	define('title', 'Our Services');
	
	$this->load->view('front/header'); 
?>

	<!-- Services -->
	<div class="container pt-5 pb-5">
		<h3 class="pb-3">Our Services</h3>

		<p class="text-muted">CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP. Its goal is to enable you to develop projects much faster than you could if you were writing code from scratch, by providing a rich set of libraries for commonly needed tasks, as well as a simple interface and logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task.</p>

		<p class="text-muted">Where possible, CodeIgniter has been kept as flexible as possible, allowing you to work in the way you want, not being forced into working any certain way. The framework can have core parts easily extended or completely replaced to make the system work the way you need it to. In short, CodeIgniter is the malleable framework that tries to provide the tools you need while staying out of the way.</p>
	</div>


	<!-- Services -->
	<div class="bg-light pb-5">
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
<?php $this->load->view('front/footer'); ?>
