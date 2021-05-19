<?php
session_start();
require("../confi.php");


$utilizador = $_GET['id'];
$deleta ="DELETE FROM utilizador WHERE id = $utilizador";
$resultado=$link->query($deleta);

if ($resultado=$link->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: utilizador.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";
}

?>
