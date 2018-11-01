<?php

$hosted = new Hosted();
$hosted->setIdGuest($user_id);

$result = $hosted->getHostByUser($user_id)->fetchAll(PDO::FETCH_OBJ);


if( isset($_POST['search_hosp']) ){
    $data = $_POST['range-date'];
    // var_dump($data);
    $hosted->setCheckIn($data);
    $result = $hosted->getReservasByDate()->fetchAll(PDO::FETCH_OBJ);
    // var_dump($_POST['range-date']);
}else if(isset($_POST['search_pag'])){
    $data = $_POST['range-date'];
    // var_dump($data);
    $hosted->setCheckIn($data);
    $result = $hosted->getReservasByDate()->fetchAll(PDO::FETCH_OBJ);
}

?>