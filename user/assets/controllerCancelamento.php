<?php

$hosteds = new Hosted();
$limit = 12;
$contador = $hosteds->getHostedUnpayedCount($user_id);
$pages = ceil($contador / $limit);
$page;

if(!isset($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}

$ini = ($page - 1) * $limit;
$result = $hosteds->getHostedUnpayedByUser($user_id, $ini, $limit)->fetchAll(PDO::FETCH_OBJ);


if(isset($_POST['cancelar'])){
    $id_res = $_POST['id_res'];
    $result_operation = $hosteds->cancelarReserva($id_res);
}

?>
