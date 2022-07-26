<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="lapangan">Nama lapangan</label>
      <input type="text" class="form-control" id="lapangan" name="lapangan" value="<?=$lapangan['lapangan']?>">
    </div>
    <div class="form-group">
      <label for="jenis">Jenis</label>
      <input type="text" class="form-control" id="jenis" name="jenis" value="<?=$lapangan['jenis_lapangan']?>">
    </div>
    <div class="form-group">
      <label for="weekday_siang">Weekday Siang</label>
      <input type="number" class="form-control" id="weekday_siang" name="weekday_siang" value="<?=$lapangan['weekday_siang']?>">
    </div>
    <div class="form-group">
      <label for="weekday_malam">Weekday Malam</label>
      <input type="number" class="form-control" id="weekday_malam" name="weekday_malam" value="<?=$lapangan['weekday_malam']?>">
    </div>
    <div class="form-group">
      <label for="weekend">Weekend</label>
      <input type="number" class="form-control" id="weekend" name="weekend" value="<?=$lapangan['weekend']?>">
    </div>
    <div class="form-group">
      <label for="weekend_malam">Weekend Malam</label>
      <input type="number" class="form-control" id="weekend_malam" name="weekend_malam" value="<?=$lapangan['weekend_malam']?>">
    </div>
    <br>
    <div class="form-group">
      <button type="button" class="btn btn-outline-success btn-block tmb_edit_lapangan" id="<?=$lapangan['id_lapangan']?>">
        <b>Simpan</b>
      </button>  
    </div>
</div>