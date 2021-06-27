<?php
session_start();
require ("confi.php");

    if($_SESSION["loggedin"] == true ) {

    }else{
        header("location: login.php");
    }


/* if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
require_once "functions/receita-funcao.php";
require_once "functions/cart.php";

$pdoConfig = require_once "confi.php";
$products = getProductos($pdoConfig);
$resultsCarts = getContentCart($pdoConfig);
$totalCarts = getTotalCart($pdoConfig);
*/
ini_set ('display_errors', 1);

$i=$total=0;
$abc="";
foreach ($_SESSION['cart'] as $id => $qtd) {

    $sql = "SELECT *  FROM receita WHERE idreceita= $id";

    $resultado = $link->query($sql);
    $re = $resultado->fetch_assoc();
    $total += $re['preco'] * $qtd;
    $nome = $re['nome'];
    $preco = $re['preco'];
    $abc .="[".$qtd . " " . $nome . "," . " Por: " . $preco."] ";

}        if($_POST) {
    include("./PHPMailer-master/PHPMailer-master/src/PHPMailer.php");
    include("./PHPMailer-master/PHPMailer-master/src/SMTP.php");
    include("./PHPMailer-master/PHPMailer-master/src/OAuth.php");
    include("./PHPMailer-master/PHPMailer-master/src/Exception.php");
    if ($_POST['paymentMethod'] == 1) {
        $pagamento = "Multibanco";
    } else {
        $pagamento = "Transferencia";
    }

    $mailDestino = 'lusoflavors@gmail.com';
    $nome = 'Luso Flavors Adminstracao';
    $assunto = "Mensagem recebida do site";
    $mensagem = "Recebemos uma Encomenda no site <br/>
 
 <strong>E-mail:</strong>$_POST[email] <br/>
 <strong>Pagamento:</strong>$pagamento <br/>
 <strong>Receita:</strong> $abc <br/>
 <strong>Total:</strong> $total <br/>

 ";
    $utilizador = $_SESSION['username'];
    if (empty($nome)) {
        echo "Todos os campos do formulário devem conter valoresss ";

    } else {
        require_once("confi.php");
        $pag = $_POST['paymentMethod'];

        /* texto sql da sql*/
        $consulta = "INSERT INTO receita_encomenda (preco, nome_receita, utilizador_id, pagamento_idpagamento, data_criacao) VALUES ($total,'$abc', '$utilizador', $pag, Now())";
        /* executar a sql e testar se ocorreu erro */
        if (!$link->query($consulta)) {
            echo " ERRO - Falha ao executar a sql: \"$consulta\" <br>" . $link->error;
            $link->close();  /* fechar a ligação */
        } else {


        }


    }

    include("enviar_email.php");

    $mailDestino = $_POST['email'];
    $nome = 'Suporte LusoFlavors';
    $assunto = "Receita Registrada";
    $mensagem = "O Seu Pedido Foi Registado aguardamos o Seu Pagamento <br/>
 
 <strong>Nome: </strong>$utilizador<br/>
 <strong>Receita:</strong> $abc <br/>
  <strong>Informações de Pagamento:</strong>$pagamento <br/>
 <strong>Entidade:</strong>1435352 <br/>
 <strong>Referencia:</strong>3253363636<br/>
 <strong>Total:</strong> $total <br/>
 
 ";
    include("enviar_email.php");
    header("location: index.php");
}

?>


