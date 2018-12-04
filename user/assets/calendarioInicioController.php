<?php
session_start();
require '../../assets/php/classes/classDatabase.php';
require '../../assets/php/classes/classHosted.php';

$hosted = new Hosted();
$id_user = $_SESSION['id_user'];

$result = $hosted->getHostReservedByUser(1)->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
// var_dump($result);


?>