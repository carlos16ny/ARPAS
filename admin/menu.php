<?php 
session_start();
$tituloPagina = "Administrador";
// require_once 'assets/php/login.php';
include_once 'assets/templates/header.php' ?>
<link rel="stylesheet" href="../admin-components/bower_components/fullcalendar/dist/fullcalendar.min.css">
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
                <h3>20</h3>
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
                <h3>20</h3>
                <p id="p2-20">Quartos Vagos</p>
              </div>
              <div class="icon">
                <i class="glyphicon glyphicon-bed"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
  
      <div class="row">
        <section class="col-lg-2"></section>

        <section class="col-lg-8 mt-5">
          <div class="box box-solid bg-aqua-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>
              <h3 class="box-title">Calendário</h3>
            </div>
            <div class="box-body no-padding">
              <div id="calendario" style="width: 100%"></div>
            </div>
          </div>
        </section>

        <section class="col-lg-2"></section>
      </div>
    </section>
<?php include_once 'assets/templates/footer.php' ?>
<!-- fullCalendar -->
<script src="../admin-components/bower_components/moment/moment.js"></script>
<script src="../admin-components/bower_components/fullcalendar/dist/locale/pt-br.js"></script>
<script src="../admin-components/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<script>

$(function(){

  var calendario = $("#calendario").fullCalendar({
    locale: 'pt-br',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Dia'
        },

    dayClick: function (date, jsEvent, view) {
      var data = (($(this)).attr('data-date'));
      console.log(data);
    },
})

});

</script>