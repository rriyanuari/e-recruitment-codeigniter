<!-- Data Table -->
<div class="row">
  <div class="col-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <div class="d-flex mb-4">

            <div class="ml-auto">
              <a href="<?=base_url('admin/lapangan-tambah')?>">
                <button type="button" class="btn btn-outline-success">
                  <b>Tambah Lapangan</b>
                </button>  
              </a>
            </div>
          </div>
        <table class="table table-hover datatable" width="100%">


          <thead>
            <tr>
            <th>No</th>
							<th>Lapangan</th>
							<th>Jenis</th>
							<th>Weekday Siang</th>
							<th>Weekday Malam</th>
							<th>Weekend</th>
              <th>Weekend Malam</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no = 1;
            foreach($lapangans as $lapangan):
            ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
							<td><?= $lapangan['lapangan']; ?></td>
							<td><?= $lapangan['jenis_lapangan']; ?></td>
              <td width="10%">Rp <span class="text-right"><?=number_format($lapangan['weekday_siang'],0,',','.');?></td>
              <td width="10%">Rp <span class="text-right"><?=number_format($lapangan['weekday_malam'],0,',','.');?></td>
              <td width="10%">Rp <span class="text-right"><?=number_format($lapangan['weekend'],0,',','.');?></td>
              <td width="10%">Rp <span class="text-right"><?=number_format($lapangan['weekend_malam'],0,',','.');?></td>
              <td class="project-actions text-center">
                  <a href="<?=base_url('admin/lapangan-edit/').$lapangan['id_lapangan']?>" class="">
                      edit
                  </a>
                  |
                  <a href="#" class="tmb_hapus" id="<?= $lapangan['id_lapangan'] ?>">
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
