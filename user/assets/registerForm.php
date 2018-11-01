<?php
    require_once '../assets/php/classes/classDatabase.php';
    require_once '../assets/php/classes/classUser.php';
    require_once '../assets/php/classes/classMessage.php';

    $newUser = new User();
    $message = new Message();

    if(isset($_POST['registrar'])){
        $newUser->setName($_POST['nome']);
        $newUser->setEmail($_POST['email']);
        if($_POST['senha1'] != $_POST['senha2']){
            $message->dangerMessage("Senhas não conferem");
            
        }else{
            $newUser->setPass($_POST['senha1']);
            $newUser->setUser();
        }
    }


?>