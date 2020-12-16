  <?php
      define('title', 'All Category'); 
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
		              <li class="breadcrumb-item active">Category</li>
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
	          	<?php if($this->session->flashdata('success') != ""){ ?>
	          	<div class="alert alert-success"><?= $this->session->flashdata('success');?></div>
	            <?php } ?>
	            <?php if($this->session->flashdata('error') != ""){ ?>
	          	<div class="alert alert-danger"><?= $this->session->flashdata('error');?></div>
	            <?php } ?>
	            <div class="card">
	              	<div class="card-header">
	              		<div class="card-title"><form class="form-inline ml-3">
						      <div class="input-group input-group-sm">
						        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="q" value="<?php echo $queryString;?>">
						        <div class="input-group-append">
						          <button class="input-group-text" type="submit">
						            <i class="fas fa-search"></i>
						          </button>
						        </div>
						      </div>
						    </form>
						    
						</div>
						<div class="card-tools">
						    <a href="<?=  BASE_URL().'admin/category/create'?>" class="btn btn-primary"><i class="fas fa-plus"> Create</i></a>
						 </div>
	              	</div>
	              	<div class="card-body">
	              		<table class="table">
	              			<tr>
	              				<th width="50">#</th>
	              				<th>Name</th>
	              				<th width="100">Status</th>
	              				<th width="160">Action</th>
	              			</tr>
	              			<?php
	              				if (!empty($categories)) {
	              					$i=1;
	              					foreach ($categories as $categoryRow) {
	              			?>
	              			<tr>
	              				<td><?= $i++;?></td>
	              				<td><?= $categoryRow['name']; ?></td>
	              				<td>
	              					<?php if ($categoryRow['status'] == 1) {?>
	              					<span class="badge badge-success"> Status</span></td>
	              				<?php }else{?>
	              					<span class="badge badge-danger"> Block</span></td>

	              				<?php }?>
	              				<td class="text-center">
	              					<a href="<?php echo base_url().'admin/category/edit/'.$categoryRow['id'];?>" class="btn btn-primary">Edit</a>
	              					<a href="javascript:void(0);" onclick="deleteCategory(<?= $categoryRow['id'];?>)" class="btn btn-danger">Delete</a>
	              				</td>
	              			</tr>
	              		<?php } } else{ ?>
	              			<tr>
	              				<td colspan="4">No Records Found</td>
	              			</tr>
	              		<?php } ?>
	              		</table>
	              	</div>
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

	<script type="text/javascript">
		function deleteCategory($id){
			// alert($id);

			if(confirm("Are you sure you want to delete category")){
				window.location.href = '<?php echo base_url()."admin/category/delete/"?>'+$id;
			}
		}
	</script>
