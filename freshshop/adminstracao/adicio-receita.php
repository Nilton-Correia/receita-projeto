<?php
session_start();
require("../confi.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["tipo_utilizador"]!="admin"){
        header("location: ../adminstrador.php");
    }
}



    if(!empty($_POST['nome'])||!empty($_POST['preco'])||!empty($_POST['imagens'])||!empty($_POST['idPais'])||!empty($_POST['ingredientes'])||!empty($_POST['modo_preparacao'])||!empty($_POST['descricao'])||!empty($_POST['video'])||!empty($_POST['idcategoria'])) {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        $idpais = $_POST['idPais'];
        $ingredientes = $_POST['ingredientes'];
        $modo_preparacao = $_POST['modo_preparacao'];
        $categoria = $_POST['idcategoria'];


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

        $sql = "INSERT INTO receita(nome, preco, descricao, ingredientes, modo_preparacao, idcategoria, idPais, imagens) VALUES ('$nome','$preco','$descricao','$ingredientes','$modo_preparacao','$categoria','$idpais','".$imagens['name']."')";
        if (!mysqli_query($link, $sql)) {
            print_r(mysqli_error($link));

            $result = mysqli_query($link, "SELECT * FROM receita INNER JOIN Categoria ON  receita.idcategoria= categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais  ");

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

        header("Location:receita.php");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="css/color_2.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="dashboard dashboard_1">
<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section">
                        <a href="../index.php"><img class="logo_icon img-responsive" src="../images/logotipo.png" alt="#" /></a>
                    </div>
                </div>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">

                        <div class="user_info">
                            <h6><?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){echo "Bem-vindo ";echo htmlspecialchars($_SESSION["username"]);
                                }
                                else{ echo "Conta";}?></h6>
                            <p><span class="online_animation"></span> Online</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar_blog_2">
                <h4>General</h4>
                <ul class="list-unstyled components">

                    <li><a href="utilizador.php"><i class="fa fa-group purple_color2"></i> <span>Utilizador</span></a></li>


                    <li>
                        <a href="receita.php">
                            <i class="fa fa-cutlery green_color"></i> <span>Receitas</span></a>
                    </li>
                    <li>
                        <a href="categoria.php">
                            <i class="fa fa-edit yellow_color"></i> <span>Editar Categoria</span></a>
                    </li>

                    <li>
                        <a href="pais.php">
                            <i class="fa fa-edit red_color"></i> <span>Editar Pais da Receita</span></a>
                    </li>
                    <li>
                        <a href="listar-informacoe-contacto.php">
                            <i class="fa fa-product-hunt red_color"></i> <span>Problemas e Informaçoes</span></a>
                    </li>

                    <li>
                        <a href="../index.php">
                            <i class="fa fa-home orange_color2"></i> <span>Luso Flavors</span></a>
                    </li>

                    <li>
                        <a href="../logout.php">
                            <i class="fa fa-sign-out red_color"></i> <span>Logout</span></a>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- end sidebar -->
        <!-- right content -->
        <div id="content">
            <!-- topbar -->
            <div class="topbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                            <a href="pluto/index.html"><img class="img-responsive" src="../images/logotipo.png" alt="#" /></a>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
                <div class="container-fluid">
                    <div class="row column_title">
                        <div class="col-md-12">
                        </div>
                    </div>

                    <div class="container-fluid">

                        <div class="row">

                            <!-- Content Column -->
                            <div class="col-lg-5 mb-4">

                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">


                                    <div class="card-body">


                                        <form action="adicio-receita.php" method="post" enctype="multipart/form-data">
                                            <div class="field">
                                                <div class="control">
                                                    <input name="nome" type="text" class="input is-large" placeholder="Nome Produto" autofocus>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <input name="preco" type="number" class="input is-large" placeholder="Preço">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <input name="descricao" class="input is-large" type="text" placeholder="Descrição do Produto">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <select class="custom-select d-block w-100" name="idPais" required>
                                                        <option value="">País...</option>
                                                        <?php
                                                        require ("../confi.php");
                                                        $link->set_charset("utf8");
                                                        $consulta = 'SELECT * FROM pais';

                                                        /* executar a consulta e testar se ocorreu erro */
                                                        if (!$resultado = $link->query($consulta)) {
                                                            echo ' Falha na consulta: '. $link->error;
                                                            $link->close();  /* fechar a ligação */
                                                        }
                                                        else{
                                                            while ($row = $resultado->fetch_assoc()) {

                                                                ?>
                                                                <option value=<?php echo $row['idPais'];?>><?php echo $row['Pais'];?></option>
                                                                <?php
                                                            }

                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">

                                                        <textarea class="form-control" id="message" name="ingredientes" placeholder="Ingredientes" rows="5"></textarea>

                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <textarea class="form-control" id="message" name="modo_preparacao" placeholder="Modo de Preparação" rows="5"></textarea>

                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <select class="custom-select d-block w-100"  name="idcategoria" required>
                                                        <option value="">Categoria de Produto...</option>
                                                        <?php
                                                        $link->set_charset("utf8");
                                                        $consulta = 'SELECT * FROM categoria';

                                                        /* executar a consulta e testar se ocorreu erro */
                                                        if (!$resultado = $link->query($consulta)) {
                                                            echo ' Falha na consulta: '. $link->error;
                                                            $link->close();  /* fechar a ligação */
                                                        }
                                                        else{
                                                            while ($rows = $resultado->fetch_assoc()) {

                                                                ?>
                                                                <option value=<?php echo $rows['idcategoria'];?>><?php echo $rows['nome_categoria'];?></option>
                                                                <?php
                                                            }

                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>


                                            Imagem
                                            <div>
                                                <input type="file" name="imagens" value="imagens">
                                            </div>
                                            <br>
                                            <button type="submit" class="button is-block is-link is-large ">Registar Produto</button>
                                        </form>

                                    </div>

                                </div>


                            </div>






                                    <!-- graph -->

                                    <!-- footer -->
                                    <div class="container-fluid">
                                        <div class="footer">
                                            <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end dashboard inner -->
                            </div>
                        </div>
                    </div>
                    <!-- jQuery -->
                    <script src="js/jquery.min.js"></script>
                    <script src="js/popper.min.js"></script>
                    <script src="js/bootstrap.min.js"></script>
                    <!-- wow animation -->
                    <script src="js/animate.js"></script>
                    <!-- select country -->
                    <script src="js/bootstrap-select.js"></script>
                    <!-- owl carousel -->
                    <script src="js/owl.carousel.js"></script>
                    <!-- chart js -->
                    <script src="js/Chart.min.js"></script>
                    <script src="js/Chart.bundle.min.js"></script>
                    <script src="js/utils.js"></script>
                    <script src="js/analyser.js"></script>
                    <!-- nice scrollbar -->
                    <script src="js/perfect-scrollbar.min.js"></script>
                    <script>
                        var ps = new PerfectScrollbar('#sidebar');
                    </script>
                    <!-- custom js -->
                    <script src="js/custom.js"></script>
                    <script src="js/chart_custom_style1.js"></script>
</body>
</html>


