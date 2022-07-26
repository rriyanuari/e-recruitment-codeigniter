<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Temon Futsal Club | Log in</title>

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
<body class="hold-transition login-page">
<div class="login-box">
<!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?=base_url('');?>" class="h1">Temon Futsal</a>
        </div>

        <div class="card-body login-card-body">
            <div class="text-center mb-3">
                <img src="<?=base_url('public/')?>img/logo.jpeg" class="image img-circle elevation-2" style="max-width:150px">
            </div>
            <p class="login-box-msg">Silahkan Login</p>

            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-outline-primary btn-block" id="tmb-login">Log In</button>
                </div>
            </div>
            <br />
            <p class="text-center">belum punya akun ?</p> 
            
            <div class="row">
                <div class="col-md-12">
                    <a href="<?=base_url('register');?>" class="text-center text-primary">
                        <button class="btn btn-outline-primary btn-block">Daftar Akun</button>
                    </a>
                </div>
            </div>
            
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

  <script src="<?=base_url('public/');?>plugins/jquery/jquery.min.js"></script>
  <script src="<?=base_url('public/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url('public/');?>dist/js/adminlte.min.js"></script>

</body>
</html>
