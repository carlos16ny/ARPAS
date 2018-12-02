<?php 
  
  if(!isset($_SESSION['foto']) || $_SESSION['foto']==NULL){ 
    $foto = "../assets/images/faces/avatar.png";
  }else {
    $foto = $_SESSION['foto'];
  }
?>

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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
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
              <img src="<?=$foto?>" class="user-image foto-user" alt="User Image">
              <span class="hidden-xs"><?=$_SESSION['nome_user']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- imagem do db -->
                <img src="<?=$foto?>" class="img-circle foto-user" alt="User Image">  
                <p>

                  <?=$_SESSION['nome_user']?>

                  <small><?=$_SESSION['email_user']?></small>
                </p>
              </li>
      
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="assets/logout.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!--             Ajuste com db                       -->

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=$foto?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['nome_user']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Sistema de Reservas</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Registros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="reg_hospedagem.php"><i class="fa fa-circle-o"></i>Hospedagens</a></li>
            <li><a href="reg_pagamento.php"><i class="fa fa-circle-o"></i>Pagamentos</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Reservas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="calendario.php" ><i class="fa fa-circle-o"></i>Verificar Quartos</a></li>
            <li><a href="cancelamento.php" ><i class="fa fa-circle-o"></i>Cancelar Reservas</a></li>
          </ul>
        </li>

        <li>
          <a href="mensagens.php" onclick="event.preventDefault();
                                           alert('Função indisponivel no momento !');">
            <i class="fa fa-envelope"></i><span>Mensagens</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>

  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  