<div class="container my-5">
  <h2 class="text-center">Papan Jadwal</h2>
  <div class="my-5">
    <div class="d-flex">
      <p class="bg-warning">Tanggal : <?=($tgl_cari != "") ? $tgl_cari : date('Y-m-d')?></p>
      <div class="ml-auto">
        <label for="tanggal_papan_jadwal">Pilih Tanggal : </label>
        <input type="date"  name="tanggal_papan_jadwal" id="tanggal_papan_jadwal" value="<?=$tgl_cari?>">
        <button type="button"id=tmb_cari>Cari</button>
      </div>
    </div>
    <div class="row">
      <!-- LAPANGAN 1 - RUMPUT -->
      <div class="col-sm-12 col-md-6">

        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th colspan="3" class="text-center text-primary">Lapangan 1 (Rumput)</th>
            </tr>
            <tr class="text-center">
              <th width="30%">Jam</th>
              <th width="50%">Nama / Club</th>
              <th width="20%">No HP</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $start    = new DateTime("08:00");
              $end      = new DateTime("24:00");
              $interval = new DateInterval('PT1H');
              $period   = new DatePeriod($start, $interval, $end);

              foreach ($period as $time):
              $jam1 = $time->format('H:i');

              $jam2 = new DateTime($jam1);
              $jam2->add(new DateInterval('PT1H'));

            ?>
              <tr>
                <td class="text-center"><?php echo $time->format('H:i') ." - ". $jam2->format('H:i') ?></td>
                <?php
                    foreach ($pemesanans as $pemesanan):
                      $jam_pesan = date('H:i', strtotime( $pemesanan['tanggal_jam']));

                      $jam_pesan2 = new DateTime($jam_pesan);
                      $jam_pesan2 = $jam_pesan2->add(new DateInterval('PT'.$pemesanan['durasi'].'H'));
                      $jam_pesan2 = $jam_pesan2->format('H:i');

                      $start    = new DateTime($jam_pesan);
                      $end      = new DateTime($jam_pesan2);
                      $interval = new DateInterval('PT1H');
                      $period   = new DatePeriod($start, $interval, $end);

                      if($pemesanan['lapangan']=="Lapangan 1"){
                        foreach ($period as $time):
                          if($time->format('H:i') == $jam1){
                            echo "<td class=\"text-center bg-success\">".$pemesanan['pelanggan']."</td>
                                  <td class=\"text-center bg-success\">".$pemesanan['no_hp']."</td>";
                          }
                        endforeach;
                      }
                    endforeach;
                  ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- LAPANGAN 2 - MATRAS -->
      <div class="col-sm-12 col-md-6">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th colspan="3" class="text-center text-primary">Lapangan 2 (Matras)</th>
            </tr>
            <tr class="text-center">
              <th width="30%">Jam</th>
              <th width="50%">Nama / Club</th>
              <th width="20%">No HP</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $start    = new DateTime("08:00");
              $end      = new DateTime("24:00");
              $interval = new DateInterval('PT1H');
              $period   = new DatePeriod($start, $interval, $end);

              foreach ($period as $time):
              $jam1 = $time->format('H:i');

              $jam2 = new DateTime($jam1);
              $jam2->add(new DateInterval('PT1H'));
            ?>
              <tr>
                <td class="text-center"><?php echo $time->format('H:i') ." - ". $jam2->format('H:i') ?></td>
                <?php
                    foreach ($pemesanans as $pemesanan):
                      $jam_pesan = date('H:i', strtotime( $pemesanan['tanggal_jam']));

                      $jam_pesan2 = new DateTime($jam_pesan);
                      $jam_pesan2 = $jam_pesan2->add(new DateInterval('PT'.$pemesanan['durasi'].'H'));
                      $jam_pesan2 = $jam_pesan2->format('H:i');

                      $start    = new DateTime($jam_pesan);
                      $end      = new DateTime($jam_pesan2);
                      $interval = new DateInterval('PT1H');
                      $period   = new DatePeriod($start, $interval, $end);

                      if($pemesanan['lapangan']=="Lapangan 2"){
                        foreach ($period as $time):
                          if($time->format('H:i') == $jam1){
                            echo "<td class=\"text-center bg-success\">".$pemesanan['pelanggan']."</td>
                                  <td class=\"text-center bg-success\">".$pemesanan['no_hp']."</td>";
                          }
                        endforeach;
                      }
                    endforeach;
                  ?>
              </tr>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  

</div>