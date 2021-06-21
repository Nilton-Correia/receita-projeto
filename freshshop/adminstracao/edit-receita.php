<?php
session_start();
require("../confi.php");

/* Verificar se o formulário foi submetido */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, 'r_id');
    $nome = filter_input(INPUT_POST, 'r_nome');
    $preco = filter_input(INPUT_POST, 'r_preco');
    $img= filter_input(INPUT_POST, 'r_img');
    $ingredientes = filter_input(INPUT_POST, 'r_ingredientes');
    $des = filter_input(INPUT_POST, 'r_desc');
    $modo_pre = filter_input(INPUT_POST, 'r_preparacao');
    $pais = filter_input(INPUT_POST, 'r_idPais');
    $cat = filter_input(INPUT_POST, 'r_idcategoria');



    /* validar os dados recebidos do formulario */
    if (empty($nome)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }
}
else{
    echo " ERRO - Não foi possível executar a operação editar. ";
    exit();
}


/* texto sql da consulta*/
$consulta = "UPDATE receita SET  nome ='$nome', preco=$preco, imagens='$img', modo_preparacao='$modo_pre', ingredientes=' $ingredientes', descricao='$des', idPais=$pais, idcategoria=$cat where idreceita=$id ";

/* executar a consulta e testar se ocorreu erro */
if (!$link->query($consulta)) {
    echo " ERRO - Falha ao executar a consulta: \"$consulta\" <br>" . $link->error;
    $link->close();  /* fechar a ligação */
}
else{
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    header("location: receita.php");
}
$link->close();       /* fechar a ligação */
?>

