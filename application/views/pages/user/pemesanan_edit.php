<script>
      function countdown(tgl_transaksi){
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

        // Display the result in the element with id="demo"
        $("#countdown_pembayaran").val(hours + " : " + minutes + " : " + seconds);

        // If the count down is finished, write some text
        if (distance < 0) {
          clearInterval(x);
          $("#countdown_pembayaran").val("Expired");
        }
      }, 1000);
    }
</script>

<div class="container my-5">
  <div class="py-3">
    <div class="row justify-content-center">
      <!-- <div class="col-md-5 col-sm-12 px-3 border row justify-content-center align-items-center">
        <?php
            if($pemesanan['bukti_bayar'] == ""){
          ?>
            <p>Belum upload bukti bayar</p>
          <?php
            }else{
          ?>
            <img src="<?=base_url('public/img/bukti_bayar/').$pemesanan['bukti_bayar']?>" width=400>
          <?php
            }
          ?>
      </div> -->

      <div class="col-md-12 col-sm-12 px-3 border">
        <form id="submit">
          <table class="table">
            <tr>
              <td colspan="2">
                <h3 class="">Detail Pemesanan</h2>
              </td>
            </tr>
            <tr>
              <td width="40%">Id Pemesanan</td>
              <td width="60%">
                <input type="text" id="id_pemesanan" class="form-control" value="<?=$pemesanan['id_pemesanan']?>" disabled>
              </td>
            </tr>
            <tr>
              <?php
                if($pemesanan['lapangan'] == "Lapangan 1") {
                  $jenis_lapangan = "Rumput";
                }else{
                  $jenis_lapangan = "Matras";
                }
              ?>
              <td>Lapangan</td>
              <td>: <?=$pemesanan['lapangan']." - ".$jenis_lapangan;?></td>
            </tr>
            <tr>
              <?php
                $jam = strtotime( $pemesanan['tanggal_jam'] );
                $jam = date('H:i', $jam);

                $jam2 = new DateTime($jam);
                $jam2->add(new DateInterval('PT'.$pemesanan['durasi'].'H'));
              ?>
              <td>waktu</td>
              <td>: <?= $jam." - ".$jam2->format('H:i') ?></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>: <?= "Rp. ".number_format($pemesanan['harga'],0,',','.')?></td>
            </tr>
            <tr>
              <td>Status</td>
              <td ><input type="text" class="form-control <?= ($pemesanan['status'] != "success") ? "" : "bg-success" ?>" disabled value="<?=$pemesanan['status']?>"></td>
            </tr>
            <?php 
              if ($pemesanan['status']=="pending")
              {
                $tgl_transaksi = new DateTime($pemesanan['tgl_pemesanan']);
                $tgl_transaksi = $tgl_transaksi->modify('+3 hours');
                $tgl_transaksi = $tgl_transaksi->format('Y-m-d H:i:s');
            ?>
              <tr>
                <td>Waktu Pembayaran :</td>
                <td class="<?php if($pemesanan['status'] != "pending"){echo 'd-none';}?>">
                  <input type="text" id="countdown_pembayaran" class="form-control bg-danger" disabled>
                    <script type="text/javascript">
                      countdown('<?= $tgl_transaksi; ?>')
                    </script>
                </td>
              </tr>
            <?php
              }
            ?>
            <tr>
              <td colspan="2" class="<?php if($pemesanan['status'] != 'pending'){echo "d-none";}?>">
                  <label for="upload_bukti">Upload Bukti Transfer</label>
                  <input type="file" class="form-control-file" id="upload_bukti">
              </td>
            </tr>
            <tr>
              <td colspan="2" class="<?php if($pemesanan['status'] != 'pending'){echo "d-none";}?>">
                <button class='btn-sm btn-primary' id="tmb_upload">Upload</button>
              </td>
            </tr>
          </table>
        </form>
      </div>

    </div>
  </div>
</div>

