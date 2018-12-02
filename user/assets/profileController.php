<?php
require '../assets/php/classes/classDatabase.php';
require '../assets/php/classes/classUser.php';

$user = new User();

if(isset(($_POST['editar']))){

    $user->setId($_SESSION['id_user']);

    if(isset($_POST['editSenha'])){

        $senha = md5($_POST['senha']);
        $user->setPass($senha);
        $result = $user->updateSenha();


    }else if(isset($_POST['editEmail'])){

        $email = $_POST['email'];
        $user->setEmail($email);
        $result = $user->updateEmail($email);

        if($result){
            $_SESSION['email_user'] = $email;
        }
        
    }else if(isset($_POST['editNome'])){

        $nome = $_POST['nome'];
        $user->setName($nome);
        $result = $user->updateName();

    }else if(isset($_POST['editFoto'])){

        $foto = $_FILES['foto'];
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        $caminho_imagem = "../assets/images/users/" . $nome_imagem;
        move_uploaded_file($foto["tmp_name"], $caminho_imagem);        
    
        $user->setFoto($caminho_imagem);
        $result = $user->updateFoto();
    }

    if($result){
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                Dados editados com sucesso.
              </div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                Não foi possivel editar essas informações, tente novamete.
              </div>';
    }

}


$user->setEmail($_SESSION['email_user']);
$user = $user->getUserByEmail()->fetch(PDO::FETCH_OBJ);
$_SESSION['foto'] = $user->foto;



?>