<?php
require_once '../assets/php/classes/classDatabase.php';
require_once '../assets/php/classes/classHosted.php';
require_once 'assets/templates/header.php';

$hosted = new Hosted();

if(isset($_GET['data']) && isset($_GET['id_room'])){

}elseif(isset($_GET['id_res'])){
    $hosted->setId($_GET['id_res']);
    $result = $hosted->getReserveDetail()->fetch(PDO::FETCH_OBJ);
}else{
    echo 'erro';
}

var_dump($result);
require_once 'assets/templates/footer.php';
?>

