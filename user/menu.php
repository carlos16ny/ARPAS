<?php 
session_start();
$tituloPagina = 'Usuário';
include 'assets/templates/header.php' 
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>Reservar</h3>
                <p style="visibility: hidden">i</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-plus"></i>
            </div>
            <a href="calendario.php" class="small-box-footer">Reservar Quarto  <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
        <div class="inner">
            <h3>Registros</h3>

            <p style="visibility: hidden">i</p>
        </div>
        <div class="icon">
            <i class="fas fa-book-open"></i>
        </div>
        <a href="reg_hospedagem.php" class="small-box-footer">Meus Registros  <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
        <div class="inner">
            <h3>Mensagens</h3>
            <p style="visibility: hidden">i</p>
        </div>
        <div class="icon">
            <i class="fas fa-comments"></i>
        </div>
        <a href="mensagens.php" class="small-box-footer">Verificar Mensagens  <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
        <div class="inner">
            <h3>Cancelar</h3>

            <p style="visibility: hidden">i</p>
        </div>
        <div class="icon">
            <i class="fas fa-ban"></i>
        </div>
        <a href="cancelamento.php" class="small-box-footer">Cancelar Reservas  <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    </div>
</section>



<?php include 'assets/templates/footer.php' ?>