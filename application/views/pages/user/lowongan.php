  <section class="py-3 text-center container">
        <h1 class="fw-light">Daftar Lowongan</h1>
        <p class="lead text-muted">
          Lowongan yang tersedia, silahkan lamar lowongan sesuai dengan kualifikasi anda.
        </p>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row card-group">
        <?php
          $no = 1;
          foreach($lowongans as $lowongan):
          ?>
          <div class="card shadow-sm col col-sm-12 col-md-6 col-lg-6 m-5">
            <div class="card-body">
              <h5 class="card-title"><?= $lowongan['judul']; ?></h5>
              <p class="card-text">
                kualifikasi :
                <?= $lowongan['deskripsi']; ?>
              </p>
            </div>
            <div class="card-footer d-flex justify-content-end align-items-center">
              <a href="<?= base_url('lamar-lowongan/'.$lowongan['id']); ?>">
                <button type="button" class="btn ml-3 btn-success">Lamar</button>
              </a> 
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
