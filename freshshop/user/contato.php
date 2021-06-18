<html lang="pt-br">
<head>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Minha Conta</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
</head>

<body>

    <?php
    if ($_POST && $_POST['txtEmail']!="")
    {
        //Carrega as classes do PHPMailer
        include("../phpmailer/src/PHPMailer.php");
        include("../phpmailer/src/SMTP.php");
        include("../phpmailer/src/OAuth.php");
        include("../phpmailer/src/Exception.php");
        $mailDestino = $_POST['txtEmail'];
        $mailDestino = $_POST['txtEmail'];
        $nome = $_POST['txtNome'];
        $mensagem = "Obrigado pelo seu contato, responderemos ASAP!";
        $assunto = "Obrigado pelo seu contato!";
        //envia o e-mail para o visitante do site
        include("../envio.php");

        //envia o e-mail para o administrador do site
        $mailDestino = 'edimilsondias14@live.com.pt';
        $nome = 'Administrador TEC';
        $assunto = "Mensagem recebida do site";
        $mensagem = "Recebemos uma mensagem no site <br/>
 <strong>Nome:</strong> $_POST[txtNome]<br/>
 <strong>e-mail:</strong> $_POST[txtEmail]<br/>
 <strong>mensagem:</strong> $_POST[txtMensagem]";
        include("../envio.php");
    }
    ?>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Contacte-nos
                <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post"  name="formContato">
                    <fieldset>
                        <!-- Name input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">Nome</label>
                            <div class="col-md-9">
                                <input id="name" name="txtNome" type="text" placeholder="Nome" class="form-control">
                            </div>
                        </div>

                        <!-- Email input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">Seu E-mail</label>
                            <div class="col-md-9">
                                <input id="email" name="txtEmail" type="email" placeholder="Seu email" class="form-control">
                            </div>
                        </div>

                        <!-- Message body -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="message">Sua mensagem</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="message" name="txtMensagem" placeholder="Escreva sua mensagem aqui..." rows="5"></textarea>
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 widget-right">
                                <button type="submit" name="bt" class="btn btn-default btn-md pull-right">Enviar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div><!--/.col-->
</body>
</html>