<?php
session_start();
require_once 'facebookAuth.php';
require_once 'assets/loginController.php';

if(isset($_SESSION['email_user']) && isset($_SESSION['nome_user'])){
    header('Location: menu.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Usuário</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../admin-components/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../admin-components/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../admin-components/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../admin-components/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../admin-components/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../index.php">A.R.P.A.S.</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login Usuário</p>

    <form method="post" action="index.php">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="senha" placeholder="Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OU -</p>
      <a href=<?=$loginUrl?> class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Login com 
        Facebook</a>
    
    </div>

    
    <a href="register.php" class="text-center">Registro de novo membro</a>
    <br>
    <a href="forgetPass.php">Esqueci minha senha</a><br>

  </div>
</div>

<script src="../admin-components/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../admin-components/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../admin-components/plugins/iCheck/icheck.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>


</body>
</html>


