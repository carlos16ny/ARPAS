<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$tituloPagina?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../admin-components/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../admin-components/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../admin-components/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../admin-components/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../admin-components/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../admin-components/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../admin-components/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../admin-components/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../admin-components/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
    <a href="menu.php" class="logo">
      <span class="logo-mini"><b>A.</b>S.</span>
      <span class="logo-lg"><b></b>A.R.P.A.S.</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- ********************************* -->
          <!--           Ajustar com o db        -->
          <!-- ********************************* -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/images/igreja/ARPAS-LOGO.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$_SESSION['admin_nome']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- imagem do db -->
                <img src="../assets/images/igreja/ARPAS-LOGO.png" class="img-circle" alt="User Image">  
                <p>

                  <?=$_SESSION['admin_nome']?>

                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="assets/php/logout.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
</header>

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i><span>Registros</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="quartos_ocupados.php"><i class="fa fa-circle-o"></i>Quartos Reservados</a></li>
          <li><a href="quartos_vagos.php"><i class="fa fa-circle-o"></i>Quartos Livres</a></li>
          <li><a href="registros.php"><i class="fa fa-circle-o"></i>Registros</a></li>
        </ul>
      </li>
      <li class="menu-texto">
        <a href="calendario.php">
          <i class="fa fa-calendar"></i> <span>Calendário</span>
        </a>
      </li>
      <li class="menu-texto">
        <a href="" onclick="alert('Função não disponível')">
          <i class="fa fa-envelope"></i> <span>Menssagens</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<div class="content-wrapper">