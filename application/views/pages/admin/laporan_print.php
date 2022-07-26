<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UD Natural Bali - Admin Panel - <?=$title;?></title>

  <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link rel="stylesheet" href="<?=base_url('public/');?>plugins/ionicons/ionicons.min.css"> -->
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/summernote/summernote-bs4.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url('public/');?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/daterangepicker/daterangepicker.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


</head>
<div class="wrapper">

  <div class="container mx-auto mt-5">
    <!-- Main content -->
    <section class="content">
      <div class="container mx-auto">

        <!-- Data Table -->
        <div class="row">
          <div class="col-12">
            <div class="text-center mb-3">
              <h1>Temon Futsal Club</h1>
              <br/>
              <h5>Laporan Penyewaan</h5>
            </div>
            <div class="">Periode : (<?=$tgl_awal .") - (". $tgl_akhir?>)</div>
            <div class="mb-3">Print by : <?=$username?> </div>

            <table class="table table-bordered table-hover">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Pelanggan</th>
                  <th>Lapangan</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Harga</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  $total_penyewaan = 0;

                  foreach($pemesanans->result_array() as $pemesanan):
                      $jam = strtotime( $pemesanan['tanggal_jam'] );
                      $jam = date('H:i', $jam);
                      $tanggal = date('d-m-Y', strtotime( $pemesanan['tanggal_jam']));
                      // $tanggal = date('H:i', $jam);
      
                      $jam2 = new DateTime($jam);
                      $jam2->add(new DateInterval('PT'.$pemesanan['durasi'].'H'));

                      $total_penyewaan += $pemesanan['harga'] 
                  ?>
                  <tr>
                    <td width="10%" class="text-center align-middle"><?= $no++; ?></td>
                    <td width="20%" class="align-middle"><?= $pemesanan['pelanggan']; ?></td>
                    <td width="20%" class="align-middle"><?= $pemesanan['lapangan']; ?></td>
                    <td width="15%" class="align-middle"><?= $tanggal; ?></td>
                    <td width="15%" class="align-middle"><?= $jam." - ".$jam2->format('H:i'); ?></td>
                    <td width="10%" class="align-middle"> <?= "Rp. ".number_format($pemesanan['harga'],0,',','.')?></td>
                  </tr>
                <?php 
                  endforeach; 
                ?>
                  <tr style="font-weight: bold;">
                    <td colspan="5" class="text-center">Total Penyewaan</td>
                    <td>Rp. <?=number_format($total_penyewaan,0,',','.');?></td>
                  </tr>
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.Data Table -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<!-- JQUERY  -->
  <script src="<?=base_url('public/');?>plugins/jquery/jquery.min.js"></script>
  <script src="<?=base_url('public/');?>plugins/jquery-ui/jquery-ui.min.js"></script>
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

  <script>
    window.print();
  </script>

</body>
</html>


