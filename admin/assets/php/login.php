<?php
require_once '../assets/php/classes/classDatabase.php';
require_once '../assets/php/classes/classAdmin.php';

$admin = new Admin();

if(isset($_POST['entrar'])){
    $user = $_POST['email'];
    $senha = $_POST['pass'];
    $admin->setUser($user);
    $admin->setPass(md5($senha));
    $result = $admin->getLogin();
    $result = $result->fetch(PDO::FETCH_OBJ);
    $_SESSION['admin_id'] = $result->id;
    $_SESSION['admin_user'] = $result->user;
    $_SESSION['admin_nome'] = $result->name;
}





?>