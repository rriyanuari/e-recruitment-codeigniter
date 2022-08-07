<!-- Data Table -->
<div class="row">
  <div class="col-12">
    <div class="card card-maroon">
      <div class="card-header">
        <h3 class="card-title"></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <div class="d-flex">
            <div class="col-md-4">
              <label>Tanggal awal:</label>
              <input type="date" class="form-control" id="tgl_awal" value="<?=$tgl_awal?>">
            </div>
            <div class="col-md-4">
              <label>Tanggal akhir:</label>
              <input type="date" class="form-control" id="tgl_akhir" value="<?=$tgl_akhir?>">
            </div>

            <!-- BUTTON -->
            <div class="col-md-2">
              <br>
              <a><button type="button" class="btn btn-outline-danger m-2 mb-3 px-3" id="tmb_cari">Cari</i></button></a>
            </div>
            <div class="col-md-2 text-right">
              <br>
              <?php
                if($lamarans->num_rows() > 0){
              ?>
              <a href="<?php echo base_url()."admin/laporan_print?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir;?>"><button class="btn btn-small btn-outline-danger m-2 mb-3 "><i class="fas fa-print"></i></button></a>
              <?php
                }
              ?>
            </div>
          </div>

          <br>

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
            if($lamarans->num_rows() > 0){
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
            }else{
          ?>
            <tr>
              <td colspan="7" class="text-center">Silahkan Pilih Periode Tanggal</td>
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
