    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

            <div class="card card-danger">
              <div class="card-header">
                <h4>Login</h4>
              </div>

              <div class="card-body">
                <p>
                  Silahkan lengkapi form untuk masuk ke akun anda 
                </p>
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="usename">Username</label>
                    <input id="usename" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Username tidak boleh kosong
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Password tidak boleh kosong
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4" id="tmb-login">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>