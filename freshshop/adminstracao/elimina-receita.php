<?php
session_start();
require ("../config.php");


$receita = $_GET['idreceita'];
$deleta ="DELETE FROM receita WHERE idreceita = $receita";
$resultado=$link->query($deleta);

if ($resultado=$link->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: receita.php");
} else {


    echo "Infelizmente não foi possivel eliminar";
}

?>
