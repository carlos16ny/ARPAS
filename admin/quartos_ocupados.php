<?php
session_start();
$tituloPagina = "Quartos Ocupados";
require_once 'assets/php/quartosOcupadosController.php';
require_once 'assets/templates/header.php';
?>

<section class="content-header">
    <h1>
    Quartos
    <small>| Ocupados</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Quartos Ocupados</li>
    </ol>
</section>

<section class="content">
    <div class="container">
        <div class="row mt-4">
            <?php foreach($result as $r) { ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                        <h3 class="box-title">Quarto <?=$r->room_num?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        </div>
                        <div class="box-body">
                            <div class="info-box">
                                <span class="info-box-icon <?php echo ($r->hosted_status == 1 ? 'bg-aqua' : 'bg-green') ?>"><i class="glyphicon glyphicon-bed pt-4"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Reservado a:</span>
                                    <span class="info-box-number"><?=$r->name?></span>
                                </div>
                            </div>
                            <form action="quartos_ocupados.php" method="post">
                                <input type="hidden" name="id_host" value="<?=$r->hosted_id?>">
                                <button type="submit" name="cancelar" class="btn btn-danger">Cancelar Reserva</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php
require_once 'assets/templates/footer.php';
?>