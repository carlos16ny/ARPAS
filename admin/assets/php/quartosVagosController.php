<?php

require_once '../assets/php/classes/classDatabase.php';
require_once '../assets/php/classes/classHosted.php';
require_once '../assets/php/classes/classUser.php';

$hosted = new Hosted();
$user = new User();

if(isset($_POST['reservar'])){
    
    $day = $_POST['data'];
    $id_room = $_POST['id_room'];
    $id_user = $_POST['user_id'];
    $room_price = $_POST['price'];
    $insertion = $hosted->reserveRoom($day, $id_room, $id_user, $room_price);

    if($insertion){
        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                    Reserva efetuada com sucesso.
              </div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-block"></i> Erro!</h4>
                    Não foi possivel efetuar reserva!
              </div>';
    }
}

if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $pre_senha = time();
    $senha = md5($pre_senha);
    $usuario = substr(str_replace($nome, " ", ""), 0, 6);
    $user->setPass($senha);
    $user->setEmail($email);
    $user->setName($nome);
    $user->setUser($usuario);
    $insertion = $user->createUser();
    var_dump($pre_senha);
    if($insertion){
        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                    Usuário inserido com sucesso.
              </div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-block"></i> Erro!</h4>
                    Não foi possivel inserir novo usuário!
              </div>';
    }
}

$users = $user->index()->fetchAll(PDO::FETCH_OBJ);
$data = date('Y-m-d');
$result = $hosted->getRoomByDay($data)->fetchAll(PDO::FETCH_OBJ);




?>