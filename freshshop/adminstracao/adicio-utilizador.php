<?php
session_start();
require("../confi.php");

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["tipo_utilizador"]== "admin") {
        header("location: ./adminstracao/adminstrador.php");
    }else{
        header("location: welcome.php");
    }

}





    if (!empty($_POST['username']) || !empty($_POST['nome']) || !empty($_POST['email']) || !empty($_POST['telefone']) || !empty($_POST['id_tipo']) || !empty($_POST['morada']) || !empty($_POST['localidade']) || !empty($_POST['password'])) {
        $username = $_POST['username'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $id_tipo = $_POST['id_tipo'];
        $morada = $_POST['morada'];
        $localidade = $_POST['localidade'];
        $pass = $_POST['password'];
        $password =password_hash($pass, PASSWORD_DEFAULT);



        $sql = "INSERT INTO utilizador(username, nome, email, telefone, id_tipo, morada, localidade, password) VALUES (' $username','$nome','$email', '$telefone', '$id_tipo' ,'$morada', '$localidade', '$password')";
        if (!mysqli_query($link, $sql)) {
            print_r(mysqli_error($link));


        } else {

            header("location: utilizador.php");
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
    <link rel="icon" href="images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="css/color.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link href="css/sb-admin-2.css" rel="stylesheet" />

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


                    <li><a href="utilizador.php"><i class="fa fa-table purple_color2"></i> <span>Utilizador</span></a></li>


                    <li>
                        <a href="receita.php">
                            <i class="fa fa-paper-plane red_color"></i> <span>Receitas</span></a>
                    </li>
                    <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                            <li>
                                <a href="pluto/profile.html">> <span>Profile</span></a>
                            </li>
                            <li>
                                <a href="pluto/project.html">> <span>Projects</span></a>
                            </li>
                            <li>
                                <a href="pluto/login.html">> <span>Login</span></a>
                            </li>

                        </ul>
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

                                    <div class="container-fluid">

                                        <div class="row">
                                            <div class="col-lg-5 mb-4">

                                                <!-- Project Card Example -->
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Adicionar Utilizador&nbsp;<img src="../img/edt.png" alt=""></h6>
                                                    </div>

                                                    <div class="card-body">
                                                        <?php
                                                        /* obter os dados do registo */
                                                        $username = $nome = $email = $telefone = $localidade = $morada = $id_tipo = $password= "";
                                                        ?>

                                                        <div class="box">
                                                            <form method="POST" action="adicio-utilizador.php">
                                                                Username
                                                                <input type="text" name="username" value="<?=$username?>" class="input is-large" placeholder="username" required><br>
                                                                Nome<br>
                                                                <input type="text" name="nome" value="<?=$nome?>" class="input is-large" placeholder="Nome" required><br>
                                                                Email<br>
                                                                <input type="email" name="email" value="<?=$email?>" class="input is-large" placeholder="Email" required><br>
                                                                Telefone<br>
                                                                <input type="tel" name="telefone" value="<?=$telefone?>" class="input is-large" placeholder="Telefone" required><br>
                                                                Palavra Passe<br>
                                                                <input type="password" name="password" value="<?=$password?>" class="input is-large" placeholder="Palavra Passe" required><br>
                                                                Tipo<br>
                                                                <input type="text" name="id_tipo" value="<?=$id_tipo?>" class="input is-large" placeholder="Tipo" required><br>
                                                                Localidade<br>
                                                                <input type="text" name="localidade" value="<?=$localidade?>" class="input is-large" placeholder="Localidade" required><br>
                                                                Morada<br>
                                                                <input type="text" name="morada" value="<?=$morada?>" class="input is-large" placeholder="Morada" required><br><br>

                                                                <button type="submit" value="Adicionar" class="button is-block is-link is-large is-fullwidth">Adicionar</button>
                                                            </form>
                                                        </div>

                                                    </div>

                                                </div>
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

