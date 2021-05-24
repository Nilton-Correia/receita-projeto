<?php
//Dados do banco de dados
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_PORT',3306);
define('DB_NAME', 'site-receita');


$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_NAME, DB_PORT);

// Check connection
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());
}

return new PDO(sprintf("mysql:host=%s;dbname=%s", DB_SERVER, DB_NAME), DB_USERNAME, DB_PASSWORD,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

?>
