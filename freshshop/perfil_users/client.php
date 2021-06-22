
<?php
require("../confi.php");
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["tipo_utilizador"]=="admin"){
        header("location: adminstracao/adminstrador.php");
    }
}
require_once "../confi.php";

// Definir variaveis e iniciar com valor vazio
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["bt"]=="submeter"){

    // Validar new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Por favor entre com nova password.";
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password tem que ter  6 caracteres.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Validar  confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password não combina.";
        }
    }

    // Verifique os erros de entrada antes de atualizar a base de dados
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE utilizador SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Vincular variáveis  instrução preparada como parâmetros
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Definir parâmetros
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Tente executar a declaração preparada
            if(mysqli_stmt_execute($stmt)){
                // Senha atualizada com sucesso. Destrua a sessão e redirecione para a página de login
                session_destroy();
                header("location: ../login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Fechar declaração
        mysqli_stmt_close($stmt);
    }
}
// Fecha coneção

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
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
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

        <li><a href="editar_util.php"><em class="fa fa-product-hunt">&nbsp;</em>Editar Perfil</a></li>
        <li><a href="editar_util.php"><em class="fa fa-rotate-right">&nbsp;</em>Minhas Receitas</a></li>
        <li><a href="../carrinh.php"><em class="fa fa-rotate-right">&nbsp;</em>Carrinho</a></li>
    </ul>
    <li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Sair</a></li>
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

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Dados Pessoais
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="editarCliente.php" method="post"  name="formContato">
                        <fieldset>
                            <!-- Name input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Login</label>
                                <div class="col-md-9">
                                    <div  class="form-control"><?php echo"$username" ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Nome Completo</label>
                                <div class="col-md-9">
                                    <div   class="form-control"><?php echo"$nome" ?></div>

                                </div>
                            </div>


                            <!-- Email input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Seu E-mail</label>
                                <div class="col-md-9">
                                    <div  class="form-control"><?php echo"$email" ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Morada</label>
                                <div class="col-md-9">
                                    <div class="form-control">  <?php echo"$morada" ?> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Localidade</label>
                                <div class="col-md-9">
                                    <div class="form-control">  <?php echo"$localidade" ?> </div>
                                </div>
                            </div>

                            <!-- Message body -->

                            <!-- Form actions -->
                            <div class="form-group">
                                <a class="btn btn-link" href="editar_util.php">editar</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

        </div>



        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Alterar Palavra Passe
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                            <label>Nova Palavra Passe</label>
                            <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                            <span class="help-block"><?php echo $new_password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Confirmar Palavra Passe</label>
                            <input type="password" name="confirm_password" class="form-control">
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="bt" class="btn btn-primary" value="submeter">
                            <a class="btn btn-link" href="client.php">Cancelar</a>
                        </div>
                    </form>
                </div>

            </div>
        </div><!--/.col-->
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