<!DOCTYPE html>
<html lang="pt">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>LusoFlavors</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logotipo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- Start Main Top -->
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
    <div class="container">
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.php"><img src="images/logotipo.png" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                <li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="html/about.html">Sobre Nós</a></li>

                <li class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Receita País</a>
                    <ul class="dropdown-menu">
                        <li><a href="saotome_principe.php">São Tomé</a></li>
                        <li><a href="angola.php">Angola</a></li>
                        <li><a href="portugal.php">Portugal</a></li>
                        <li><a href="cabo_verde.php">Cabo Verde</a></li>
                        <li><a href="mocambique.php">Moçambique</a></li>
                        <li><a href="guine_bissau.php">Giné Bissau</a></li>
                        <li><a href="guine-equatorial.php">Guiné Equatorial</a></li>
                        <li><a href="timor_leste.php">Timor-Leste</a></li>
                        <li><a href="brazil.php">Brasil</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="contacto.php">Contacte nos</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->

        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul>
                <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                <li class="side-menu">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <span class="qty"><?php echo count($_SESSION['cart'])?></span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
    <div class="side-menu">
        <ul>
            <li><a href="login.php"><i class="fa fa-user s_color"></i>

                    <span><?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){echo "Hi ";echo htmlspecialchars($_SESSION["username"]);
                        }
                        else{ echo "Conta";}?> </span>
                </a></li>
        </ul>
    </div>
    <!-- End Atribute Navigation -->

    <!-- Start Side Menu -->

    <!-- Start Side Menu -->



    <div class="side">
        <a href="#" class="close-side"><i class="fa fa-times"></i></a>
        <li class="cart-box">
            <?php foreach($resultsCarts as $resultado) : ?>
                <ul class="cart-list">
                    <li>
                        <a href="ver-receita.php?acao=add&id=" class="photo"><?php echo '<img src="./images/'.$resultado['imagens'].'" height="250px"/>' ?></a>
                        <h6><?php echo '<a href="ver-receita.php?acao=add&id=' . $resultado['idreceita'] . '">' . $resultado['nome'] . '</a>'; ?></h6>

                        <p>
                                <span class="price">
                                  <?php
                                  if(($resultado['preco']!=0)){ echo number_format($resultado['preco'], 2, ',', '.');echo "€";}else{echo"gratis";} ?>
                                </span>

                        </p>
                    </li>

                    <li class="total">
                        <a href="carrinho.php" class="btn btn-default hvr-hover btn-cart">ver carrinho</a>
                        <span class="float-right"><strong>Total</strong><?php echo number_format($totalCarts, 2, ',', '.')?>€</span>
                    </li>
                </ul>
            <?php endforeach;?>
        </li>
    </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Finalizar Compra</h2>

            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Dados de Pagamentos</h3>
                    </div>

                    <form class="needs-validation" method="post">

                        <div class="row">

                        </div>

                        <div class="mb-3">
                            <label for="email">Introduza o seu Email*</label>
                            <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                            <div class="invalid-feedback">Por Favor coloque o seu email </div>
                        </div>

                        <div class="title"> <span>Pagamento</span> </div>
                        <div class="d-block my-3">

                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="2" required>
                                <label class="custom-control-label" for="debit">Transferencia</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" value="1" required>
                                <label class="custom-control-label" for="paypal">Multibanco</label>
                            </div>
                        </div>


                </div>
            </div>



            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="row">

                    <?php
                    if(count($_SESSION['cart']) == 0){
                        echo '
        <tr>
          <td colspan="5">carrinho vazio</td>
        </tr>
      ';
                    } else {
                    require_once("./confi.php");
                    $total=0;
                    foreach($_SESSION['cart'] as $id => $qtd) {
                      /* comando para selecionar receita na base de dados*/
                    $sql = "SELECT *  FROM receita WHERE idreceita= $id";

                    $resultado = $link->query($sql);
                    $re = $resultado->fetch_assoc();
                    $total += $re['preco'] * $qtd;
                    ?>

                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Detalhes do pedido</h3>
                            </div>
                            <div class="d-flex">
                                <div class="font-weight-bold">Receita</div>
                                <div class="ml-auto font-weight-bold">Total</div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4><?php echo ''.$re['nome'].'';?></h4>
                                <div class="ml-auto font-weight-bold"><?php echo ''.$re['preco'].'';?>&nbsp;Euros</div>
                            </div>

                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Total</h5>
                                <div class="ml-auto h5"><?php echo $total; ?>&nbsp;Euros</div>
                            </div>
                            <hr> </div>
                    </div>

                    <div class="col-12 d-flex shopping-box">
                        <button class="ml-auto btn hvr-hover" id="submit" type="submit">Finalizar</button>
                    </div>

                </div>
                <?php
                }
                }
                ?>
            </div>

            </form>

        </div>

    </div>
</div>
<!-- End Cart -->

<!-- Start Instagram Feed  -->
<div class="instagram-box">
    <div class="main-instagram owl-carousel owl-theme">
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-01.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-02.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-03.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-04.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-05.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-06.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-07.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-08.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-09.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-05.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Instagram Feed  -->


<footer>
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-top-box">


                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-top-box">
                        <h3>Newsletter</h3>
                        <form action="" method="post" class="newsletter-box">
                            <div class="form-group">
                                <input class="" type="email" name="mail" placeholder="Email Address*" />
                                <i class="fa fa-envelope"></i>
                            </div>
                            <button class="btn hvr-hover" type="submit">Submit</button>

                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-top-box">

                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-widget">
                        <h4>Sobre Luso Flavors</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link-contact">
                        <h4>Contacto</h4>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: Rua Camilo Castelo Branco <br>Bragança,<br> 5300-106 </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:lusoflavors@gmail.com">lusoflavors@gmail.com</a></p>
                            </li>
                        </ul>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link">
                        <h4>Informações</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer  -->

<!-- Start copyright  -->

<!-- End copyright  -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="js/jquery.superslides.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/inewsticker.js"></script>
<script src="js/bootsnav.js"></script>
<script src="js/images-loded.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/baguetteBox.min.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.js"></script>
<script src="js/custom.js"></script>

</body>

</html>