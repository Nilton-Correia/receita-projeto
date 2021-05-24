<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_pais = filter_input(INPUT_POST, 'Pais');


    /* validar os dados recebidos do formulario */
    if (empty($nome_pais)) {

        echo "Deve preencher todos os campos vaszios ";

    } else {
        require("../confi.php");
        $link->set_charset("utf8");
        /* texto sql da consulta*/
        $cp = "INSERT INTO pais (Pais) VALUES ('$nome_pais')";
        /* executar a consulta e testar se ocorreu erro */
        if (!$link->query($cp)) {

            echo " ERRO - Falha ao executar a consulta: \"$cp\" <br>" . $link->error;
            $link->close();
        } else {

            header("location: pais.php");
        }


    }
}


/* estabelece a ligação à base de dados */
?>
