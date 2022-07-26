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
          <thead>
            <tr>
							<th>No</th>
							<th>Pelanggan</th>
							<th>Lapangan</th>
							<th>Tanggal</th>
							<th>Jam</th>
							<th>Harga</th>
							<th>Status</th>
							<th>Bukti</th>
							<th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no = 1;
            foreach($pemesanans as $pemesanan):
              $jam = strtotime( $pemesanan['tanggal_jam'] );
              $jam = date('H:i', $jam);
              $tanggal = date('d-m-Y', strtotime( $pemesanan['tanggal_jam']));
              // $tanggal = date('H:i', $jam);

              $jam2 = new DateTime($jam);
              $jam2->add(new DateInterval('PT'.$pemesanan['durasi'].'H'));

            ?>
            <tr>
							<td class="text-center align-middle"><?= $no++; ?></td>
							<td class="align-middle"><?= $pemesanan['pelanggan']; ?></td>
							<td class="align-middle"><?= $pemesanan['lapangan']; ?></td>
							<td class="align-middle"><?= $tanggal; ?></td>
							<td class="align-middle"><?= $jam." - ".$jam2->format('H:i'); ?></td>
							<td class="align-middle"> <?= "Rp. ".number_format($pemesanan['harga'],0,',','.')?></td>
							<td class="align-middle"><?= $pemesanan['status']; ?></td>
							<td class="text-center">
                <?php if ($pemesanan['bukti_bayar'] == ""){
                  echo "Belum upload bukti";
                }else{
                ?>
                  <button type="button" class="btn btn-info rounded" data-toggle="modal" data-target="#modal-xl<?=$pemesanan['id_pemesanan']?>">
                    Lihat Bukti
                  </button>
                <?php
                } 
                ?>
              </td>
							<td class="align-middle">
                <button class="btn btn-success tmb_edit_pemesanan <?= ($pemesanan['status']=="proses") ? "" : "d-none"?>" id="<?= $pemesanan['id_pemesanan']; ?>">Konfirmasi</button>
                <button class="btn btn-danger tmb_hapus" id="<?=$pemesanan['id_pemesanan']?>">Hapus</button>
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

<?php
  foreach($pemesanans as $pemesanan): 
?>
  <div class="modal fade" id="modal-xl<?=$pemesanan['id_pemesanan']?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Bukti Transfer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <img src="<?=base_url('public/img/bukti_bayar/').$pemesanan['bukti_bayar']?>" height="300">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php endforeach; ?>
