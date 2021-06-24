<?php
session_start();
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
    <title>LusoFalvors</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="images/fevicon.png" type="image/png" />
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
                        <a href="pluto/index.html"><img class="logo_icon img-responsive" src="../images/logotipo.png" alt="#" /></a>
                    </div>
                </div>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                        <div class="user_info">
                            <h6><?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){echo "Bem-vindo ";echo htmlspecialchars($_SESSION["username"]);
                                }
                                else{ echo "Conta";}?> </h6>
                            <p><span class="online_animation"></span> Online</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar_blog_2">

                <ul class="list-unstyled components">

                    <li><a href="adminstrador.php"><i class="fa fa-adjust "></i> <span>Adminstração</span></a></li>
                    <li><a href="utilizador.php"><i class="fa fa-group purple_color2"></i> <span>Utilizador</span></a></li>


                    <li>
                        <a href="receita.php">
                            <i class="fa fa-list green_color"></i> <span>Receitas</span></a>
                    </li>
                    <li>
                        <a href="listar_pedido.php">
                            <i class="fa fa-list-alt green_color"></i> <span>Pedidos</span></a>
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
                                <h2></h2>
                            </div>
                        </div>
                    </div>

                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <?php

                                        /* Verificar se foi enviado o pedido para eliminar  */

                                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                            $id = filter_input(INPUT_GET, 'id');
                                            $operacao = filter_input(INPUT_GET, 'operacao');

                                            /* validar os dados recebidos através do pedido */
                                            if (empty($id) && $operacao!="editar"){

                                                echo " Nada para editar!! ";
                                            }

                                        }
                                        else{




                                        }


                                        /* estabelece a ligação à base de dados */
                                        require("../confi.php");

                                        /* definir o charset utilizado na ligação */
                                        $link->set_charset("utf8");

                                        /* texto sql da sql*/
                                        $editar = "SELECT * FROM categoria  WHERE idcategoria = '$id' ";

                                        /* executar a sql e testar se ocorreu erro */
                                        if (!$resultado = $link->query($editar)) {
                                            echo ' Falha na sql: '. $link->error;
                                            $link->close();  /* fechar a ligação */
                                        }
                                        else{
                                        /* buscar os dados do registo */
                                        $row = $resultado->fetch_assoc();
                                        ?>


                                        <div class="d-md-flex align-items-center">
                                            <div class="container has-text-centered">

                                                <div class="box">


                                                    <form action="edita-categoria.php" method="post" >

                                                        <div class="field">
                                                            <div class="control">
                                                                <input name="x_nomecat" type="text" value="<?=$row['nome_categoria']?>" class="input is-large" placeholder="Categoria">
                                                            </div>
                                                        </div>


                                                        <div class="field">
                                                            <div class="control">
                                                                <input name="x_idcategoria" type="hidden" value="<?=$row['idcategoria']?>" class="input is-large">
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <button type="submit"  class="button is-block is-link is-large ">Editar</button>
                                                    </form>

                                                    <?php
                                                    $resultado->free();/* libertar o resultado */
                                                    $link->close();       /* close a ligação */
                                                    }
                                                    ?>
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

