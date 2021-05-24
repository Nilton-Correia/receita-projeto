<?php
session_start();
require("../confi.php");


$categoria = $_GET['id'];
$deleta ="DELETE FROM categoria WHERE idcategoria = $categoria";
$resultado=$link->query($deleta);


if ($resultado=$link->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: categoria.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";
}

?>
