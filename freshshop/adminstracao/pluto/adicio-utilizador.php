<?php
session_start();
require("freshshop/confi.php");


if(isset($_POST['utilizador'])){
    if(!empty($_POST['username'])||!empty($_POST['nome'])||!empty($_POST['email'])||!empty($_POST['telefone'])||!empty($_POST['id_tipo'])|| !empty($_POST['morada'])|| !empty($_POST['localidade'])|| !empty($_POST['password']) ) {
        $username = $_POST['username'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $id_tipo = $_POST['id_tipo'];
        $morada = $_POST['morada'];
        $localidade = $_POST['localidade'];
        $password = $_POST['password'];




        $sql = "INSERT INTO utilizador(username, nome, email, telefone, id_tipo, morada, localidade, password) VALUES (' $username','$nome','$email', '$telefone', '$id_tipo' ,'$morada', '$localidade', '$password')";
        if (!mysqli_query($link, $sql)) {
            print_r(mysqli_error($link));

            $result = mysqli_query($link, "SELECT * FROM utilizador INNER JOIN tipo_utilizador ON  utilizador.id_tipo = tipo_utilizador.id_tipo");


        }
        else{
            header( "location: utilizador.php");
        }
    }
}



?>