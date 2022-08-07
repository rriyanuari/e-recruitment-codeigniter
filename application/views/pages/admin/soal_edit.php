<div class="row">
  <div class="col-md-12">
    <div class="form-group row">
      <label class="col-form-label col-12 col-md-2 col-lg-2" for="nomor">Nomor</label>
      <div class="col-sm-12 col-md-10">
        <input type="number" class="form-control" id="nomor" value="<?=$soal['nomor'];?>">
      </div> 
    </div>
    <div class="form-group row mb-4">
      <label class="col-form-label col-12 col-md-2 col-lg-2">Pertanyaan</label>
      <div class="col-sm-12 col-md-10">
        <input type="text" class="form-control" id="pertanyaan" value="<?=$soal['soal'];?>">
      </div> 
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jawaban" value="a" <?=($soal['jawaban'] == 'a') ? 'checked' : '' ?>>
            <label class="form-check-label">A</label>
        </div>
      </label>

      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Jawaban A" id="a" required="" value="<?=$soal['a'];?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jawaban" value="b" <?=($soal['jawaban'] == 'b') ? 'checked' : '' ?>>
            <label class="form-check-label">B</label>
        </div>
      </label>

      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Jawaban B" id="b" required="" value="<?=$soal['b'];?>"> 
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jawaban" value="c" <?=($soal['jawaban'] == 'c') ? 'checked' : '' ?>>
            <label class="form-check-label">C</label>
        </div>
      </label>

      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Jawaban C" id="c" required="" value="<?=$soal['c'];?>">
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <button type="button" class="btn btn-success btn-block tmb_edit" id="<?=$soal['id']?>">
        <b>Simpan</b>
      </button>  
    </div>
  </div>
</div>

