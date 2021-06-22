<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["tipo_utilizador"]!="admin"){
        header("location: ../adminstrador.php");
    }
}
?>

<!DOCTYPE html>
<div lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Luso Flavors</title>
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
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<div class="top_page_header">

<div class="is-wrapped">

    <ul class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section">

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


        <!-- right content -->
        <div id="content">
            <!-- topbar -->
            <div class="topbar">

                <div class="full">
                    <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                    <div class="logo_section">

                    </div>

                </div>

            </div>
        <!-- end sidebar -->
        <!-- right content -->

            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="sidebar_blog_2">
                <div class="container-fluid">
                    <div class="row column_title">
                        <div class="col-md-12">
                            <div class="page_title">
                                <h2>Listar Receita</h2>
                            </div>
                        </div>
                    </div>
                <div class="card-body">
                    <table class="table table-striped table-white">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Preco</th>
                            <th>Imagem</th>
                            <th>Video</th>
                            <th>Descrição</th>
                            <th>Ingredientes</th>
                            <th>Preparação</th>
                            <th>País</th>
                            <th>Categoria</th>
                            <th><a href="adicio-receita.php" class="fa fa-plus blue2_color">Adicionar</a></th>
                        </tr>
                        </thead>
                        <?php
                        require("../confi.php");
                        $link->set_charset("utf8");
                        $receitas="SELECT receita.*, pais.*, categoria.* FROM receita INNER JOIN pais ON receita.idPais=pais.idPais INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria";
                        if($resultado=$link->query($receitas)){
                            while ($row=$resultado->fetch_assoc()){
                                echo'<tr> 
            <td>'.$row['nome'].'</td>
            <td>'.$row['preco'].'</td>
            <td>'.$row['imagens'].'</td>
             <td>'.$row['video'].'</td>
            <td>'.$row['descricao'].'</td>
            <td>'.$row['ingredientes'].'</td>
            <td>'.$row['modo_preparacao'].'</td>
            <td>'.$row['Pais'].'</td>
            <td>'.$row['nome_categoria'].'</td>
            <td><a href="elimina-receita.php?id='.$row['idreceita'].'" class="fa fa-trash-o red_color"> Eliminar</a></td>
            <td><a href="form_edit_receita.php?id='.$row['idreceita'].'" class="fa fa-wrench green_color"> Editar</a></td>
            </tr>';
                            }
                        }


                        ?>
                    </table>
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
        </ul>
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