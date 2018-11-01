<?php
session_start();
session_destroy();
$type = $_GET['type'];
if($type == "user"){
    header("Location: ../../user/index.php");
}else if($type == "admin"){
    header("Location: ../../admin/index.php");
}

?>