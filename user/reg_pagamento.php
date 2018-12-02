<?php 
session_start();
include 'assets/protection.php';
$tituloPagina = 'Registro Pagamento';
include 'assets/templates/header.php';
$user_id = $_SESSION['id_user'];
require_once '../assets/php/classes/classHosted.php';
require_once 'assets/controllerRegistrosPagos.php';
?>


<section class="content-header">
    <h1>
    Registro
    <small>Pagamentos</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="menu.php"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Pagamentos</li>
    </ol>
</section>

<section class="mt-5">

<div class="mt-5 container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Reservas Pagas</h3>
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
                    <?php } 
                } ?>                
              </table>
              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate" style="align-items : center">
                  <ul class="pagination" style="margin-left: 3rem">
                        <?php 
                        for($i=1 ; $i<=$pages; $i++){
                            if($i == $page){
                                echo '
                                    <li class="paginate_button active">
                                        <a href="reg_pagamento.php?page='.$i.'" tabindex="0" role="buttom">'.$i.'</a>
                                    <li>
                                ';
                            }else{
                                echo '
                                    <li class="paginate_button">
                                        <a href="reg_pagamento.php?page='.$i.'" tabindex="0" role="buttom">'.$i.'</a>
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
</script>
</body>
</html>