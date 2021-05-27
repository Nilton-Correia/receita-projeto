<?php
session_start();
require ("../confi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idcategoria = filter_input(INPUT_POST, 'x_idcategoria');
    $nomecat = filter_input(INPUT_POST, 'x_nomecat');


    if (empty($nomecat)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }

}
else{
    echo "  Não foi possível editar. ";
    exit();
}


$editar ="UPDATE categoria SET nome_categoria='$nomecat'WHERE idcategoria = $idcategoria";

if (!$link->query($editar)) {
    echo " Falha ao executar a consulta: \"$editar\" <br>" . $link->error;
    $link->close();  /* fechar a ligação */

} else {
    header( "location:categoria.php");

}
$link->close();

?>

