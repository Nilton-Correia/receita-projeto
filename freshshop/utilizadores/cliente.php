<?php
// Initialize the session
require("../confi.php");

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["tipo_utilizador"]=="admin"){
        header("location: ../utilizadores/cliente.php");
    }
}
require_once "../confi.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["bt"]=="submeter"){

    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}
// Close connection

?>

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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="dashboard dashboard_2">
<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                    </div>
                </div>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">

                        <div class="user_info">
                            <h6><?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){echo "Hi ";echo htmlspecialchars($_SESSION["username"]);
                                }
                                else{ echo "Conta";}?>
                            </h6>
                            <div class="profile-usertitle-name"></div>
                            <p><span class="online_animation"></span> Online</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar_blog_2">
                <h4>General</h4>
                <ul class="list-unstyled components">

                    <li><a href="../carrinho.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>

                            <span>Carrinho</span></a></li>

                    <li><a href="tables.html"><i class="fa fa-table purple_color2"></i> <span>Minhas receitas</span></a></li>


                    <li>
                        <a href="editar_util.php">
                            <i class="fa fa-paper-plane red_color"></i> <span>Editar Prefil</span></a>
                    </li>

                    <li>
                        <a href="../index.php">
                            <i class="fa fa-sign-out red_color"></i> <span>Pagina Inicial</span></a>
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
                            <a href="index.html"><img class="img-responsive" src="images/logo/logo_black.png" alt="#" /></a>
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
                                            <a class="dropdown-item" href="profile.html">My Profile</a>
                                            <a class="dropdown-item" href="settings.html">Settings</a>
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


                    </div>

                <!----Onde fica os dados do cliente---->

<?php
require_once "../confi.php";

$id=$_SESSION["id"];
/* definir o charset utilizado na ligação */



$sql = "SELECT * FROM utilizador WHERE id = '$id'";
$result = $link->query($sql);


$ln= $result->fetch_assoc();
$nome  = $ln['nome'];
$username  = $ln['username'];
$telefone = number_format( $ln['telefone']);
$email  = $ln['email'];
$morada  = $ln['morada'];
$localidade  = $ln['localidade'];

?>



                <form action="editarCliente.php" method="post" >

                        <h4> Login </h4>
                        <div type="text" class="form-control"><?php echo"$username" ?>

                        </div>


            <h4 class="field">
                <h4>Nome Completo</h4>
                <div class="control">
                    <div type="text" class="form-control" id="floatingInput"><?php echo"$nome" ?>
                    <label for="floatingInput"></label>

                </div>
        </div>
        <div class="field">
            <h4>Email</h4>
            <div class="control">
                <div type="email" class="form-control" id="floatingInput" ><?php echo"$email" ?>
                <label for="floatingInput"></label>

            </div>
        </div>
        <div class="field">
            <h4>Teletone</h4>
            <div class="control">
                <div class="control">
                    <div type="text" class="form-control" id="floatingInput"><?php echo"$telefone" ?>
                        <label for="floatingInput"></label>
                </div>
            </div>
            <div class="field">
                <h4>Morada</h4>
                <div class="control">
                    <div class="control">
                        <div type="text" class="form-control" id="floatingInput"><?php echo"$morada" ?>
                        <label for="floatingInput"></label>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <h4>Localidade</h4>
                        <div class="control">
                            <div type="text" class="form-control" id="floatingInput"><?php echo"$localidade" ?>
                            <label for="floatingInput"></label>

                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                        </div>

                        <br>

                            <a href="editar_util.php">
                                <p>Editar</p>
                            </a>
                        </form>




            </div>
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
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>
<!-- custom js -->
<script src="js/custom.js"></script>
<script src="js/chart_custom_style2.js"></script>
</body>
</html>