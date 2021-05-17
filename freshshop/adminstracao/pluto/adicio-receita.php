
<?php
session_start();
require("freshshop/confi.php");


if(isset($_POST['receita'])){
    if(!empty($_POST['nome'])||!empty($_POST['preco'])||!empty($_POST['imagens'])||!empty($_POST['descricao'])||!empty($_POST['ingredientes'])||!empty($_POST['modo_preparacao'])||!empty($_POST['idPais'])||!empty($_POST['idcategoria'])) {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        $ingredientes = $_POST['ingredientes'];
        $modo_preparacao = $_POST['modo_preparacao'];
        $idPais = $_POST['idPais'];
        $idcategoria = $_POST['idcategoria'];
        print_r($_FILES);
        $imagens = $_FILES['imagens'];

        $imagensName = $_FILES['imagens']['name'];
        $imagensTmpName = $_FILES['imagens']['tmp_name'];
        $imagensSize = $_FILES['imagens']['size'];
        $imagensError = $_FILES['imagens']['error'];
        $imagensType = $_FILES['imagens']['type'];

        $imagensExt = explode('.', $imagensName);
        $imagensActualExt = strtolower(end($imagensExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        $sql = "INSERT INTO receita(nome, preco, descricao, idcategoria , idPais, ingredientes, modo_preparacao, imagens) VALUES ('$nome','$preco','$descricao','$idcategoria','$idPais','$ingredientes','$modo_preparacao','".$imagens['name']."')";
        if (!mysqli_query($link, $sql)) {
            print_r(mysqli_error($link));

            $result = mysqli_query($link, "SELECT * FROM receita INNER JOIN categoria ON receita.idcategoria= categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais");

            if (in_array($imagensActualExt, $allowed)) {
                if ($imagensError === 0) {
                    if ($imagensSize < 1000000) {
                        $imagensNameNew = uniqid('', true) . "." . $imagensActualExt;
                        $imagensDestination = 'imagens/' . $imagensNameNew;
                        move_uploaded_file($imagensTmpName, $imagensDestination);
                        //header("Location:cadastro_produtos.php");
                    } else {
                        echo "Sua imagens e muito grande";
                    }
                } else {
                    echo " Houve um erro ao fazer o upload";
                }
            } else {
                echo "Não podes fazer upload deste tipo de imagens";
            }

        }
    }
}
?>