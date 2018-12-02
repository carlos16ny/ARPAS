<?php
session_start();
$tituloPagina = "Quartos Vagos";
require_once 'assets/php/quartosVagosController.php';
require_once 'assets/templates/header.php';
?>

<section class="content-header">
    <h1>
    Quartos
    <small>| Vagos</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Quartos Vagos</li>
    </ol>
</section>

<section class="content">
     <div class="container">
        <div class="row mt-4">
            <?php foreach($result as $r) { ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">Quarto <?=$r->room_num?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        </div>
                        <div class="box-body">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-bed pt-4"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Livre</span>
                                    <button type="button" id="room-<?=$r->id?>-<?=$r->price?>" alt="<?=$r->room_num?>" class="btn btn-danger reservar mt-2">Reservar</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <?php } ?>
</section>

<div class="modal fade" id="modal-reserva">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"></h4>
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
                        <form action="quartos_vagos.php" method="post">
                            <div class="form-group">
                                <label>Usuário</label>
                                <select class="form-control" name="user_id">
                                    <?php foreach($users as $u) { ?>
                                        <option value="<?=$u->id?>"><?=$u->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="data" value="<?=$data?>">
                                <input type="hidden" name="price" id="priceroom">
                                <input type="hidden" name="id_room" id="idroom">
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
                        <form action="quartos_vagos.php" method="post">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="cadastrar" class="btn btn-primary">Cadastar</button>
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

    $(".reservar").click((event)=>{
        event.preventDefault();
        room_num = $(event.currentTarget).attr("alt");
        id_room = event.currentTarget.id.split("-")[1];
        modal = $("#modal-reserva");
        modal.find('.modal-title')[0].innerHTML = ("Reserva do Quarto " + room_num );
        $("#idroom").val(id_room);
        $("#priceroom").val(event.currentTarget.id.split("-")[2]);
        modal.modal();
    });

</script>