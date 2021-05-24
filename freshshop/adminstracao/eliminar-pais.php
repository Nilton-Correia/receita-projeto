<?php
session_start();
require("../confi.php");


$pais = $_GET['id'];
$deleta ="DELETE FROM pais WHERE idPais = $pais";
$resultado=$link->query($deleta);


if ($resultado=$link->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: pais.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";
}

?>

