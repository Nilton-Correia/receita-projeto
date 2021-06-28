<?php
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
require_once "functions/receita-funcao.php";
require_once "functions/cart.php";

$pdoConfig = require_once "confi.php";
$resultsCarts = getContentCart($pdoConfig);
$totalCarts = getTotalCart($pdoConfig);

?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<!-- End Cart -->

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
    <link rel="apple-touch-icon" href="images/logotipo.png">

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








<div class="row special-list">
    <?php

    $ids=$_POST['idreceita'];
    $receitas= "SELECT receita.*,categoria.*,pais.*  FROM receita INNER JOIN pais ON receita.idPais=pais.idPais INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria  WHERE idreceita IN (".$ids.")";

    foreach($receitas as $receit) :  ?>
        <?php $cat=$receit['nome_categoria'] ?>
        <div class="col-lg-3 col-md-6 special-grid <?php echo $cat?>">
            <div class="products-single fix">




                <div class="box-img-hover">
                    <div class="type-lb">
                        <p class="sale"><?php echo $cat?></p>
                    </div>
                    <?php echo '<img src="./images/'.$receit['imagens'].'" height="250px"/>' ?>

                    <div class="mask-icon">
                        <ul>
                            <li>
                                <?php if($receit['preco']!=0){echo" ";}else{
                                    echo '<a href="ver-receita.php?acao=add&id=' . $receit['idreceita'] . '" data-toggle="tooltip" data-placement="right" title="View" ><i class="fas fa-eye"></i></a>';} ?> </li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                        </ul>

                        <?php if($receit['preco']!=0){ ?><a class="cart" href="carrinho.php?acao=add&id=<?php
                        if($receit['preco']!=0) echo $receit['idreceita']?>" class="card-link">Adicionar ao carrinho</a><?php } ?>

                    </div>

                </div>
                <div class="why-text">

                    <h4> <?php if($receit['preco']!=0){echo $receit['nome'];}else{
                            echo '<a href="ver-receita.php?acao=add&id=' . $receit['idreceita'] . '">' . $receit['nome'] . '</a>';} ?></h4>


                    <h5 class="card-subtitle m-2 text text-muted">
                        <?php
                        if(($receit['preco']!=0)){ echo number_format($receit['preco'], 2, ',', '.');echo "€";}else{echo"gratis";} ?></h5>
                </div>

            </div>

        </div>
    <?php endforeach;?>

</div>













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


<!-- Start Footer  -->
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








