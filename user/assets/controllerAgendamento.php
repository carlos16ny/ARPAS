<?php

$hosted = new Hosted();
$hosted->setIdGuest($user_id);

if(isset($_POST)){
    if(isset($_POST['cancel_res'])){
        $id_res = $_POST['id_res'];
        $rslt = $hosted->cancelarReserva($id_res);
    }
}

$limit = 5;
$page;
$registros = $hosted->getHostedCount($user_id);

if(!isset($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}

$limit_inf = ($page - 1) * $limit;
$result = $hosted->getHostByUser($limit_inf, $limit)->fetchAll(PDO::FETCH_OBJ);
$pages = ceil($registros / $limit);

?>
