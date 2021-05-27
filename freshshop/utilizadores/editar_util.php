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


<body>




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


<h6><?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){echo "Hi ";echo htmlspecialchars($_SESSION["username"]);
    }
    else{ echo "Conta";}?>
</h6>
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
</body>