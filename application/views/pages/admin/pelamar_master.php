<!-- Data Table -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
          <div class="d-flex mb-4">

          </div>
        <table class="table table-hover datatable" width="100%">
          <thead>
            <tr>
              <th width="" class="text-center">No</th>
							<th width="" class="text-center">Nama</th>
							<th width="" class="text-center">Pendidikan</th>
							<th width="" class="text-center">Yang Dilamar</th>
							<th width="20%" class="text-center">Status</th>
							<th width="" class="text-center">CV</th>
							<th width="15%" class="text-center">Tgl Lamaran</th>
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
							<td><?= $lamaran['nama_lengkap']; ?></td>
              <td><?= $lamaran['jenjang_pendidikan']; ?></td>
              <td><?= $lamaran['judul']; ?></td>
              <td><?= $status_lamaran; ?></td>
              <td>
                <a href="<?= base_url('lihat-cv/'.$lamaran['cv'])?>" class="btn btn-sm has-icon bg-primary text-white">
                  <i class="fas fa-eye"></i> Lihat CV
                </a>  
              </td>
              <td class="text-right"><?= date( 'd-m-Y', strtotime($lamaran['tgl_dibuat'])); ?></td>
              <td class="project-actions text-center">
                <button class="btn btn-sm btn-icon btn-success tmb_hapus mr-2" id="<?= $lamaran['id'] ?>">
                  <i class="fas fa-check-circle"></i>
                </button><button class="btn btn-sm btn-icon btn-danger tmb_hapus" id="<?= $lamaran['id'] ?>">
                  <i class="fas fa-times-circle"></i>
                </button>
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