<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="pelanggan">Nama pelanggan</label>
      <input type="text" class="form-control" id="pelanggan" name="pelanggan" value="<?=$pelanggan['pelanggan']?>">
    </div>
    <div class="form-group">
      <label for="email">email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?=$pelanggan['email']?>">
    </div>
    <br>
    <div class="form-group">
      <button type="button" class="btn btn-outline-Success btn-block tmb_edit_pelanggan" id="<?=$pelanggan['id_pelanggan']?>">
        <b>Simpan</b>
      </button>  
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="jeniskelamin">Jenis Kelamin</label>
      <select class="form-control" id="jeniskelamin">
        <option value="Laki-Laki" <?php if($pelanggan['jenis_kelamin'] == "Laki-Laki") echo "selected"?>>Laki-Laki</option>
        <option value="Perempuan" <?php if($pelanggan['jenis_kelamin'] == "Perempuan") echo "selected"?>>Perempuan</option>
      </select>
    </div>
    <div class="form-group">
      <label for="hp">No HP</label>
      <input type="number" class="form-control" id="hp" name="hp" value="<?=$pelanggan['no_hp']?>">
    </div>

  </div>
</div>