<?php

$hosted = new Hosted();
$hosted->setIdGuest($user_id);

$limit = 5;
$page;
$registros = $hosted->getHostPayedByUserCount($user_id);

if(!isset($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}

$limit_inf = ($page - 1) * $limit;
$result = $hosted->getHostPayedByUser($limit_inf, $limit)->fetchAll(PDO::FETCH_OBJ);
$pages = ceil($registros / $limit) ;

// if( isset($_POST['search_hosp']) ){
//     $data = $_POST['range-date'];
//     $data = split(" - ", $data);
//     var_dump($data);
    
//     $registros = $hosted->getHotedByDateCount($user_id, $data[0], $data[1]);
//     var_dump($registros);
//     $result = $hosted->getReservasByDate()->fetchAll(PDO::FETCH_OBJ);
//     // var_dump($_POST['range-date']);
// }else if(isset($_POST['search_pag'])){
//     $data = $_POST['range-date'];
//     // var_dump($data);
//     $hosted->setCheckIn($data);
//     $result = $hosted->getReservasByDate()->fetchAll(PDO::FETCH_OBJ);
// }






?>