  <section class="py-3 container">
        <h1 class="fw-light text-center">Detail Akun</h1>
        <p class="lead text-muted">
          <!-- Daftar lamaran yang sudah dikirim. -->
        </p>

        <div class="container mt-5">
        <div class="row">
          <div class="container">

            <div class="card card-danger">
              <div class="card-body">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input id="username" type="text" class="form-control" name="username" value="<?= $pelamar['username'] ?>" required autofocus>
                </div>

                <div class="form-group">
                  <label for="password" class="control-label">Password</label>
                  <input id="password" type="password" class="form-control" name="password" value="<?= $pelamar['password'] ?>" required>
                </div>

                <div class="divider"></div>

                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="<?= $pelamar['nama_lengkap'] ?>" required autofocus>
                </div>

                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select class="form-control" id="jenis_kelamin">
                    <option <?= ($pelamar['jenis_kelamin']=='Laki-Laki') ? 'selected' : '' ?> value="Laki-Laki">Laki-Laki</option>
                    <option <?= ($pelamar['jenis_kelamin']=='Perempuan') ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                  </select>    
                </div>

                <div class="form-group">
                  <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                  <select class="form-control" id="jenjang_pendidikan">
                    <option <?= ($pelamar['jenjang_pendidikan']=='SD') ? 'selected' : ''?> value="SD">SD</option>
                    <option <?= ($pelamar['jenjang_pendidikan']=='SMP') ? 'selected' : ''?> value="SMP">SMP</option>
                    <option <?= ($pelamar['jenjang_pendidikan']=='SMA/SMK') ? 'selected' : ''?> value="SMA/SMK">SMA/SMK</option>
                    <option <?= ($pelamar['jenjang_pendidikan']=='D3') ? 'selected' : ''?> value="D3">D3</option>
                    <option <?= ($pelamar['jenjang_pendidikan']=='S1') ? 'selected' : ''?> value="S1">S1</option>
                  </select>    
                </div>

                <div class="form-group">
                  <label>CV terupload</label>
                  <div class="d-flex align-items-center">
                    <div class="mr-3"><?= $pelamar['cv'] ?></div>
                    <a href="lihat-cv/<?= $pelamar['cv'] ?>" class="btn btn-sm has-icon bg-primary text-white">
                      <i class="fas fa-eye"></i> Lihat CV
                    </a>
                  </div>
                </div>

                <div class="form-group">
                  <label for="upload_cv">Upload CV Baru</label>
                  <input type="file" class="form-control-file" id="upload_cv" value="<?= $pelamar['cv'] ?>">          
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-danger btn-lg btn-block tmb_edit_pelamar" id="<?= $pelamar['id'] ?>">
                    Ubah data profil
                  </button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- /.Data Table -->

