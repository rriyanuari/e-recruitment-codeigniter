<div class="row">
  <div class="col-md-12">
    <div class="form-group row">
      <label class="col-form-label col-12 col-md-2 col-lg-2" for="nomor">Nomor</label>
      <div class="col-sm-12 col-md-10">
        <input type="number" class="form-control" id="nomor">
      </div> 
    </div>
    <div class="form-group row mb-4">
      <label class="col-form-label col-12 col-md-2 col-lg-2">Pertanyaan</label>
      <div class="col-sm-12 col-md-10">
        <input type="text" class="form-control" id="pertanyaan">
      </div> 
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jawaban" value="a" checked="">
            <label class="form-check-label">A</label>
        </div>
      </label>

      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Jawaban A" id="a" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jawaban" value="b" checked="">
            <label class="form-check-label">B</label>
        </div>
      </label>

      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Jawaban B" id="b" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jawaban" value="c" checked="">
            <label class="form-check-label">C</label>
        </div>
      </label>

      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Jawaban C" id="c" required="">
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <button type="button" class="btn btn-success btn-block" id="tmb_tambah">
        <b>Simpan</b>
      </button>  
    </div>
  </div>
</div>

