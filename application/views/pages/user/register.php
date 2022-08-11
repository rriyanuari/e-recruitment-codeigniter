    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="container">

            <div class="card card-danger">
              <div class="card-header">
                <h4>Daftar Akun</h4>
              </div>

              <div class="card-body">
                <p>
                  Silahkan lengkapi form untuk membuat akun. 
                </p>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input id="username" type="text" class="form-control" name="username" required autofocus>
                </div>

                <div class="form-group">
                  <label for="password" class="control-label">Password</label>
                  <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="divider"></div>

                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" required autofocus>
                </div>

                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select class="form-control" id="jenis_kelamin">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>    
                </div>

                <div class="form-group">
                  <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                  <select class="form-control" id="jenjang_pendidikan">
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA/SMK">SMA/SMK</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                  </select>    
                </div>

                <div class="form-group">
                  <label for="upload_cv">Upload CV (maks 5mb, hanya berformat .pdf)</label>
                  <input type="file" class="form-control-file" id="upload_cv">          
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-danger btn-lg btn-block" id="tmb_register">
                    Daftar
                  </button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>