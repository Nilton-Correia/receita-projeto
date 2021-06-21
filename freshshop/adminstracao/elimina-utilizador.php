<?php
session_start();
require("../confi.php");


$utilizador = $_GET['id'];
$deleta ="DELETE FROM utilizador WHERE id = $utilizador";
$resultado=$link->query($deleta);

/* texto sql da consulta*/
if($resultado['id_tipo']==1) {
    echo " ERRO - Não tem permissão para executar a operação. ";
    echo ' <br> <a href="utilizador.php"> Voltar à lista de Utilizadores </a>' ;
    exit();
}


if ($resultado=$link->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: utilizador.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";

    header( "location: utilizador.php");
}

?>
