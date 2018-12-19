<?php 
session_start();
require_once 'classes/classDatabase.php';


if(isset($_POST)){

    // ** DADOS *********** | ********
    // * user {             | 
    // *   + nome           | + nome
    // *   + senha          | + email
    // *   + email          | 
    // *   + nascimento     |
    // *   - foto           |
    // * }                  |
    // *******************************                       
    // * admin {
    // *   + nome
    // *   + usuario
    // *   + senha
    // *   + tipo
    // * }
    // *


    require_once 'classes/classAdmin.php';
    require_once 'classes/classUser.php';

    $admin = new Admin();
    $user = new User();
    
    $dados = json_decode(file_get_contents("php://input"));
    
    if($dados->action == "register"){

        if($dados->type == "user"){

            $user->setEmail($dados->email);

            if($user->getUserByEmail()->rowCount() > 0){
                echo 200;
            }else{
                if(isset($dados->senha)){
                    $senha = md5($dados->senha);
                    $usuario = substr(time(), 0, 6);
                    $user->setPass($senha);
                    $user->setName($dados->nome);
                    $user->setUser($usuario);
                    $user->setBirthday($dados->nascimento);
                    $user->setFoto($dados->foto);
                    $result = $user->createUser();
                    echo $result;
                }else{
                    $senha = md5(time());
                    $usuario = substr(str_replace(" ", $dados->nome), 0, 6);
                    $user->setPass($senha);
                    $user->setEmail($dados->email);
                    $user->setName($dados->nome);
                    $user->setUser($usuario);
                    $result = $user->createUser();
                    echo $result;
                }
            }

            
        }else if($dados->type == "admin"){
            
        }else{
            echo 0;
        }
    }else{
        echo 0;
    }

}


?>