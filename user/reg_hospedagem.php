<?php 
session_start();
include 'assets/protection.php';
$tituloPagina = 'Registro Hospedagem';
include 'assets/templates/header.php';
$user_id = $_SESSION['id_user'];
require_once '../assets/php/classes/classHosted.php';
require_once 'assets/controllerAgendamento.php';

?>

<section class="content-header">
    <h1>
    Registro
    <small>Hospedagem</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="menu.php"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Hospedagem</li>
    </ol>
</section>


<section class="mt-5">
<div class="mt-5 container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Registo de Hospedagem</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Quarto</th>
                  <th>Data</th>
                  <th>Status</th>
                  <th>Valor</th>
                  <th>Pagar</th>
                  <th>Cancelar</th>
                </tr>
                <?php foreach($result as $res) { 
                    $d = DateTime::CreateFromFormat('Y-m-d', $res->check_in);    
                ?>
                    <tr>
                        <td><?=$res->id?></td>
                        <td><?=$res->room_num?></td>
                        <td><?=$d->format('d/m/Y')?></td>
                        <?php if($res->status == 1) {
                            echo '<td><span class="label label-primary">Reservado</span></td>';
                        }else if ($res->status == 2){
                            echo '<td><span class="label label-success">Pago</span></td>';
                        }else if($res->status == 3) {
                            echo '<td><span class="label label-danger">Cancelado</span></td>';
                        }?>
                        <td>R$ <?=$res->total?></td>
                        <?php if($res->status == 1) { ?>
                             <td><input type="checkbox" onchange="selectInput(this)" value=<?=$res->id?>></td>
                        <?php } else { ?>
                            <td><input type="checkbox" disabled></td>
                        <?php } ?>
                        
                        <?php if($res->status == 1) { ?>
                            <form action="reg_hospedagem.php" method="post">
                                <td><button type="submit" name="cancel_res" class="btn btn-danger">Cancelar Reserva</button></td>
                                <input type="hidden" name="id_res" value="<?=$res->id?>">
                            </form>
                        <?php } else { ?>
                            <td><button type="button" disabled class="btn btn-danger">Cancelar Reserva</button></td>
                        <?php } ?>
                        
                    </tr>
                <?php } ?>
              </table>
              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate" style="align-items : center">
                  <ul class="pagination" style="margin-left: 3rem">
                        <?php 
                        for($i=1 ; $i<=$pages; $i++){
                            if($i == $page){
                                echo '
                                    <li class="paginate_button active">
                                        <a href="reg_hospedagem.php?page='.$i.'" tabindex="0" role="buttom">'.$i.'</a>
                                    <li>
                                ';
                            }else{
                                echo '
                                    <li class="paginate_button">
                                        <a href="reg_hospedagem.php?page='.$i.'" tabindex="0" role="buttom">'.$i.'</a>
                                    <li>
                                ';
                            }
                        }
                        
                        ?>
                     </ul>
                </div>
                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Resumo Pagamento</h3>
            </div>
            <div class="box-body">

            <div class="box box-default collapsed-box">

                <div class="box-header with-border">
                    <a class="btn btn-app" onclick="alert('deu o clique')">
                        <span class="badge bg-green" id="numero_pagamento">0</span>
                        <i class="fa fa-barcode"></i>Pagar
                    </a>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Quarto</th>
                        <th>Dia</th>
                        <th>Valor</th>
                        <th>Deletar</th>
                    </thead>
                    <tbody id="resumo">

                    </tbody>
                    <thead>
                        <th></th>
                        <th></th>
                        <th>Total</th>
                        <th id="total_pag"></th>
                        <th></th>
                    </thead>
                </table>
                </div>
            <!-- /.box-body -->
            </div>
        </div>
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
<script src="./assets/js/controllerHospedagem.js"></script>
<script>
</script>
</body>
</html>