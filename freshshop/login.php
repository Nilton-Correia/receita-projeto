<?php
// Initialize the session
session_start();

// Check if the perfil_users is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["tipo_utilizador"]== "admin") {
        header("location: ./adminstracao/adminstrador.php");
    }else{
        header("location: ./perfil_users/client.php");
    }

}

// Check if the perfil_users is
if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = array();
}
// Include config file
require_once "confi.php";

// Define variables and initialize with empty values
$username  = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Digite o nome de utilizador.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor, insira sua senha.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT utilizador.id, username, password, tipo FROM utilizador  inner join tipo_utilizador on utilizador.id_tipo = tipo_utilizador.id_tipo  WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $tipo);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["tipo_utilizador"] = $tipo;
                            $_SESSION["username"] = $username;

                            // Redirect perfil_users to welcome page
                            if($tipo=="admin") {

                                header("location: ./adminstracao/adminstrador.php");
                            }else{
                                header("location: ./perfil_users/client.php");
                            }

                        }


                        else{
                            // Display an error message if password is not valid
                            $password_err = "A senha que você digitou não era válida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Nenhuma conta encontrada com esse nome de utilizador.";
                }
            } else{
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
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
                <div class="input-field  <?php echo (!empty($username_err)) ? 'erro no utilizador' : '';?>">
                    <input placeholder="Nome de utilizador" id="<?php echo $username; ?>" name="username" type="text" class="validate">
                    <span class=" help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="input-field mb-5 <?php echo (!empty($password_err)) ? 'erro no password' : '';?>">
                    <input placeholder="Password" id="<?php echo $password; ?>" name="password" type="password" class="validate">
                    <span class="help-block "><?php echo $password_err; ?></span>
                </div>
                <div class="tm-flex-lr">
                    <a href="resert-password.php" class="white-text small">Esqueceste a tua palavra passe</a>
                    <button type="submit" class="waves-effect btn-large btn-large-white px-4 black-text ">Entrar</button>
                </div>
            </form>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 tm-login-r">
            <header class="font-weight-light tm-bg-black p-5 h-100">
                <h3 class="mt-0 text-white font-weight-light"><a href="index.php">LusoFlavors</a></h3>

                <div class="row">
                    <h6 class="yellow_color">Ainda não tens conta? crie aqui</h6>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 ml-auto mr-0 text-center">
                        <a href="registar.php" class="waves-effect btn-large btn-large-white px-4 black-text ">Criar Conta</a>
                    </div>
                </div>

            </header>
        </div>
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


