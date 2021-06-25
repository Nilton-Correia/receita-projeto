<?php
require("confi.php");




    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $sms = $_POST['mensagem'];

$result = "INSERT INTO contato(nome, email, assunto, mensagem, created) VALUES ('$nome', '$email', '$assunto', '$sms', NOW())";

if(!$link->query($result)){

    echo "ERRO ao executar a sql: \"$result\"<br>" . $link->error;
    $link->close(); /*fecha a ligacao*/


}
    else {
        echo "Mensagem foi enviada com sucesso";

  }
$link->close();

?>