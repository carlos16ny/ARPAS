<?php
require_once '../assets/php/classes/classDatabase.php';
require_once '../assets/php/classes/classUser.php';
require_once 'email.php';
$user = new User();

if(isset($_POST['recover'])){
    $email = $_POST['email'];
    $user->setEmail($email);
    $u = $user->getUserByEmail()->fetch(PDO::FETCH_OBJ);
    if(count($u) == 0){
        echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-block"></i> Erro!</h4>
                    Email não encontrado na base de dados!
              </div>';
    }else{
        $user->setId($u->id);
        $senha = time();
        $user->setPass(md5($senha));
        $result = $user->updateSenha();
        if($result){
            $mail = new Mail($u->email, $senha, $u->name);
            $mail->sendMail();
            echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                    Seu email com a nova senha foi enviado!
              </div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-block"></i> Erro!</h4>
                    Não foi possivel recuperar sua senha de acesso!
              </div>';
        }
        
    }
}

?>