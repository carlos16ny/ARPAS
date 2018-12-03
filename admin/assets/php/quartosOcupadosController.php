<?php
date_default_timezone_set('America/Sao_Paulo');
require_once '../assets/php/classes/classDatabase.php';
require_once '../assets/php/classes/classHosted.php';

$hosted = new Hosted();

if(isset($_POST['cancelar'])){
    $id_res = $_POST['id_host'];
    $r = $hosted->cancelarReserva($id_res);
}

if(isset($_POST['data'])){

}else{

    $data =date('Y-m-d');
    $result = $hosted->getReservedRoomsByDay($data)->fetchAll(PDO::FETCH_OBJ);

}

if(isset($r)){
    if($r){
        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                    Reserva cancelada com sucesso.
              </div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-block"></i> Erro!</h4>
                    Não foi possivel cancelar a reserva, tente novamente.
              </div>';
    }
}





?>