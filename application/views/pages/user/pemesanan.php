<script>
      function countdown(kd_inv, tgl_transaksi){
      // Set the date we're counting down to
      var countDownDate = new Date(tgl_transaksi).getTime();

      // Update the count down every 1 second
      var x = setInterval(function() {

        // Get today's date and time
        var now = new Date();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with kd_inv="demo"
        $('#'+kd_inv).html(hours + " : " + minutes + " : " + seconds);

        // If the count down is finished, write some text
        if (distance < 0) {
          clearInterval(x);
          $('#'+kd_inv).html("Expired");
        }
      }, 1000);
    }
</script>

<div class="container my-5">
    <!-- Data Table -->
      <div class="col-12">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-hover" width="100%">
              <div class="d-flex mb-4">

                <div class="ml-auto">
                  <a href="<?=base_url('tambah-pemesanan')?>">
                    <button type="button" class="btn btn-outline-success">
                      <b>Tambah Pemesanan</b>
                    </button>  
                  </a>
                  <!-- <a href="#"><button class="btn btn-small btn-outline-primary m-2 mb-3 "><i class="fas fa-print"></i></button></a>
                  <a href="#"><button class="btn btn-small btn-outline-primary m-2 mb-3"><i class="fas fa-download"></i></button></a> -->
                </div>
              </div>

              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Lapangan</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Harga</th>							
                  <th>Status</th>							
                  <th>Bukti Bayar</th>							
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $no = 1;
                if($pemesanans->num_rows() > 0){
                  $pemesanans = $pemesanans->result_array();
                  foreach($pemesanans as $pemesanan):
                    if($pemesanan['lapangan'] == "Lapangan 1") {
                      $jenis_lapangan = "Rumput";
                    }else{
                      $jenis_lapangan = "Matras";
                    }

                    $jam = strtotime( $pemesanan['tanggal_jam'] );
                    $jam = date('H:i', $jam);

                    $jam2 = new DateTime($jam);
                    $jam2->add(new DateInterval('PT'.$pemesanan['durasi'].'H'));

                    $tanggal = date('d-m-Y', strtotime( $pemesanan['tanggal_jam']));

                    ?>
                    <tr>
                      <td width="10%" class="text-center align-middle"><?= $no++; ?></td>
                      <td class="align-middle"><?php echo $pemesanan['lapangan']." - ".$jenis_lapangan; ?></td>
                      <td class="text-center align-middle"><?= $tanggal ?></td>
                      <td class="text-center align-middle"><?= $jam." - ".$jam2->format('H:i') ?></td>
                      <td class="text-right align-middle"><?= "Rp. ".number_format($pemesanan['harga'],0,',','.'); ?></td>
                      <td class="text-center align-middle">
                        <?= $pemesanan['status']; ?> <br />
                        <span id="<?=$pemesanan['id_pemesanan']?>"></span>
                        <?php 
                          if ($pemesanan['status']=="pending")
                          {
                            $tgl_transaksi = new DateTime($pemesanan['tgl_pemesanan']);
                            $tgl_transaksi = $tgl_transaksi->modify('+30 minutes');
                            $tgl_transaksi = $tgl_transaksi->format('Y-m-d H:i:s');
                        ?>
                          <script type="text/javascript">
                            countdown(<?php echo "'".$pemesanan['id_pemesanan']."', '".$tgl_transaksi."'"; ?>)
                          </script>
                        <?php
                          }
                        ?>
                      </td>
                      <td class="text-center align-middle">
                        <?php if ($pemesanan['bukti_bayar'] == ""){
                          echo "Belum upload bukti";
                        }else{
                        ?>
                        <button type="button" class="btn btn-info rounded" data-toggle="modal" data-target="#modal-xl<?=$pemesanan['id_pemesanan']?>">
                          Lihat Bukti
                        </button>
                        <?php
                        } 
                        ?>
                      </td>
                      <td width="10%" class="project-actions text-center align-middle">
                        

                          <a href="<?=base_url('edit-pemesanan/').$pemesanan['id_pemesanan']?>">
                              detail
                          </a>
                          |
                          <a href="#" class="tmb_hapus <?= ($pemesanan['status'] != "pending") ? "d-none" : "" ?>" id="<?= $pemesanan['id_pemesanan'] ?>">
                              hapus
                          </a>                      
                      </td>
                    </tr>
                <?php 
                  endforeach; 
                }else{
                ?>
                  <tr>
                    <td colspan="8" class="text-center">Belum ada Pemesanan</td>
                  </tr>
                <?php
                }  
                ?>

              </tbody>
            </table>
            <div class="mt-3">
              <p>
                Silahkan lakukan pembayaran dengan cara transfer sejumlah uang transaksi ke rekening berikut : <br>
                <table width="40%">
                  <tr>
                    <td>Nama</td>
                    <td>: ADITIYA</td>
                  </tr>
                  <tr>
                    <td>Bank</td>
                    <td>: <em>BCA</em></td>
                  </tr>
                  <tr>
                    <td>No Rekening</td>
                    <td>: <em>8880316045</em></td>
                  </tr>

                </table>
              </p>
            </div>
          </div>
          <!-- /.card-body -->
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.Data Table -->
</div>

<?php
  foreach($pemesanans as $pemesanan): 
?>
  <div class="modal fade" id="modal-xl<?=$pemesanan['id_pemesanan']?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Bukti Transfer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <img src="<?=base_url('public/img/bukti_bayar/').$pemesanan['bukti_bayar']?>" height="300">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php endforeach; ?>

