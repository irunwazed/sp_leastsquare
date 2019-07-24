<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assetslog/images/logo.png"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assetslog/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assetslog/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assetslog/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assetslog/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assetslog/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<script type="text/javascript">
  
  function cekform(){
    if(!$("#username").val())
    {
      alert('Maaf Username Tidak Boleh Kosong');
      $("#username").focus();
      return false;
    }
    if(!$("#password").val())
    {
      alert('Maaf Password Tidak Boleh Kosong');
      $("#password").focus();
      return false;
    }
  }

</script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url();?>assetslog/images/login.png" height="100px">
    <br><a><b>Halaman Login</b></a></br>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Masukkan Username dan Password</p>

    <form method="POST" action="<?php echo base_url();?>index.php/login/getlogin" onsubmit= "return cekform();">
      <div class="form-group has-feedback">
      <input type="text" name="username" id="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
       </div> 
      <div>
        <select class="form-control" name="id_user_kategori" required>
              <option>-- Pilih Kategori --</option>
              <option value="1">Administrator</option>
              <option value="2">Operator</option>
        </select>
      </div>
      <p></p>
      <div class="alert-danger">
        <center>
          <?php 
             $info = $this->session->flashdata('info');
              if(!empty($info))
              {
                 echo $info;
              }
          ?>    
        </center>
      </div>
        <p></p>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i>  Login
          </button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assetslog/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assetslog/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>/assetslog/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
