
<?php
session_start();
require("../confi.php");



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
        else {

            header("location: receita.php");
        }
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
    <link rel="stylesheet" href="css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
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
                        <a href="pluto/index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                    </div>
                </div>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                            <h6>John David</h6>
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
                            <i class="fa fa-cutlery red_color"></i> <span>Receitas</span></a>
                    </li>

                    <li>
                        <a href="../index.php">
                            <i class="fa fa-paper-plane red_color"></i> <span>Luso Flavors</span></a>
                    </li>

                    <li>
                        <a href="../logout.php">
                            <i class="fa fa-sign-out red_color"></i> <span>Logout</span></a>
                    </li>



                    <li><a href="pluto/settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>
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
                            <a href="pluto/index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                            <div class="icon_info">
                                <ul>
                                    <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                    <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                    <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                </ul>
                                <ul class="user_profile_dd">
                                    <li>
                                        <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user">John David</span></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="pluto/profile.html">My Profile</a>
                                            <a class="dropdown-item" href="pluto/settings.html">Settings</a>
                                            <a class="dropdown-item" href="help.html">Help</a>
                                            <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
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
                            <div class="page_title">
                                <h2>Dashboard</h2>
                            </div>
                        </div>
                    </div>

                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-md-flex align-items-center">
                                            <div class="container has-text-centered">
                                                <br class="box">
                                                <p><a href="index.php" class="btn btn-black rounded-0">Pagina Inicial</a></p>
                                                <br>
                                                <?php
                                                $nome=$preco=$descricao=$idPais=$ingredientes=$modo_preparacao=$idcategoria=$imagens="";
                                                ?>
                                                <form action="adicio-receita.php" method="post" enctype="multipart/form-data">
                                                    <div class="field">
                                                        <div class="control">
                                                            <input name="nome" type="text" value="<?=$nome?>" class="input is-large" placeholder="Nome Produto" autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <div class="control">
                                                            <input name="preco" type="text" value="<?=$preco?>" class="input is-large" placeholder="Preço">
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <div class="control">

                                                            <input name="descricao" value="<?=$descricao?>" class="input is-large" type="text" placeholder="Descrição do Produto">
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <div class="control">
                                                            <input name="idPais" type="text" value="<?=$idPais?>" class="input is-large"  placeholder="idPais">
                                                        </div>
                                                    </div>

                                                    <div class="field">
                                                        <div class="control">
                                                            <input name="idcategoria" type="text" value="<?=$idcategoria?>" class="input is-large" placeholder=" id_categoria">
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <div class="control">
                                                            <input name="ingredientes" type="text" value="<?=$ingredientes?>" class="input is-large"  placeholder="ingredientes">
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <div class="control">
                                                            <input name="modo_preparacao" type="text" value="<?=$modo_preparacao?>" class="input is-large"  placeholder="modo_preparacao">
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <input type="file" name="imagens" value="<?=$imagens?>">
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="button is-block is-link is-large is-fullwidth">Registar Produto</button>
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


