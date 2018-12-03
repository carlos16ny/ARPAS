<?php
require_once '../assets/php/classes/classDatabase.php';
require_once '../assets/php/classes/classHosted.php';

$hosted = new Hosted();
$registros = $hosted->getHosts()->fetchAll(PDO::FETCH_OBJ);

$pagos = array();
$reservas = array();
$cancelados = array();


foreach($registros as $reg){
    if($reg->status == 3){
        array_push($cancelados, $reg);
    }elseif($reg->status == 2){
        array_push($pagos, $reg);
    }else{
        array_push($reservas, $reg);
    }
}


?>