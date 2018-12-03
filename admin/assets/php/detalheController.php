<?php
require_once '../assets/php/classes/classDatabase.php';
require_once '../assets/php/classes/classHosted.php';
require_once '../assets/php/classes/classUser.php';
require_once '../assets/php/classes/classRoom.php';
require_once 'email.php';

$hosted = new Hosted();
$room = new Room();
$user = new User();


if(isset($_POST['cadastro'])){

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

    $mail = new Mail($email, $pre_senha, $nome);
    $sendEmail = $mail->sendMail();
    
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


if(isset($_GET['data']) && isset($_GET['id_room'])){
    
    $data = $_GET['data'];
    $id_room = $_GET['id_room'];
    $room_num = $room->getRoomNumById($id_room)->fetchColumn();
    $roomResult = $room->getRoomById($id_room)->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['reservar'])){

        $id_user = $_POST['user_id'];
        $roomResult = $room->getRoomById($id_room)->fetch(PDO::FETCH_OBJ);
        $lastid = $hosted->reserveRoom($data, $id_room, $id_user , $roomResult->price);
        echo('<script>window.location.href="reserva_detalhe.php?id_res='.$lastid.'"</script>');

    }

}elseif(isset($_GET['id_res'])){

    $id_res = $_GET['id_res'];

    if(isset($_POST['cancelar'])){

        $can = $hosted->cancelarReserva($id_res);

        if($can){
            echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                    Reserva cancelada com sucesso.
              </div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Erro!</h4>
                    Não foi possivel realizar o cancelamento de reserva, tente novamente.
              </div>';
        }

    }else if(isset($_POST['pagar'])){

        $hosted->setId($id_res);
        $pag = $hosted->pagarReserva();

        if($pag){
            echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                    Reserva paga com sucesso.
              </div>';
        }else{
             echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Erro!</h4>
                    Não foi possivel realizar o pagamento de reserva, tente novamente.
              </div>';
        }
    }

    $hosted->setId($id_res);
    $resultReserva = $hosted->getReserveDetail()->fetch(PDO::FETCH_OBJ);
    $data = $resultReserva->check_in;

    if($resultReserva->foto == NULL){
        $resultReserva->foto = "../assets/images/faces/avatar.png";
    }

}else{
    echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Erro!</h4>
            Não foi possivel capturar os dados da pesquisa. Retorne e tente novamente.
        </div>';
}

$users = $user->index()->fetchAll(PDO::FETCH_OBJ);


?>