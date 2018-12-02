<?php
session_start();
$tituloPagina = "Calendário";
require_once 'assets/php/calendarioController.php';
require_once 'assets/templates/header.php';
?>
<link rel="stylesheet" href="../admin-components/bower_components/fullcalendar/dist/fullcalendar.min.css">


<section class="content-header">
    <h1>
    Reservas
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Celendario</li>
    </ol>
</section>

<section class="content">
    
    <div class="row mt-5">
        <section class="col-lg-5 ">
          <div class="box box-solid bg-aqua-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>
              <h3 class="box-title">Calendário</h3>
            </div>
            <div class="box-body no-padding">
              <div id="calendario" style="width: 100%"></div>
            </div>
          </div>
        </section>

        <section class="col-lg-7">
            <div class="row">
                <?php foreach($result as $r) {
                        if($r->hosted_id != NULL){
                    ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="small-box <?php echo($r->hosted_status == 1 ? 'bg-aqua' : 'bg-green')?>">
                                <div class="inner">
                                    <h3>Quarto <?=$r->room_num?></h3>
                                    <!-- <p>New Orders</p> -->
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bed"></i>
                                </div>
                                <a href="reserva_detalhe.php?id_res=<?=$r->hosted_id?>" class="small-box-footer">
                                Mais Informações <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="small-box bg-yellow ">
                                <div class="inner">
                                    <h3>Quarto <?=$r->room_num?></h3>
                                    <!-- <p>New Orders</p> -->
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bed"></i>
                                </div>
                                <a href="reserva_detalhe.php?id_room=<?=$r->room_id?>&data=<?=$data?>" class="small-box-footer">
                                Mais Informações<i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                <?php } } ?>
            </div>
        </section>
    </div>
</section>

<?php
require_once 'assets/templates/footer.php';
?>
<!-- fullCalendar -->
<script src="../admin-components/bower_components/moment/moment.js"></script>
<script src="../admin-components/bower_components/fullcalendar/dist/locale/pt-br.js"></script>
<script src="../admin-components/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>



<script>

$(function(){

// $("#modal-default").modal();

  var calendario = $("#calendario").fullCalendar({
    locale: 'pt-br',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Dia'
        },

    dayClick: function (date, jsEvent, view) {
        var data = (($(this)).attr('data-date'));
        window.location.href = "calendario.php?data=" + data;
        },
    })
});
</script>