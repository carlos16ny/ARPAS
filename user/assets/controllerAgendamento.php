<?php

require_once '../assets/php/classes/classHosted.php';
$hosteds = new Hosted();


if(isset($_POST)){
    if(isset($_POST['cancel_res'])){
        $id_res = $_POST['id_res'];
        $rslt = $hosteds->cancelarReserva($id_res);
    }
}

?>
