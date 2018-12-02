<?php
if(isset($_POST['login'])){
    require_once '../assets/php/classes/classDatabase.php';
    require_once '../assets/php/classes/classUser.php';

    $user = new User();

    $user->setPass(md5($_POST['senha']));
    $user->setEmail($_POST['email']);
    $result = $user->getLogin()->fetch(PDO::FETCH_OBJ);
    
    if($result){
        $_SESSION['email_user'] = $result->email;
        $_SESSION['nome_user'] = $result->name;
        $_SESSION['id_user'] = $result->id;
        $_SESSION['foto'] = $result->foto;
    }else{
        echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                Não foi possivel realizar o login, verifique sua senha e tente novamente.
              </div>';
    }
   
    
}


?>