<?php
session_start();
require 'assets/protection.php';
include_once 'assets/profileController.php';
$tituloPagina = "Perfil de Usuário";
include_once 'assets/templates/header.php';
?>

<section class="content">
    <section class="content-header">
        <h1>
            Perfil
            <small>Usuário</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="menu.php"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Perfil</li>
        </ol>
    </section>
    <section class="mt-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-yellow">
                        <div class="widget-user-image">
                            <img class="img-circle" src="<?=$foto?>" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username"><?=$user->name?></h3>
                        <h5 class="widget-user-desc"><?=$user->email?></h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a data-toggle="modal" href="#modal-nome" >Mudar Nome</a></li>
                            <li><a data-toggle="modal" href="#modal-senha" >Mudar Senha</a></li>
                            <li><a data-toggle="modal" href="#modal-email" >Mudar Email</a></li>
                            <li><a data-toggle="modal" href="#modal-foto" >Mudar Foto </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </section>

<!-- Modais de Edicao de Informacoes -->

<div class="modal  fade" id="modal-nome">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar Nome</h4>
            </div>
            <div class="modal-body">
                <div class="box box-info">
                    <div class="box-header with-border"><div>
                    <form class="form-horizontal" method="post" action="profile.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nome" placeholder="Nome">
                                    <input type="hidden" name="editar">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button type="submit" name="editNome" class="btn btn-info pull-right">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<div class="modal fade" id="modal-senha">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar Senha</h4>
            </div>
            <div class="modal-body">
                <div class="box box-info">
                    <div class="box-header with-border"><div>
                    <form class="form-horizontal" method="post" action="profile.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Senha</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="senha" placeholder="Senha">
                                    <input type="hidden" name="editar">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button type="submit" name="editSenha" class="btn btn-info pull-right">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="modal-email">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar Email</h4>
            </div>
            <div class="modal-body">
                <div class="box box-info">
                    <div class="box-header with-border"><div>
                    <form class="form-horizontal" method="post" action="profile.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                    <input type="hidden" name="editar">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button type="submit" name="editEmail" class="btn btn-info pull-right">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="modal-foto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar Foto</h4>
            </div>
            <div class="modal-body">
                <div class="box box-info">
                    <div class="box-header with-border"><div>
                    <form class="form-horizontal" method="post" action="profile.php" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Foto Usuário</label>
                                        <input type="file" name="foto">
                                        <input type="hidden" name="editar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button type="submit" name="editFoto" class="btn btn-info pull-right">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</section>


<?php
include_once 'assets/templates/footer.php';
?>

