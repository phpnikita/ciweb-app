  <?php
      define('title', 'Edit Article'); 
      $this->load->view('admin/header');  ?>

		 <!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
		    <!-- Content Header (Page header) -->
		    <div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">Article</h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="<?php base_url().'admin/home/index'?>">Home</a></li>
		              <li class="breadcrumb-item"><a href="<?= base_url().'admin/article/index'?>"> Article</a></li>
		              <li class="breadcrumb-item active">Edit Article</li>
		            </ol>
		          </div>
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
		    </div>
		    <!-- /.content-header -->
		<!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="col-lg-12">
	          	<?php
	          		if (!empty($this->session->flashdata('error'))) {
	          	?>
	          	<div class="alert alert-success"><?= $this->session->flashdata('error');?></div>
	          	<?php
	          		}
	          	?>
	            <div class="card card-primary">
	              	<div class="card-header">
	              		<div class="card-title">
	              			Create New Article
						</div>
	              	</div>
	              	<form name="categoryForm" id="categoryForm" method="post" action="<?= base_url().'admin/article/edit/'.$article['id'];?>" enctype="multipart/form-data">
		              	<div class="card-body">
		              			<div class="form-group">
		              				<label>Category</label><br>
		              				<select name="category_id" id="category_id" class="form-control <?= (form_error('category_id') != "") ? 'is-invalid' : '';?>">
		              					<option value="" >Select a Category</option>
		              					<?php
		              						if (!empty($categories)) {
		              							foreach ($categories as $category) {
		              							$selected = ($article['category'] == $category['id']) ? true : false;
		              					?>
		              						<option <?= set_select('category_id',$category['id'],$selected)?> value="<?= $category['id'];?>"><?= $category['name'];?></option>
		              					<?php
		              							}
		              						}else{
		              					?>
		              					<option>No Record Found</option>
		              					<?php
		              						}
		              					?>
		              				</select>
		              				<?= form_error('category_id');?>
		              			</div>
		              			<div class="form-group">
		              				<label>Title</label><br>
		              				<input type="text" name="title" id="title" class="form-control <?= (form_error('title') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('title',$article['title']);?>">
		              				<?= form_error('title');?>
		              			</div>
		              			<div class="form-group">
		              				<label>Description</label><br>
		              				<textarea class="textarea <?= (form_error('description') != "") ? 'is-invalid' : ''; ?>" name="description"> <?= set_value('description',$article['description']);?></textarea>
		              				<?= form_error('description');?>
		              			</div>
		              			<div class="form-group">
		              				<label>Image</label><br>
		              				<input type="file" name="image" id="image" class="form-control <?= (!empty($imageError)) ? 'is-invalid' : ''; ?>">
		              				<?php echo (!empty($imageError)) ? $imageError :''; ?>
		              				<?php
		              					if($article['image'] != "" && file_exists('./public/uploads/articles/thumb_admin/'.$article['image'])){
		              				?>
		              				<img src="<?= base_url().'public/uploads/articles/thumb_admin/'.$article['image'];?>" class="mt-3">
		              			<?php }else{ ?>
		              				<img src="<?= base_url().'public/uploads/category/no-image.png';?>">
		              			<?php }?>
		              			</div>
		              			<div class="form-group">
		              				<label>Author</label><br>
		              				<input type="text" name="author" id="author" class="form-control <?= (form_error('author') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('author',$article['author']);?>">
		              				<?= form_error('author');?>
		              			</div>
		              			<div class="custom-control custom-radio float-left">
		                          <input class="custom-control-input" type="radio" id="statusActive" name="status" value="1" <?= ($article['status'] == "1") ? 'checked' : '';?>>
		                          <label for="statusActive" class="custom-control-label">Active</label>
		                        </div>
		              			<div class="custom-control custom-radio float-left ml-3">
		                          <input class="custom-control-input" type="radio" id="statusBlock" name="status" value="0" <?= ($article['status'] == "0") ? 'checked' : '';?>>
		                          <label for="statusBlock" class="custom-control-label">Block</label>
		                        </div>
		              	</div>
		              	<div class="card-footer">
		              		<button name="submit" type="submit" class="btn btn-primary">Submit</button>
		              		<a href="<?= base_url().'admin/article/index'?>" class="btn btn-secondry">Back</a>
		              	</div>
		            </form>
	            </div>
	          </div>
	        </div>
	        <!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->

	  <!-- Control Sidebar -->
	  <aside class="control-sidebar control-sidebar-dark">
	    <!-- Control sidebar content goes here -->
	    <div class="p-3">
	      <h5>Title</h5>
	      <p>Sidebar content</p>
	    </div>
	  </aside>
	  <!-- /.control-sidebar -->

	<?php $this->load->view('admin/footer');  ?>
