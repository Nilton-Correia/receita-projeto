<?php
session_start();
require ("../confi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, 'x_id');
    $username = filter_input(INPUT_POST, 'x_username');
    $nome = filter_input(INPUT_POST, 'x_nome');
    $email = filter_input(INPUT_POST, 'x_email');
    $telefone = filter_input(INPUT_POST, 'x_telefone');
    $morada = filter_input(INPUT_POST, 'x_morada');
    $localidade = filter_input(INPUT_POST, 'x_localidade');


    if (empty($username)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }

}
else{
    echo "  Não foi possível editar. ";
    exit();
}


$editar ="UPDATE utilizador SET username='$username', nome='$nome', email= '$email', telefone='$telefone',morada='$morada',localidade='$localidade'WHERE id = $id";

if (!$link->query($editar)) {
    echo " Falha ao executar a consulta: \"$editar\" <br>" . $link->error;
    $link->close();  /* fechar a ligação */

} else {
    header( "location:cliente.php");

}
$link->close();

?>
