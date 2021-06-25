<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomecat = filter_input(INPUT_POST, 'r_categoria');


    /* validar os dados recebidos do formulario */
    if (empty($nomecat)) {

        echo "Todos os campos do formulário devem conter valores ";

    } else {
        require("../confi.php");
        $link->set_charset("utf8");
        /* texto sql da sql*/
        $catc = "INSERT INTO categoria (nome_categoria) VALUES ('$nomecat')";
        /* executar a sql e testar se ocorreu erro */
        if (!$link->query($catc)) {
            echo "  Falha ao executar a sql: \"$catc\" <br>" . $link->error;
            $link->close();  /* fechar a ligação */
        } else {

            header("location: categoria.php");
        }


    }
}


/* estabelece a ligação à base de dados */
?>
