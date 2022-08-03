<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?> &mdash; Admin</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
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
              <h1>PT. PUTRA SINAR BARU SEJATI</h1>
              <br/>
              <h5><?=$title;?></h5>
            </div>
            <div class="mb-3">Periode : (<?=$tgl_awal .") - (". $tgl_akhir?>)</div>

            <table class="table table-bordered table-hover">
              <thead>
                <tr class="text-center">
                  <th width="" class="text-center">No</th>
                  <th width="" class="text-center">Nama</th>
                  <th width="" class="text-center">Pendidikan</th>
                  <th width="" class="text-center">Yang Dilamar</th>
                  <th width="20%" class="text-center">Status</th>
                  <th width="" class="text-center">Nilai Tes</th>
                  <th width="15%" class="text-center">Tgl Lamaran</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $no = 1;
                foreach($lamarans->result_array() as $lamaran):
                  switch ($lamaran['status_lamaran']) {
                    case 'Tes':
                      $status_lamaran = 'Menunggu pengerjaan Tes';
                      break;
    
                    case 'Proses':
                      $status_lamaran = 'Lamaran sedang di proses';
                      break;
    
                    case 'Lulus':
                      $status_lamaran = 'Selamat anda lulus, akan dilanjut ke proses interview';
                      break;
                    
                    case 'Tidak Lulus':
                      $status_lamaran = 'Tidak Lulus';
                      break;
                    
                    default:
                      # code...
                      break;
                  }
              ?>
                <tr>
                  <td class="text-center"><?= $no++; ?></td>
                  <td><?= $lamaran['nama_lengkap']; ?></td>
                  <td><?= $lamaran['jenjang_pendidikan']; ?></td>
                  <td><?= $lamaran['judul']; ?></td>
                  <td><?= $status_lamaran; ?></td>
                  <td><?= $lamaran['nilai_tes']; ?></td>
                  <td class="text-right"><?= date( 'd-m-Y', strtotime($lamaran['tgl_dibuat'])); ?></td>
                </tr>
              <?php 
                endforeach;
              ?>
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

  <!-- General JS Scripts -->
  <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

  <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>

  <script>
      window.print();
</script>

</body>
</html>
