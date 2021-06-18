<?php
require("../config.php");
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meus Anuncio</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="../index.php"><span>TEC-PONTE </span>DIGITAL STP</a>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Ola <?php echo htmlspecialchars($_SESSION["username"]); ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search" method="POST" action="../pesquisar.php">
        <div class="form-group">
            <input type="text" class="form-control"  name="pesquisar" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li ><a href="client.php"><em class="fa fa-dashboard">&nbsp;</em>Painel de Controle</a></li>
        <li><a href="widgets.php"><em class="fa fa-calendar">&nbsp;</em> Ferramenta</a></li>
        <li><a href="../produtos.php"><em class="fa fa-product-hunt">&nbsp;</em> Produto</a></li>
        <li><a href="../carrinho.php"><em class="fa fa-shopping-cart">&nbsp;</em> Carrinho</a></li>
        <li class="active"><a href="panels.html"><em class="fa fa-newspaper-o">&nbsp;</em> Anuncio</a></li>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em> Encomenda <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="encomendas.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Encomendas
                    </a></li>
            </ul>
        </li>
        <li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Sair</a></li>
    </ul>
</div><!--/.sidebar-->


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Panels</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Meus Anuncios</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <h2>Alerta</h2>
            <div class="alert bg-primary" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> BREVIMENTE!!!!<a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
            <div class="alert bg-info" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Seja bem Vindo a sua area de Anuncios!!<a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <h2>Basic Panels</h2>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Painel Informativo</div>
                <div class="panel-body">
                    <p>Esta será uma area aonde poderás publica os teus anuncios e produtos.</p>
                </div>
            </div>
        </div>


    </div><!-- /.row -->

    <div class="row">

    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">TEC-PONTE DIGITAL STP by <a href="https://www.instagram.com/astar_stp" target="_blank">aSTAR</a></p>
        </div>
    </div><!--/.row-->
</div><!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
