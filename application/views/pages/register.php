<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Temon Futsal Club | Daftar</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?=base_url('public/');?>plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="<?=base_url('public/');?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url('public/');?>dist/css/adminlte.min.css">
<!-- <style>
    body {
        background-image: url("<?=base_url('public/')?>img/lapangan/lapangan1-matras (2).jpeg");
        background-size: cover;
        background-position: center;
        }
</style> -->
</head>
<body class="hold-transition">
<div class="row justify-content-center py-5">
  <div class="col-md-6">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?=base_url('');?>" class="h1">Temon Futsal</a>
        </div>

        <div class="card-body login-card-body">
          <h3 class="login-box-msg">Daftar Akun</h3>
          <p class="login-box-msg">Silahkan isi form di bawah ini</p>

          <?= form_open('login'); ?>
          <form>
              <div class="form-group mb-3">
                <label for="">Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username">
              </div>

              <div class="form-group mb-3">
              <label for="">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
              </div>

              <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="text" class="form-control" placeholder="Email" name="email">
              </div>

              <div class="form-group mb-3">
                <label for="">No Telp</label>
                <input type="number" class="form-control" placeholder="No Telp" name="hp">
              </div>

              <label for="jeniskelamin">Jenis Kelamin</label>
              <select class="" id="jeniskelamin">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>            

              <br><br>

              <button type="submit" class="btn btn-outline-primary btn-block" id="tmb_tambah_pelanggan">Daftar Akun</button>
          </form>
          <?= form_close(); ?>
        </div>
        <!-- /.login-card-body -->
    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('public/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('public/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('public/');?>dist/js/adminlte.min.js"></script>
</body>
</html>
