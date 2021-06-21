<?php
session_start();
// Include config file
require_once("../confi.php");
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();

}
// Define variables and initialize with empty values
$username =  $password  = $nome = $email = $morada = $localidade = $telefone = $confirm_password = "";
$username_err = $password_err = $nome_err = $morada_err = $localidade_err = $telefone_err = $email_err = $confirm_password_err = "";



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor coloque um nome de utilizador.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM utilizador WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Este nome de utilizador já está em uso.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

    }

    // Validate name
    if(empty(trim($_POST["nome"]))){
        $nome_err = "Por favor coloque um nome de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM utilizador WHERE   nome = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_nome = trim($_POST["nome"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);


                $nome = trim($_POST["nome"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    // Validate morada
    if(empty(trim($_POST["morada"]))){
        $morada_err = "Por favor coloque morada de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM utilizador WHERE   morada = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_morada = trim($_POST["morada"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);


                $morada = trim($_POST["morada"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate localidade
    if(empty(trim($_POST["localidade"]))){
        $localidade_err = "Por favor coloque localidade de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM utilizador WHERE   localidade = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_localidade = trim($_POST["localidade"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);


                $localidade = trim($_POST["localidade"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate telefone
    if(empty(trim($_POST["telefone"]))){
        $telefone_err = "Por favor coloque um telefone de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM utilizador WHERE   telefone = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_telefone = trim($_POST["telefone"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);


                $telefone = trim($_POST["telefone"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor insira um nome.";

    } else {
        $sql = "SELECT id FROM utilizador Where email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            //set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This login is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "3";
            }
        }
        mysqli_stmt_close($stmt);
    }

    //validar password

    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor insira uma senha.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor, confirme a senha.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "A senha não corresponde.";
        }
    }
//

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err)
        && empty($morada_err) && empty($localidade_err) && empty($telefone_err) && empty($email_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO utilizador (username, password, nome, morada, localidade, telefone, email) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_username, $param_password, $param_nome, $param_morada, $param_localidade, $param_telefone, $param_email);

            // Set parameters

            $param_username = $username;
            $param_nome = $nome;
            $param_morada =$morada;
            $param_localidade = $localidade;
            $param_telefone = $telefone;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ./utilizador.php");
            } else{
                //echo mysqli_errno($this->link);
                echo "Algo deu errado. Por favor, tente novamente mais tarde.";
                printf("Error: %s.\n", mysqli_stmt_error($stmt));
                echo"6";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
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
    <link rel="stylesheet" href="css/color_2.css" />
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

                                                        <div class="box">
                                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                                                                <div class="input-field  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

                                                                    <input placeholder="Username" id="<?php echo $username; ?>" name="username" type="text" class="input is-large" >
                                                                </div>
                                                                <div class="input-field <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
                                                                    <input placeholder="Nome" id="<?php echo $nome; ?>" name="nome" type="text" class="input is-large">
                                                                </div>
                                                                <div class="input-field <?php echo (!empty($morada_err)) ? 'has-error' : ''; ?>">
                                                                    <input placeholder="Morada" id="<?php echo $morada; ?>" name="morada" type="text" class="input is-large">
                                                                </div>
                                                                <div class="input-field <?php echo (!empty($localidade_err)) ? 'has-error' : ''; ?>">
                                                                    <input placeholder="Localidade" id="<?php echo $localidade; ?>" name="localidade" type="text" class="input is-large">
                                                                </div>
                                                                <div class="input-field <?php echo (!empty($telefone_err)) ? 'has-error' : ''; ?>">
                                                                    <input placeholder="Telefone" id="<?php echo $telefone; ?>" name="telefone" type="text" class="input is-large">
                                                                </div>
                                                                <div class="input-field <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                                                    <input placeholder="Email" id="email" name="email" type="text" class="input is-large">
                                                                </div>
                                                                <div class="input-field <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                                    <input placeholder="Password" id="<?php echo $password; ?>" name="password" type="password" class="input is-large">
                                                                </div>

                                                                <div class="input-field <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                                                    <input placeholder="Confirmar password" id="<?php echo $confirm_password; ?>" name="confirm_password" type="password" class="input is-large">
                                                                </div>

                                                                <div class="text-right mt-4">
                                                                    <button type="submit" class="waves-effect btn-large btn-large-white px-4 black-text">Submeter</button>
                                                                </div>
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

