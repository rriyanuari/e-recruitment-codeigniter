  <section class="py-3 text-center container">
        <h1 class="fw-light">Status Lamaran</h1>
        <p class="lead text-muted">
          Daftar lamaran yang sudah dikirim.
        </p>
  </section>

  <!-- Data Table -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-hover datatable" width="100%">
            <thead>
              <tr>
                <th width="" class="text-center">No</th>
                <th width="" class="text-center">Judul</th>
                <th width="" class="text-center">Deskripsi</th>
                <th width="" class="text-center">Tgl Dibuat</th>
                <th width="" class="text-center">Status</th>
                <th width="15%" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
            <!-- <?php
              $no = 1;
              foreach($lowongans as $lowongan):
              ?>
              <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td><?= $lowongan['judul']; ?></td>
                <td><?= $lowongan['deskripsi']; ?></td>
                <td class="text-center"><?= $lowongan['tgl_dibuat']; ?></td>
                <td class="text-center"><?= ($lowongan['status_aktif'] == 0) ? "-" : "Aktif" ; ?></td>
                <td class="project-actions text-center">
                  <a class="btn btn-sm btn-icon btn-primary" href="<?=base_url('admin/lowongan-edit/').$lowongan['id']?>">
                    <i class="fas fa-edit"></i>
                  </a>
                  <button class="btn btn-sm btn-icon btn-danger tmb_hapus" id="<?= $lowongan['id'] ?>">
                    <i class="fas fa-times-circle"></i>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?> -->
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

