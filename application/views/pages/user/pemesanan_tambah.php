<div class="container my-5">
  <div class="py-3">
    <div class="row justify-content-center">
      <div class="col-md-5 col-sm-12 mx-3 px-3 border">
        <h2 class="text-center">Tabel Biaya Sewa</h2>
        <br>
        <br>
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th width="50%">Waktu</th>
              <th width="25%">Lapangan 1</th>
              <th width="25%">Lapangan 2</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>SENIN -JUMAT (WEEKDAY) <br> JAM 08.00-16.00</td>
              <td>Rp. 75.000</td>
              <td>Rp. 100.000</td>
            </tr>
            <tr>
              <td>SENIN -JUMAT (WEEKDAY) <br> JAM 17.00-24.00</td>
              <td>Rp. 100.000</td>
              <td>Rp. 130.000</td>
            </tr>
            <tr>
              <td>SABTU & MINGGU & LIBUR NASIONAL (WEEKEND DAY) <br> JAM 08.00-16.00</td>
              <td>Rp. 120.000</td>
              <td>Rp. 130.000</td>
            </tr>
            <tr>
              <td>SABTU & MINGGU & LIBUR NASIONAL (WEEKEND DAY) <br> JAM 17.00-24.00</td>
              <td>Rp. 140.000</td>
              <td>Rp. 150.000</td>
            </tr>
              
          </tbody>
        </table>
      </div>

      <div class="col-md-5 col-sm-12 mx-1 px-3 border">
        <h2 class="text-center">Tambah Pemesanan</h2>
        <br>
        <br>
        <div class="form-group">
          <label for="lapangan">Lapangan</label>
          <select class="form-control" id="lapangan">
            <?php
              foreach($lapangans as $lapangan):
            ?>
            <option value="<?=$lapangan['lapangan']?>" <?=($lapangan['lapangan']==$lapangan_pesan)?"selected":""?>><?=$lapangan['lapangan']." - ".$lapangan['jenis_lapangan']?></option>
            <?php endforeach; ?>
          </select>
        </div>
              
        <div class="form-group">
          <?php
            $now = date("Y-m-d");

            $tomorrow = new DateTime($now);
            $tomorrow->modify('+1 day');
          ?>
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" min="<?=$tomorrow->format('Y-m-d')?>" value="<?=$tgl?>">
        </div>
        
        <div class="form-group">
          <button class="btn btn-primary" id="cari">
            Pilih
          </button>
        </div>

        <hr>

        <div class="form-group <?=($tgl=="")?"d-none":""?>">
          <label for="jam">Pilih Jam</label>
          <select class="form-control" id="jam">
            <?php
              date_default_timezone_set("Asia/Jakarta");

              $start        = new DateTime("08:00");
              $tgl_now      = date('Y-m-d');
              $jam_now      = date('H:i');
              $jam_now      = new DateTime($jam_now);

              $end      = new DateTime("24:00");
              $interval = new DateInterval('PT1H');
              $period   = new DatePeriod($start, $interval, $end);
              $period2   = new DatePeriod($start, $interval, $jam_now);

              // Loop Jam pesan (ERROR)
              foreach ($period as $time):
            ?>
            <option value="<?=$time->format('H:i');?>" 
            <?php
            foreach ($pemesanans as $pemesanan):
              $tgl_pesan = date('Y-m-d', strtotime( $pemesanan['tanggal_jam']));
              if($tgl == $tgl_pesan){
                $jam_pesan = date('H:i', strtotime( $pemesanan['tanggal_jam']));

                $jam_pesan2 = new DateTime($jam_pesan);
                $jam_pesan2 = $jam_pesan2->add(new DateInterval('PT'.$pemesanan['durasi'].'H'));
                $jam_pesan2 = $jam_pesan2->format('H:i');
  
                $start3    = new DateTime($jam_pesan);
                $end3     = new DateTime($jam_pesan2);
                $period3   = new DatePeriod($start3, $interval, $end3);
                foreach ($period3 as $time3):
                  if($time->format('H:i') == $time3->format('H:i')){
                    echo "class=\"bg-secondary\" disabled";
                  }
                endforeach;
              }
            endforeach;
            // if($tgl == $tgl_now){
            //   foreach ($period2 as $time2):
            //     if($time->format('H:i') == $time2->format('H:i')){
            //       echo "class=\"bg-secondary\" disabled";
            //     }
            //   endforeach; 
            // }

            ?> 
            ><?=$time->format('H:i');?></option>
            <?php
              endforeach; 
            ?>
          </select>
        </div>

        <div class="form-group <?=($tgl=="")?"d-none":""?>">
          <label for="durasi">Durasi (jam)</label>
          <input type="number" class="form-control" id="durasi" value="1" name="durasi" min="1" max="6" 
                  onKeyUp="if(this.value>6){this.value='6';}else if(this.value<1){this.value='1';}">
        </div>

        <br>
        <div class="form-group <?=($tgl=="")?"d-none":""?>">
          <button type="button" class="btn btn-outline-primary btn-block" id="tmb_tambah_pemesanan">
            <b>Simpan</b>
          </button>  
        </div>
      </div>
    </div>
  </div>
</div>

