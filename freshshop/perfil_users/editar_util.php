<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["tipo_utilizador"]=="admin"){
        header("location: adminstracao/adminstrador.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LusoFlavors</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="../index.php"><span>Luso </span>Flavors</a>

        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">

        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Ola <?php echo htmlspecialchars($_SESSION["username"]); ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search" method="POST" action="../pesquisa.php">
        <div class="form-group">
            <input type="text" class="form-control"  name="pesquisar" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li><a href="client.php"><em class="fa fa-user">&nbsp;</em>Perfil</a></li>
        <li><a href="editar_util.php"><em class="fa fa-user-times">&nbsp;</em>Editar Perfil</a></li>
        <li><a href="minhas_receita.php"><em class="fa fa-list-alt">&nbsp;</em>Minhas Receitas</a></li>
        <li><a href="../carrinho.php"><em class="fa fa-shopping-cart">&nbsp;</em>Carrinho</a></li>
    </ul>
    <li><a href="../logout.php"><em class="fa fa-sign-out">&nbsp;</em> Sair</a></li>
</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Minha Conta</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dados Pessoais</h1>
        </div>
    </div><!--/.row-->


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
    else{ }









    /* estabelece a ligação à base de dados */
    require "../confi.php";

    /* definir o charset utilizado na ligação */
    $link->set_charset("utf8");

    $id=$_SESSION["id"];
    /* texto sql da consulta*/
    $editar = "SELECT * FROM utilizador  WHERE id = '$id' ";

    /* executar a consulta e testar se ocorreu erro */
    if (!$resultado = $link->query($editar)) {
        echo ' Falha na consulta: '. $link->error;
        $link->close();  /* fechar a ligação */
    }
    else{
    /* buscar os dados do registo */
    $row = $resultado->fetch_assoc();
    ?>


    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Dados Pessoais
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">

                    <form  action="editarCliente.php" method="post"  >
                        <fieldset>
                            <!-- Name input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Nome do Utilizador</label>
                                <div class="col-md-9">
                                    <input type="text" name="x_username" class="form-control"  value="<?=$row['username']?>" placeholder="login">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Nome Completo</label>
                                <div class="col-md-9">
                                    <input type="text" name="x_nome" class="form-control"  value="<?=$row['nome']?>" placeholder="Nome Completo">

                                </div>
                            </div>


                            <!-- Email input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Seu E-mail</label>
                                <div class="col-md-9">
                                    <input type="email" name="x_email" class="form-control"  value="<?=$row['email']?>" placeholder="email">
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="telefone">Telefone</label>
                                    <div class="col-md-9">
                                        <input type="text" name="x_telefone" class="form-control"  value="<?=$row['telefone']?>" placeholder="telefone">
                                    </div>
                                </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Morada</label>
                                <div class="col-md-9">
                                    <input type="text" name="x_morada" class="form-control"  value="<?=$row['morada']?>" placeholder="morada">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Localidade</label>
                                <div class="col-md-9">
                                    <input type="text" name="x_localidade" class="form-control" id="floatingInput" value="<?=$row['localidade']?>" placeholder="localidade">
                                </div>
                            </div>

                            <!-- Message body -->

                            <!-- Form actions -->
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Editar</button>
                            </div>
                        </fieldset>

                    </form>
                    <?php

                    $resultado->free();/* libertar o resultado */
                    $link->close();       /* close a ligação */
                    }

                    ?>
                </div>
            </div>

        </div>



      <!--/.col-->
        <div class="col-sm-12">
            <p class="back-link">Luso Flavors <a href="https://www.instagram.com/astar_stp" target="_blank">aSTAR</a></p>
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

</body>
</html>