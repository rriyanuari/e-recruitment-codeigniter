    <!-- /.content-wrapper -->
    <!-- <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
      </div>
    </footer> -->
  </div>
  <!-- ./wrapper -->


  <!-- JQUERY  -->
  <script src="<?=base_url('public/');?>plugins/jquery/jquery.min.js"></script>
  <script src="<?=base_url('public/');?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="<?=base_url('public/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url('public/');?>plugins/sparklines/sparkline.js"></script>
  <script src="<?=base_url('public/');?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?=base_url('public/');?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="<?=base_url('public/');?>plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="<?=base_url('public/');?>plugins/moment/moment.min.js"></script>
  <script src="<?=base_url('public/');?>plugins/daterangepicker/daterangepicker.js"></script>
  <script src="<?=base_url('public/');?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="<?=base_url('public/');?>plugins/summernote/summernote-bs4.min.js"></script>
  <script src="<?=base_url('public/');?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="<?=base_url('public/');?>dist/js/adminlte.js"></script>

  <!-- DataTables -->
  <script src="<?=base_url('public/');?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('public/');?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url('public/');?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?=base_url('public/');?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- Select2 -->
  <script src="<?=base_url('public/');?>plugins/select2/js/select2.full.min.js"></script>
  <script src="<?=base_url('public/');?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <script src="<?=base_url('public/');?>plugins/daterangepicker/daterangepicker.js"></script>

  <script>
    $(document).ready(function(){
        $(".datatable").DataTable({
        "scrollX": true,
        "searching": true,
        "order": false,
        "bOrder": false,
        "paging": false,
        "bInfo": false

        });

        $("#dataUser").DataTable({
        "scrollX": true,
        "searching": true,
        "order": false,
        "bOrder": false,
        "paging": false,
        "bInfo": false
        });
    });

    
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'DD/MM//YYYY hh:mm A'
      }
    })
  })

  </script>

</body>
</html>