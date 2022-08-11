<div class="row mt-4">
  <div class="col-md-12">
    <div class="alert alert-danger">
      Sebelum mengerjakan soal perhatikanlah hal hal berikut ini <br> <br>
      1. Berdoalah sebelum mengerkan soal soal ini. <br>
      2. Pastikan anda semua jawaban sudah terisi dengan tepat sebelum menekan selesai. <br>
      3. Anda tidak diperbolehkan meninggalkan ke halaman lain sebelum menyelesaikan soal. <br><br>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header bg-danger text-white">
        <h3>SOAL</h3>
      </div>
      <div class="card-body">
        <?php
        foreach ($soals as $soal) :
        ?>
          <div class="border-bottom py-3">
            <p>
              <?= $soal['nomor'] . '. ' . $soal['soal']; ?>
            </p>
            <input type="hidden" name="kunci_jawaban<?= $soal['id'] ?>" value="<?= $soal['jawaban'] ?>" >
            <div class="form-group row">
              <label class="col-sm-1 col-form-label">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jawaban<?= $soal['id'] ?>" value="a">
                  <label class="form-check-label">A</label>
                </div>
              </label>

              <div class="col-sm-9">
                <p class="form-control"><?= $soal['a'] ?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-1 col-form-label">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jawaban<?= $soal['id'] ?>" value="b">
                  <label class="form-check-label">B</label>
                </div>
              </label>
              <div class="col-sm-9">
                <p class="form-control"><?= $soal['b'] ?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-1 col-form-label">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jawaban<?= $soal['id'] ?>" value="c">
                  <label class="form-check-label">C</label>
                </div>
              </label>
              <div class="col-sm-9">
                <p class="form-control"><?= $soal['c'] ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-lg btn-primary tmb_simpan" id="<?=$id_lamaran;?>">Selesai</button>
      </div>
    </div>
  </div>
</div>