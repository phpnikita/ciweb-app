<?php 
	define('title', 'Contact Us');
	
	$this->load->view('front/header'); 
?>

	<div class="container-fluid">
		 <div class="row">
		 	<div class="col-md-12">
		 	    <h2 class="text-center pt-4"><?= title;?></h2>

		 	    <div class="container">
		 	    	<div class="row">
						<div class="col-md-7">
							<div class="card card-secondary h-100">
								<div class="card-header bg-secondary text-white">
									Have question or comments?
								</div>
								<div class="card-body">
									<form method="post" action="<?= base_url('page/contact');?>" id="conatct-form">
										<div class="form-group">
											<label>Name</label>
											<input type="text" name="name" id="name" class="form-control <?= (form_error('name') != '') ? 'is-invalid': '';   ?>" placeholder="Enter Name" value="<?= set_value('name');?>">
											<?= form_error('name');?>
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="text" name="email" id="email" class="form-control <?= (form_error('email') != '') ? 'is-invalid': '';   ?>" placeholder="Enter Email" value="<?= set_value('email');?>">
											<?= form_error('email');?>

										</div>
										<div class="form-group">
											<label>Message</label>
											<textarea name="message" id="message" class="form-control" placeholder="Enter Message Here.." rows="9"><?= set_value('message');?></textarea>
										</div>
											<button type="submit" name="submit" class="btn btn-primary">Sent</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-secondary">
								<div class="card-header bg-secondary text-white">
									Reach Us
								</div>
								<div class="card-body">
									<p><strong>Customer Service:</strong></p>
									<p class="mb-0">Phone: +91 129209 xx</p>
									<p class="mb-0">Email: support@mysite.com</p>

									<p class="pt-5">&nbsp;</p>

									<p><strong>Headquarter:</strong></p>
									<p class="mb-0">Company Inc</p>
									<p class="mb-0">Las Vegas Street 201</p>
									<p class="mb-0">Phone: +91 129209 xx</p>
									<p class="mb-0">Email: example@mysite.com</p>

									<p class="pt-5">&nbsp;</p>

									<p><strong>Customer Service:</strong></p>
									<p class="mb-0">Company Inc</p>
									<p class="mb-0">Las Vegas Street 201</p>
									<p class="mb-0">Phone: +91 129209 xx</p>
									<p class="mb-0">Email: example@mysite.com</p>

									

								</div>
							</div>
							
						</div>
		 	    	</div>
		 	    </div>
		 	</div>
		 </div>
	</div>

<?php $this->load->view('front/footer'); ?>
