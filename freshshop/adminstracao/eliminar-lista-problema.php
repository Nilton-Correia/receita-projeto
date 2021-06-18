<?php
session_start();
require("../confi.php");


$cont = $_GET['id'];
$deleta ="DELETE FROM contato WHERE idcontato = $cont";
$resultado=$link->query($deleta);


if ($resultado=$link->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: listar-informacoes-contacto.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";
}

?>

