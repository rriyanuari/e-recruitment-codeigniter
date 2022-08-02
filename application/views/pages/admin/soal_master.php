<!-- Data Table -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
          <div class="d-flex mb-4">

            <div class="ml-auto">
              <a href="<?=base_url('admin/soal-tambah')?>" class="btn btn-icon icon-left btn-success">
                <i class="fas fa-plus-circle"></i> Tambah
              </a>
            </div>
          </div>
        <table class="table datatable" width="100%">
          <thead>
            <tr>
              <th width="" class="text-center">No</th>
							<th width="" class="text-center">Pertanyaan</th>
							<th width="" class="text-center">Pilihan Jawaban</th>
							<th width="" class="text-center">Kunci Jawaban</th>
              <th width="15%" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no = 1;
            foreach($soals as $soal):
            ?>
            <tr ">
              <td class="text-center"><?= $soal['nomor'] ?></td>
							<td><?= $soal['soal']; ?></td>
							<td style="padding: 10px 25px;">
                a. <?= $soal['a']; ?> <br />
                b. <?= $soal['b']; ?> <br />
                b. <?= $soal['c']; ?> <br />
              </td>
              <td><?= $soal['jawaban']; ?></td>
              <td class="project-actions text-center">
                <a class="btn btn-sm btn-icon btn-primary" href="<?=base_url('admin/soal-edit/').$soal['id']?>">
                  <i class="fas fa-edit"></i>
                </a>
                <button class="btn btn-sm btn-icon btn-danger tmb_hapus" id="<?= $soal['id'] ?>">
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