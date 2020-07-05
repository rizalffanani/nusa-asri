<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log In</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>templateadmin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>templateadmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>templateadmin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<?php if ($t=="log") {?>
<div class="login-box">
  <div class="login-logo">
    <img width="100px" src="<?php echo base_url(); ?>/assets/img/<?= $info->logo_web?>"><br>
    <a style="text-transform: uppercase;" href="<?php echo base_url(); ?>"><b>Halaman Login </b> <?= $info->nama_web?></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?=@$err?></p>

      <form action="<?php echo base_url(); ?>login/process" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" value="<?=@$val->username?>" id="identity" class="form-control" placeholder="id" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value="" id="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-8"></div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <p class="mb-0">
        <a onclick="res()" href="<?= site_url()?>login/regis" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<?php }else{?>
<div class="register-box">
  <div class="register-logo">
    <img width="100px" src="<?php echo base_url(); ?>/assets/img/<?= $info->logo_web?>"><br>
            <a href="#"><b>Register </b>New</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?php echo base_url(); ?>login/daftar" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="<?=@$vals->first_name?>" placeholder="Nama Anda" name="first_name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" value="<?=@$vals->username?>" placeholder="Email" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="number" class="form-control" value="<?=@$vals->nokartuidentitas?>" min="1"; placeholder="No Kartu Identitas" name="nokartuidentitas" required>
            <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-pencil"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="number" class="form-control" value="<?=@$vals->phone?>" placeholder="No Hp" min="1" name="phone" required>
            <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
            </div>
          </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="passretype" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a  onclick="log()" href="<?= site_url()?>login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<?php }?>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>templateadmin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>templateadmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>templateadmin/dist/js/adminlte.min.js"></script>

</body>
</html>
