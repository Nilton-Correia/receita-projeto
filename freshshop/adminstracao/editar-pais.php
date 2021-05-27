<?php
session_start();
require ("../confi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idpais = filter_input(INPUT_POST, 'idpais');
    $nompais = filter_input(INPUT_POST, 'nompais');


    if (empty($nompais)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }

}
else{
    echo "  Não foi possível editar. ";
    exit();
}


$editar ="UPDATE pais SET Pais='$nompais'WHERE idPais = $idpais";

if (!$link->query($editar)) {
    echo " Falha ao executar a consulta: \"$editar\" <br>" . $link->error;
    $link->close();  /* fechar a ligação */

} else {
    header( "location:pais.php");

}
$link->close();

?>


