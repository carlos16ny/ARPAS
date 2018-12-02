<?php 
session_start();
$tituloPagina = "Administrador";
include_once 'assets/templates/header.php';
include_once 'assets/php/listagemQuartos.php';

?>
<!-- ********************************************************
  *                                                      *
              Conteudo sem Side bar
  *                                                      *
  ******************************************************** -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Painel de Controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-6">
          <a href="./quartos_ocupados.php">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?=$quartos_ocupados?></h3>
                <p id="p1-20">Quartos Ocupados</p>
              </div>
              <div class="icon">
                <i class="ion-ios-bookmarks"></i>
              </div>
            </div>
          </a>
        </div>

        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <a href="./quartos_vagos.php">
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?=$quartos_vagos?></h3>
                <p id="p2-20">Quartos Vagos</p>
              </div>
              <div class="icon">
                <i class="glyphicon glyphicon-bed"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
  
      
    </section>
<?php include_once 'assets/templates/footer.php' ?>