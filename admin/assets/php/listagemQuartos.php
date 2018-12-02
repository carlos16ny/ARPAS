<?php

include_once '../assets/php/classes/classHosted.php';
$hosted = new Hosted();

$quartos = $hosted->getReservedRoomsByDay(date('Y-m-d'));
$quartos_ocupados = count($quartos->fetchAll());
$quartos = $hosted->getRoomByDay(date('Y-m-d'));
$quartos_vagos = count($quartos->fetchAll());

?>