<?php 

    class Message{

    //verde
    function successMessage($string){
        echo '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sucesso! </strong>' . $string .
            '</div> ';
    }

    //amarela
    function warningMessage($string){
        echo '<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Cuidado! </strong>' . $string .
            '</div> ';
    }

    //vermelha
    function dangerMessage($string){
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Erro! </strong>' . $string .
            '</div> ';
    }
    //azul
    function infoMessage($string){
        echo '<div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Info! </strong>' . $string .
            '</div> ';
    }
}
?>
