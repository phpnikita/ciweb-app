<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('public/css/style.css');?>">

    <title><?= title;?></title>
  </head>
  <body>

  	<!-- Header navbar -->
  	<header class="bg-light pt-4 pb-4">
  		<div class="container">
  			<nav class="navbar navbar-expand-lg navbar-light ">
			  <a class="navbar-brand" href="<?= base_url();?>">Codeigniter Web Appilication</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse right-align" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="<?= base_url();?>">Home</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('page/about');?>">About Us</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('page/services');?>">Services</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('blog');?>">Blog</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('blog/categories');?>">Categories</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('page/contact');?>">Contact Us</a>
			      </li>
			    </ul>
			  </div>
			</nav>	
  		</div>
  		
  	</header>