<?php
session_start();
// Include config file
require_once("confi.php");
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();

}
// Define variables and initialize with empty values
$username =  $password  = $nome = $email = $confirm_password = "";
$username_err = $password_err = $nome_err = $email_err = $confirm_password_err = "";



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
                /* store resultado */
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
                /* store resultado */
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
                /* store resultado */
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
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($email_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO utilizador (username, password, nome, email) VALUES (?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_nome, $param_email);

            // Set parameters

            $param_username = $username;
            $param_nome = $nome;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
<!-- End Cart -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form by Tooplate</title>
    <!--
    Template 2105 Input
    http://www.tooplate.com/view/2105-input
    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="login">
<div class="container">
    <div class="row tm-register-row tm-mb-35">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 tm-login-l">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="tm-bg-black p-5 h-100">

                <div class="input-field <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <input placeholder="Nome do Utilizador" id="<?php echo $username; ?>"  name="username" type="text" class="validate">
                </div>

                <div class="input-field<?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
                    <input placeholder="Nome Completo" id="<?php echo $nome; ?>"  name="nome" type="text" class="validate">
                </div>

                <div class="input-field <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <input placeholder="E-mail" id="email" name="email"   type="email" class="validate">
                </div>

                <div class="input-field mb-5 <?php echo (!empty($password_err)) ? 'erro no password' : '';?>">
                    <input placeholder="Password" id="<?php echo $password; ?>" name="password" type="password" class="validate">

                </div>
                <div class="input-field mb-5 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <input placeholder="Confirmar Password" id="<?php echo $confirm_password; ?>" name="confirm_password" type="password" class="validate">

                </div>

                <div class="tm-flex-lr">


                    <button type="submit" class="waves-effect btn-large btn-large-white px-4 black-text ">Registar</button>
                </div>
            </form>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 tm-login-r">
            <header class="font-weight-light tm-bg-black p-5 h-100">
                <h3 class="mt-0 text-white font-weight-light"><a href="index.php">LusoFlavors</a></h3>

                <h6 class="yellow_color">Se já tens conta inicia sessão aqui</h6>
                <div class="tm-flex-lr">

                    <a href="login.php" class="waves-effect btn-large btn-large-white px-4 black-text">Iniciar sessação</a>
                    <div type="submit" class=""></div>
                </div>

            </header>
        </div>
    </div>

    <div class="row">


    </div>
    <footer class="row tm-mt-big mb-3">
        <div class="col-xl-12 text-center">
            <p class="d-inline-block tm-bg-black white-text py-2 tm-px-5">
                Copyright &copy; 2018 Company Name

                - <a rel="nofollow" href="http://www.tooplate.com/view/2105-input">Input</a> by
                <a rel="nofollow" href="http://tooplate.com" class="tm-footer-link">Tooplate</a>
            </p>
        </div>
    </footer>
</div>

<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>
</body>

