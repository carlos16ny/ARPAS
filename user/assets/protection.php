<?php
if(!isset($_SESSION['email_user']) || !isset($_SESSION['id_user'])){
    session_abort();
    header("Location : index.php");
}
?>