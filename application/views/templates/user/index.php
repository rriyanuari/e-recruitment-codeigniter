<?php $this->load->view('templates/user/header'); ?>

  <div class="content-wrappe pb-3">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <?php $this->load->view('pages/user/'.$page); ?>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  <?php $this->load->view('templates/user/footer'); ?>