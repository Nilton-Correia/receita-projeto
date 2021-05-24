<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomecat = filter_input(INPUT_POST, 'nome_categoria');


    /* validar os dados recebidos do formulario */
    if (empty($nomecat)) {

        echo "Todos os campos do formulário devem conter valores ";

    } else {
        require("../confi.php");
        $link->set_charset("utf8");
        /* texto sql da consulta*/
        $catc = "INSERT INTO categoria (nome_categoria) VALUES ('$nomecat')";
        /* executar a consulta e testar se ocorreu erro */
        if (!$link->query($catc)) {
            echo "  Falha ao executar a consulta: \"$catc\" <br>" . $link->error;
            $link->close();  /* fechar a ligação */
        } else {

            header("location: categoria.php");
        }


    }
}


/* estabelece a ligação à base de dados */
?>
