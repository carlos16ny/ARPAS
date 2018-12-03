<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once 'assets/php/detalheController.php';
require_once 'assets/templates/header.php';
?>

<section class="content-header">
    <h1>
    Detalhe Reserva
    </h1>
    <ol class="breadcrumb">
    <li><a href="menu.php"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class=""><a href="calendario.php">Calendário</a></li>
    <li class="active">Detalhe Reserva</li>
    </ol>
</section>

<section class="text-center my-4">
    <h1><strong>
        <?php
            $d = DateTime::createFromFormat('Y-m-d', $data);
            echo($d->format('d/m/Y'));
        ?>
    </strong></h1>
</section>

<section class="content">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-2 col-sm-1"></div>
            <div class="col-md-8 col-sm-10">    
                <?php if(isset($resultReserva)) { ?>
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                        <h3 class="widget-user-username">Quarto <?=$resultReserva->room_num?></h3>
                        <h5 class="widget-user-username"><?=$resultReserva->name ?></h5>
                        </div>
                        <div class="widget-user-image">
                        <img class="img-circle" src="<?=$resultReserva->foto?>" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-6 border-right">
                            <div class="description-block">
                                <form action="reserva_detalhe.php?id_res=<?=$id_res?>" method="post">
                                    <?php if($resultReserva->status == 1) { ?>
                                        <button class="btn btn-danger btn-lg" type="submit" name="cancelar">Cancelar Reserva</button>
                                    <?php } else { ?>
                                        <button class="btn btn-success btn-lg" disabled>Cancelar Reserva</button>
                                    <?php } ?>
                                </form>
                            </div>
                            </div>
                            <div class="col-sm-6 border-right">
                            <div class="description-block">
                                <form action="reserva_detalhe.php?id_res=<?=$id_res?>" method="post">
                                    <?php if($resultReserva->status == 1) { ?>
                                        <button class="btn btn-primary btn-lg" type="submit" name="pagar">Pagar</button>
                                    <?php } else { ?>
                                        <button class="btn btn-success btn-lg" disabled>PAGO</button>
                                    <?php } ?>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php } elseif(isset($room_num)) { ?>
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                        <h3 class="widget-user-username">Quarto <?=$room_num?></h3>
                        <h5 class="widget-user-username">VAGO</h5>
                        </div>
                        <div class="widget-user-image">
                        <img class="img-circle" src="../assets/images/faces/avatar.png" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-6 border-right">
                            <div class="description-block">
                                <form method="post">
                                    <button class="btn btn-danger btn-lg" id="enviar-reserva" >Reservar</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-2 col-sm-1"></div>
        </div>
    </div>
</section>



<div class="modal fade" id="modal-reserva">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">
                    Reserva do Quarto <?=$room_num?> ( <?=$d->format('d/m/Y')?> )
                </h4>
            </div>
            <div class="modal-body">
                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Usuários Cadastrados</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="reserva_detalhe.php?id_room=<?=$id_room?>&data=<?=$data?>" method="post">
                            <div class="form-group">
                                <label>Usuário</label>
                                <select class="form-control" name="user_id">
                                    <?php foreach($users as $u) { ?>
                                        <option value="<?=$u->id?>"><?=$u->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="reservar" class="btn btn-primary">Reservar</button>
                            </div>
                        </form>
                    </div>
                </div>

                
                <div class="box box-default box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastro de novos usuários</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="box-body" style="display: none;">
                        <form action="reserva_detalhe.php?id_room=<?=$id_room?>&data=<?=$data?>" method="post">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="cadastro" id="cadastro-user" class="btn btn-primary">Cadastar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Reservar</button>
            </div>
        </div>
    </div>
</div>




<?php
require_once 'assets/templates/footer.php';
?>


<script>

$("#enviar-reserva").click(event=>{
    event.preventDefault();
    $('#modal-reserva').modal();
});

// $('#cadastro-user').click(event=>{
//     event.preventDefault();
// });

</script>
