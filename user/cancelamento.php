<?php 
include 'assets/protection.php';
$tituloPagina = 'Registro Hospedagem';
include 'assets/templates/header.php';
$user_id = $_SESSION['id_user'];
require_once '../assets/php/classes/classHosted.php';
require_once 'assets/controllerCancelamento.php';

?>
<?php if(isset($result_operation)){ ?>
<?php   if($result_operation == 1){?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i>Cancelamento!</h4>
        O Cancelamento de Reserva foi efetuado com sucesso !
    </div>
<?php   } else if($result_operation == 0){?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i>Cancelamento!</h4>
        O Cancelamento não pode ser efetuado, tente novamente !
    </div>
<?php   }?>

<?php } ?>

<section class="content-header">
    <h1>
    Registro
    <small>Hospedagem - Cancelamento</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="menu.php"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Cancelamento</li>
    </ol>
</section>


<section class="mt-5">
    <div class="mt-5 container">
        <div class="row">
            <?php forEach($result as $res) { 
                $d = DateTime::CreateFromFormat('Y-m-d', $res->check_in);
                ?>
                <div class="col-md-3 col-sm-6 col-xs-12 my-2">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><?=$d->format('d/m/Y')?></span>
                            <span class="info-box-number">Quarto <?=$res->room_num?></span>
                            <form action="cancelamento.php?page=<?=$page?>" method="post">
                                <span><button type="submit" name="cancelar" class="btn btn-danger my-1 btn-flat">Cancelar</button></span>
                                <input type="hidden" name="id_res" value="<?=$res->id?>">
                            </form>
                            
                        </div>
                <!-- /.info-box-content -->
                    </div>
                <!-- /.info-box -->
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <ul class="pagination" style="margin-left: 3rem">
                <?php 
                for($i=1 ; $i<=$pages; $i++){
                    if($i == $page){
                        echo '
                            <li class="paginate_button active">
                                <a href="cancelamento.php?page='.$i.'" tabindex="0" role="buttom">'.$i.'</a>
                            <li>
                        ';
                    }else{
                        echo '
                            <li class="paginate_button">
                                <a href="cancelamento.php?page='.$i.'" tabindex="0" role="buttom">'.$i.'</a>
                            <li>
                        ';
                    }
                }
                ?>
            </ul>
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