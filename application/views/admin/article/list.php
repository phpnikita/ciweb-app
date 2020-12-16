  <?php
      define('title', 'All Articles'); 
      $this->load->view('admin/header');  ?>

		 <!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
		    <!-- Content Header (Page header) -->
		    <div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">All Article</h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="<?php base_url().'admin/home/index'?>">Home</a></li>
		              <li class="breadcrumb-item active">Article</li>
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
	          		if (!empty($this->session->flashdata('success'))) {
	          	?>
	          	<div class="alert alert-success"><?= $this->session->flashdata('success');?></div>
	          	<?php
	          		}
	          	?>
	            <div class="card">
	              	<div class="card-header">
	              		<div class="card-title">
	              			<form class="form-inline ml-3" >
						      <div class="input-group input-group-sm">
						        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="q" value="<?= $queryString;?>">
						        <div class="input-group-append">
						          <button class="input-group-text" type="submit">
						            <i class="fas fa-search"></i>
						          </button>
						        </div>
						      </div>
						    </form>
						    
						</div>
						<div class="card-tools">
						    <a href="<?=  BASE_URL().'admin/article/create'?>" class="btn btn-primary"><i class="fas fa-plus"> Create</i></a>
						 </div>
	              	</div>
	              	<div class="card-body">
	              		<table class="table">
	              			<tr>
	              				<th width="50">#</th>
	              				<th width="100">Image</th>
	              				<th>Title</th>
	              				<th width="180">Author</th>
	              				<th width="100">Created</th>
	              				<th width="70">Status</th>
	              				<th width="140" class="text-center">Action</th>
	              			</tr>
	              			<?php
	              				if (!empty($articles)) {
	              					$i=1;
	              					foreach ($articles as $articleRow) {
	              			?>
	              			<tr>
	              				<td><?= $i++;?></td>
	              				<td><img class="w-100" src="<?= base_url().'public/uploads/articles/thumb_admin/'.$articleRow['image'];?>"></td>
	              				<td><?= $articleRow['title']; ?></td>
	              				<td><?= $articleRow['author']; ?></td>
	              				<td><?= date('Y-m-d',strtotime($articleRow['created_at'])); ?></td>
	              				<td>
	              					<?php if ($articleRow['status'] == 1) {?>
	              					<span class="badge badge-success"> Status</span></td>
	              				<?php }else{?>
	              					<span class="badge badge-danger"> Block</span></td>

	              				<?php }?>
	              				<td class="text-center">
	              					<a href="<?= base_url().'admin/article/edit/'.$articleRow['id'];?>" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
	              					<a href="javascript:void(0);" onclick="deleteArticle(<?= $articleRow['id'];?>)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
	              				</td>
	              			</tr>
	              		<?php } } else{ ?>
	              			<tr>
	              				<td colspan="7">No Records Found</td>
	              			</tr>
	              		<?php } ?>
	              		</table>
	              		<?php
	              			echo $pagination_links;
	              		?>
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
		function deleteArticle($id){
			// alert($id);

			if(confirm("Are you sure you want to delete Article")){
				window.location.href = '<?php echo base_url()."admin/article/delete/"?>'+$id;
			}
		}
	</script>
