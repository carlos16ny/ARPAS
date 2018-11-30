<?php
session_start();
if(!isset($_SESSION['email_user']) || !isset($_SESSION['id_user'])){
    session_destroy();
    header("Location : index.php");
}

?>