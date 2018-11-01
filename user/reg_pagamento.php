<?php 
session_start();
$tituloPagina = 'Registro Pagamento';
include 'assets/templates/header.php';
$user_id = $_SESSION['id_user'];
require_once '../assets/php/classes/classHosted.php';
require_once 'assets/controllerRegistros.php';
?>
<link rel="stylesheet" href="../admin-components/bower_components/bootstrap-daterangepicker/daterangepicker.css">

<section>
    <div class="row">
        <div class="col-md-3 col-sm-1"></div>    
        <div class="col-md-6 col-sm-10">
            <div class="box-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Intervalo de Consulta:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="range-date" id="reservation">
                        </div>

                        <button type="submit" class="btn ml-auto btn-sm btn-success" name="search_pag">Pesquisar</button>
                    <!-- /.input group -->
                    </div>
                </form>
            </div>    
        </div>    
        <div class="col-md-3 col-sm-1"></div> 
    </div>

</section>

<section>

<div class="container-fluid container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Reservas Pagas</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Quarto</th>
                  <th>Data</th>
                  <th>Status</th>
                </tr>
                <?php foreach($result as $res) {
                    if ($res->status == 2){ ?>
                    <tr>
                        <td><?=$res->id?></td>
                        <td><?=$res->room_num?></td>
                        <td><?=$res->check_in?></td>
                        <td><span class="label label-success">Pago</span></td>
                    </tr>
                    <?php } } ?>                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>
</section>


<!-- /Wrapper -->
</div> 

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
<!-- datepicker range -->
<script src="../admin-components/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="../admin-components/bower_components/moment/min/moment.min.js"></script>
<script src="../admin-components/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<script>

    $('#reservation').daterangepicker({
        "locale": {
            "format": 'DD/MM/YYYY',
            "separator": " - ",
            "applyLabel": "Aplicar",
            "applyName" : "search",
            "cancelLabel": "Cancelar",
            "fromLabel": "From",
            "toLabel": "To",
            "weekLabel": "Sem",
            "daysOfWeek": [
                'Dom',
                'Seg',
                'Ter',
                'Qua',
                'Qui',
                'Sex',
                'Sáb'
            ],
            "monthNames": [
                'Janeiro',
                'Fevereiro',
                'Março',
                'Abril',
                'Maio',
                'Junho',
                'Julho',
                'Agosto',
                'Setembro',
                'Outubro',
                'Novembro',
                'Dezembro'
            ]
        }
    });

</script>
</body>
</html>