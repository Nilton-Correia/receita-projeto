<?php
require("../config.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Minha Conta</title>
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
        <li ><a href="widgets.php"><em class="fa fa-calendar">&nbsp;</em> Ferramenta</a></li>
        <li><a href="../produtos.php"><em class="fa fa-product-hunt">&nbsp;</em> Produto</a></li>
        <li><a href="../carrinho.php"><em class="fa fa-shopping-cart">&nbsp;</em> Carrinho</a></li>
        <li><a href="anuncio.php"><em class="fa fa-newspaper-o">&nbsp;</em> Anuncio</a></li>
        <li class="parent " ><a data-toggle="collapse" href="#sub-item-1">
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
            <li class="active">Ferramentas</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ferramentas</h1>
        </div>
    </div><!--/.row-->
    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default articles">
                <div class="panel-heading">
                    Mensagens de Motivação
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body articles-container">
                    <div class="article border-bottom">
                        <div class="col-xs-12">
                            <div class="row">
                                <?php
                                $link->set_charset("utf8");

                                /* texto sql da consulta*/
                                $consulta = 'SELECT * FROM frase';

                                /* executar a consulta e testar se ocorreu erro */
                                if (!$resultado = $link->query($consulta)) {
                                    echo ' Falha na consulta: '. $link->error;
                                    $link->close();  /* fechar a ligação */
                                }
                                else {
                                    /* percorrer os registos (linhas) da tabela e mostrar na página */
                                    $row = $resultado->fetch_assoc();
                                }
                                ?>

                                <div class="col-xs-2 col-md-2 date">
                                    <div class="large"></div>
                                    <div class="text-muted">1</div>
                                </div>
                                <div class="col-xs-10 col-md-10">
                                    <h4><a href="#"><?php echo ''.$row['tema'].'';?></a></h4>
                                    <p><?php echo ''.$row['frase'].'';?></p></p>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div><!--End .article-->

                    <div class="article border-bottom">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-2 col-md-2 date">
                                    <div class="large"></div>
                                    <div class="text-muted">2</div>
                                </div>
                                <div class="col-xs-10 col-md-10">
                                    <h4><a href="#"><?php echo ''.$row['tema1'].'';?></a></h4>
                                    <p><?php echo ''.$row['frase1'].'';?></p>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div><!--End .article-->

                    <div class="article">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-2 col-md-2 date">
                                    <div class="large"></div>
                                    <div class="text-muted">3</div>
                                </div>
                                <div class="col-xs-10 col-md-10">
                                    <h4><a href="#"><?php echo ''.$row['tema2'].'';?></a></h4>
                                    <p><?php echo ''.$row['frase2'].'';?></p>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div><!--End .article-->
                </div>
            </div>

        </div><!--/.col-->
        <div class="col-md-6">
            <!--End .articles-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Calendario
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>
            </div>

        </div><!--/.col-->
        <div class="col-sm-12">
            <p class="back-link">TEC-PONTE DIGITAL STP by <a href="https://www.instagram.com/astar_stp" target="_blank">aSTAR</a></p>
        </div>
    </div><!--/.row-->
</div>	<!--/.main-->


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
