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
                <th width="" class="text-center">Lowongan</th>
                <th width="" class="text-center">Status Lamaran</th>
                <th width="" class="text-center">Nilai</th>
                <th width="" class="text-center">Tgl Melamar</th>
                <th width="15%" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $no = 1;
              foreach($lamarans as $lamaran):
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
                <td><?= $lamaran['judul']; ?></td>
                <td class="text-center"><?= $status_lamaran; ?></td>
                <td class="text-center">
                  <?= ($lamaran['nilai_tes']) ? $lamaran['nilai_tes'] : '-' ?>
                </td>
                <td class="text-center">
                  <?= ($lamaran['tgl_tes']) ? date( 'd-m-Y', strtotime($lamaran['tgl_tes'])) : '-' ?>  
                </td>
                <td class="project-actions text-center">
                  <a href="<?= base_url("pengerjaan-tes/".$lamaran['id_lamaran']) ?>">
                    <button class="btn btn-sm btn-icon btn-primary 
                      <?= ($lamaran['status_lamaran'] == 'Tes') ? '' : 'd-none' ?>" id="<?= $lamaran['id_lamaran'] ?>"
                      data-toggle="tooltip" data-placement="top" title="Kerjakan Tes">
                      <i class="fas fa-clipboard-list"></i>
                    </button>
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
  <!-- /.Data Table -->

