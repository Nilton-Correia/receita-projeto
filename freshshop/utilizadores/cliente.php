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
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
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
                    <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                            <li>
                                <a href="dashboard.html">> <span>Default Dashboard</span></a>
                            </li>
                            <li>
                                <a href="dashboard_2.html">> <span>Dashboard style 2</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="../carrinho.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>

                            <span>Carrinho</span></a></li>
                    <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Receitas</span></a>
                        <ul class="collapse list-unstyled" id="element">
                            <li><a href="html/shop.html">São Tomé</a></li>
                            <li><a href="html/shop-detail.html">Angola</a></li>
                            <li><a href="html/cart.html">Portugal</a></li>
                            <li><a href="html/shop.html">Cabo Verde</a></li>
                            <li><a href="html/checkout.html">Moçambique</a></li>
                            <li><a href="html/my-account.html">Giné Bissau</a></li>
                            <li><a href="html/wishlist.html">Guiné Equatorial</a></li>
                            <li><a href="html/wishlist.html">Timor-Leste</a></li>
                        </ul>
                    </li>
                    <li><a href="tables.html"><i class="fa fa-table purple_color2"></i> <span>Minhas receitas</span></a></li>
                    <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Apps</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                            <li><a href="email.html">> <span>Email</span></a></li>
                            <li><a href="calendar.html">> <span>Calendar</span></a></li>
                            <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                        </ul>
                    </li>
                    <li><a href="price.html"><i class="fa fa-briefcase blue1_color"></i> <span>Pricing Tables</span></a></li>
                    <li>
                        <a href="editar_util.php">
                            <i class="fa fa-paper-plane red_color"></i> <span>Editar Prefil</span></a>
                    </li>
                    <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                            <li>
                                <a href="profile.html">> <span>Profile</span></a>
                            </li>
                            <li>
                                <a href="project.html">> <span>Projects</span></a>
                            </li>
                            <li>
                                <a href="login.html">> <span>Login</span></a>
                            </li>
                            <li>
                                <a href="404_error.html">> <span>404 Error</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../logout.php">
                            <i class="fa fa-sign-out red_color"></i> <span>Logout</span></a>
                    </li>
                    <li><a href="charts.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li>
                    <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>
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
                    <div class="row column_title">
                        <div class="col-md-12">
                            <div class="page_title">
                                <h2>Dashboard</h2>
                            </div>
                        </div>
                    </div>

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

                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">

                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html"> Nome</a>
                                            <div class="small text-muted"><?php echo"$nome" ?> </div>
                                        </div>
                                    </div>
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html"> Username</a>
                                            <div class="small text-muted"><?php echo"$username" ?> </div>
                                        </div>
                                    </div>
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html"> Email</a>
                                            <div class="small text-muted"><?php echo"$email" ?> </div>
                                        </div>
                                    </div>
                                    <div class="media mb-2">
                                        <div class="media-body"> <a href="detail.html"> Telefone</a>
                                            <div class="small text-muted"><?php echo"$telefone" ?> </div>
                                        </div>
                                    </div>

                                    <div class="media mb-2">
                                        <div class="media-body"> <a href="detail.html"> Morada</a>
                                            <div class="small text-muted"><?php echo"$morada" ?> </div>
                                        </div>
                                    </div>

                                    <div class="media mb-2">
                                        <div class="media-body"> <a href="detail.html"> Localidade</a>
                                            <div class="small text-muted"><?php echo"$localidade" ?> </div>
                                        </div>
                                    </div>


                                </div>




                            </div>






                        </div>

                <!----Fim de onde fica os dados do cliente---->







                    </div>
                    <!-- footer -->
                    <div class="container-fluid">
                        <div class="footer">
                            <a href="editar_util.php">
                            <p>Editar</p>
                            </a>
                        </div>
                    </div>
                </div>



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
<!-- custom js -->
<script src="js/custom.js"></script>
<script src="js/chart_custom_style2.js"></script>
</body>
</html>