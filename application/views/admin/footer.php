 <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
   <!--  <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="">CI Web Application</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url();?>public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url();?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>public/admin/dist/js/adminlte.min.js"></script>
<!-- summerNote -->
<script src="<?= base_url();?>public/admin/plugins/summernote/summernote-bs4.js"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({
    	  height : '200px'
    	})
  })
</script>
</body>
</html>
