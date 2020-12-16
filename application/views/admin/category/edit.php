  <?php
      define('title', 'Edit Category'); 
      $this->load->view('admin/header');  ?>

		 <!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
		    <!-- Content Header (Page header) -->
		    <div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">Category</h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="<?php base_url().'admin/home/index'?>">Home</a></li>
		              <li class="breadcrumb-item"><a href="<?= base_url().'admin/category/index'?>"> Category</a></li>
		              <li class="breadcrumb-item active">Edit Category</li>
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
	            <div class="card card-primary">
	              	<div class="card-header">
	              		<div class="card-title">
	              			Edit Category "<?= $category['name'];?>"
						</div>
	              	</div>
	              	<form name="categoryForm" id="categoryForm" method="post" action="<?= base_url().'admin/category/edit/'.$category['id'];?>" enctype="multipart/form-data">
		              	<div class="card-body">
		              			<div class="form-group">
		              				<label>Name</label><br>
		              				<input type="text" name="name" id="name" class="form-control <?= (form_error('name') != "") ? 'is-invalid' : ''; ?>" value="<?= set_value('name',$category['name']);?>">
		              				<?= form_error('name');?>
		              			</div>
		              			<div class="form-group">
		              				<label>Image</label><br>
		              				<input type="file" name="image" id="image" class="form-control <?= (!empty($errorImageUpload)) ? 'is-invalid' : ''; ?>">
		              				<?php echo (!empty($errorImageUpload)) ? $errorImageUpload :''; ?>
		              					<!-- file_exits should be diectory path and image name
											&& file_exists('./public/uploads/category/thumb/'.$category['image'])
		              					 -->
		              				<?php
		              					if($category['image'] != "" && file_exists('./public/uploads/category/thumb/'.$category['image'])){
		              				?>
		              				<img src="<?= base_url().'public/uploads/category/thumb/'.$category['image'];?>" class="mt-3">
		              			<?php }else{ ?>
		              				<img src="<?= base_url().'public/uploads/category/no-image.png';?>">
		              			<?php }?>
		              			</div>
		              			<div class="custom-control custom-radio float-left">
		                          <input class="custom-control-input" type="radio" id="statusActive" name="status" value="1" <?php echo ($category['status'] == '1') ? 'checked' : ''; ?>>
		                          <label for="statusActive" class="custom-control-label">Active</label>
		                        </div>
		              			<div class="custom-control custom-radio float-left ml-3">
		                          <input class="custom-control-input" type="radio" id="statusBlock" name="status" value="0" <?php echo ($category['status'] == '0') ? 'checked' : ''; ?>>
		                          <label for="statusBlock" class="custom-control-label">Block</label>
		                        </div>
		              	</div>
		              	<div class="card-footer">
		              		<button name="submit" type="submit" class="btn btn-primary">Submit</button>
		              		<a href="<?= base_url().'admin/category/index'?>" class="btn btn-secondry">Back</a>
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
