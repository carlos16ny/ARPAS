<?php
require_once '../../assets/php/classes/classHosted.php';

$hosted = new Hosted();

if(isset($_REQUEST['data'])){
    $data = $_REQUEST['data'];
    $return = $hosted->getRoomByDay($data);
    echo json_encode($return->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
    
}
else if(isset($_REQUEST['dataRange'])){
    $data = $_REQUEST['dataRange'];
    echo 0;
}

?>