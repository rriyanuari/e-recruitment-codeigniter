<div class="row">
  <div class="col-md-12">
    <div class="form-group row">
      <label class="col-form-label col-12 col-md-2 col-lg-2" for="judul">Judul Lowongan</label>
      <div class="col-sm-12 col-md-10">
        <input type="text" class="form-control" id="judul" value="<?= $lowongan['judul'] ?>">
      </div> 
    </div>
    <div class="form-group row mb-4">
      <label class="col-form-label col-12 col-md-2 col-lg-2">Deskripsi Lowongan</label>
      <div class="col-sm-12 col-md-10">
        <textarea class="summernote" id="deskripsi"><?= $lowongan['deskripsi'] ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="control-label">Status Lowongan</div>
      <label class="custom-switch mt-2">
        <input type="checkbox" id="status" class="custom-switch-input" <?= ($lowongan['status_aktif']) ? "checked" : "" ; ?> >
        <span class="custom-switch-indicator"></span>
        <span class="custom-switch-description">Aktifkan lowongan</span>
      </label>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <button type="button" class="btn btn-success btn-block tmb_edit" id="<?= $lowongan['id']; ?>">
        <b>Simpan</b>
      </button>  
    </div>
  </div>
</div>

