<!-- Data Table -->
<div class="row">
  <div class="col-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-hover display nowrap datatable" style="width:100%">
          <div class="d-flex mb-4">
            <div>
              
            </div>
            <div class="ml-auto">
              <a href="<?=base_url('admin/pelanggan-tambah')?>">
                <button type="button" class="btn btn-outline-success">
                  <b>Tambah Pelanggan</b>
                </button>  
              </a>
              <!-- <a href="#"><button class="btn btn-small btn-outline-primary m-2 mb-3 "><i class="fas fa-print"></i></button></a>
              <a href="#"><button class="btn btn-small btn-outline-primary m-2 mb-3"><i class="fas fa-download"></i></button></a> -->
            </div>
          </div>

          <thead>
            <tr>
							<th>No</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Email</th>
							<th>No Hp</th>
							<th>Gabung</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no = 1;
            foreach($pelanggans as $pelanggan):
            ?>
            <tr>
							<td class="text-center"><?= $no++; ?></td>
							<td><?= $pelanggan['pelanggan']; ?></td>
							<td><?= $pelanggan['jenis_kelamin']; ?></td>
							<td><?= $pelanggan['email']; ?></td>
							<td><?= ($pelanggan['no_hp'] != "") ? $pelanggan['no_hp'] : "-"; ?></td>
							<td><?= $pelanggan['tgl_bergabung']; ?></td>
              <td width="10%" class="project-actions text-center">
                  <a href="<?=base_url('admin/pelanggan-edit/').$pelanggan['id_pelanggan']?>" class="">
                      edit
                  </a>
                  |
                  <a href="#" class="tmb_hapus" id="<?= $pelanggan['id_pelanggan'] ?>">
                      hapus
                  </a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.Data Table --
