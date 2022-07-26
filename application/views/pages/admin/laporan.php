<!-- Data Table -->
<div class="row">
  <div class="col-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-hover datatable">
          <div class="d-flex">
            <div class="col-md-6">
              <label>Tanggal awal:</label>
              <input type="date" class="form-control" id="tgl_awal" value="<?=$tgl_awal?>">
              <br>
              <label>Tanggal akhir:</label>
              <input type="date" class="form-control" id="tgl_akhir" value="<?=$tgl_akhir?>">
            </div>

            <!-- BUTTON -->
            <div class="col-md-6">
              <br>              
              <br>
              <br>
              <br>
              <br>
              <a><button type="button" class="btn btn-outline-success m-2 mb-3 px-3" id="tmb_cari">Cari</i></button></a>
            </div>
            <div class="col-md-2 text-right">
              <br>
              <?php
                if($pemesanans->num_rows() > 0){
              ?>
              <a href="<?php echo base_url()."admin/laporan_print?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir;?>"><button class="btn btn-small btn-success-primary m-2 mb-3 "><i class="fas fa-print"></i></button></a>
              <?php
                }
              ?>
            </div>
          </div>

          <br>

          <!-- <div class="d-flex mb-4">
            <div class="ml-auto">
            </div>
          </div> -->

          <thead>
            <tr>
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
              if($pemesanans->num_rows() > 0){
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
            <?php
              }else{
              ?>
              <tr>
                <td colspan="6" class="text-center">Silahkan Pilih Periode Tanggal</td>
              </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.Data Table -->

<!-- MODAL CREATE -->
<div class="modal fade" id="modal-create">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Tambah Data Jenis Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-group col-md-12">
            <label for="nama_jenisBarang">Nama Barang</label>
            <input type="text" name="nama_jenisBarang" class="form-control" id="nama_jenisBarang" placeholder="Isi Nama Barang">
          </div>
          <div class="form-group col-md-6">
            <label>Satuan</label>
            <select name="satuan_jenisBarang" id="satuan_jenisBarang" class="form-control select2bs4" style="width:100%;">
              <option value="">-</option>
              <option value="roll">Roll</option>
              <option value="pail">Pail</option>
              <option value="pcs">Pcs</option>
              <option value="bag">Bag</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="nominal_jenisBarang">Nominal Barang</label>
            <input type="text" name="nominal_jenisBarang" class="form-control" id="nominal_jenisBarang" placeholder="Isi Nominal Barang">
          </div>
        </div>    
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="tmb-add-jenisBarang" class="btn btn-primary">Submit</button>
      </div>
    </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.MODAL CREATE -->
