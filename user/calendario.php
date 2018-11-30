<?php 
include 'assets/protection.php';
$tituloPagina = 'Reservas';
include 'assets/templates/header.php';
// require_once 'assets/controllerAgendamento.php';
?>

<link rel="stylesheet" href="../admin-components/bower_components/fullcalendar/dist/fullcalendar.min.css">
<link rel="stylesheet" href="../admin-components/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
<link rel="stylesheet" href="../admin-components/bower_components/bootstrap-daterangepicker/daterangepicker.css">


<section class="content-header">
    <h1>
    Reservas
    <small>| Consulta</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Reservas</li>
    </ol>
</section>
<section>
  <div class="row" style="display: none; margin-top: 3em" id="row_alert">
    <div class="container ">
      <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i>Que pena  =(</h4>
            Infelizmente não encontramos um quarto unico para o espaço de tempo requerido, 
            tente selecionar por dia clicando no calendário.
          </div>
      </div>
    </div>
  </div>

</section>

<section>
    <div class="row">
        <div class="col-md-3 col-sm-1"></div>    
        <div class="col-md-6 col-sm-10">
            <div class="box-body">
                <form action="getAvaliableDays.php" method="POST">
                    <div class="form-group">
                        <label>Intervalo de Estadia:</label>

                        <div class="input-group mb-2">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="range-date" id="reservation">
                        </div>

                        <button type="submit" class="btn mt-2 btn-sm btn-success" name="range" id="btn-buscar">Pesquisar</button>
                    <!-- /.input group -->
                    </div>
                </form>
            </div>    
        </div>    
        <div class="col-md-3 col-sm-1"></div> 
    </div>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Resumo</h3>
            </div>
            <div class="box-body">

              <table class="table table-bordered mt-2">
                <thead>
                  <th>Quarto</th>
                  <th>Dia</th>
                  <th>Deletar</th>
                </thead>
                <tbody id="resumo">

                </tbody>
              </table>
          
              <!-- /btn-group -->
              <div class="input-group">

                <div class="input-group-btn">
                  <button id="concluir" type="button" class="btn mt-4 btn-primary btn-flat">Concluir</button>
                </div>
                <!-- /btn-group -->
              </div>
              <!-- /input-group -->
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

</div>
  <!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        A.R.P.A.S.
    </div>
    <strong>Sistema de Reservas | </strong> Todos Direitos Reservados
</footer>

<script src="../admin-components/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../admin-components/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../admin-components/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="../admin-components/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../admin-components/bower_components/fastclick/lib/fastclick.js"></script>
<script src="../admin-components/dist/js/adminlte.min.js"></script>
<script src="../admin-components/dist/js/demo.js"></script>
<!-- fullCalendar -->
<script src="../admin-components/bower_components/moment/moment.js"></script>
<script src="../admin-components/bower_components/fullcalendar/dist/locale/pt-br.js"></script>
<script src="../admin-components/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- datepicker range -->
<script src="../admin-components/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- <script src="../admin-components/bower_components/moment/min/moment.min.js"></script> -->
<script src="../admin-components/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootbox -->
<script src="../assets/js/bootbox.min.js"></script>


<!-- personal js reservas -->
<script src="assets/js/reservas.js"></script>

</body>
</html>