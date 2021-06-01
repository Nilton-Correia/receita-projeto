<?php
require("confi.php");




    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $sms = $_POST['mensagem'];

$result = "INSERT INTO contato(nome, email, assunto, mensagem, created) VALUES ('$nome', '$email', '$assunto', '$sms', NOW())";

if($result = mysqli_query($link, $result)){
    echo "A tua Mensagem foi enviada Obrigado por nos contactares";

}
    else {
        echo "Mensagem nao foi enviada";

  }

?>