<?php
session_start();
require("../confi.php");


$utilizador = $_GET['id'];
$deleta ="DELETE FROM utilizador WHERE id = $utilizador";
$resultado=$link->query($deleta);
$adm = $resultado ->fetch_assoc();
if($adm['id_tipo']==1){
echo " Não é possivel eliminar o administrador";
echo '<br> <a href="utilizador.php"> Back</a>';

}
else{
    $deleta ="DELETE FROM utilizador WHERE id = $utilizador";

}

if ($resultado=$link->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: utilizador.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";
}

?>
