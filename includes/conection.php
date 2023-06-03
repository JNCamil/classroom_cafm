<?php

$usuario = "cafm";
$password = "./wbeT8b/l8c@EpS";
#Setear los resultados de la base de datos en utf8 (tildes, ñ, ..)
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);

$bd = new PDO('mysql:dbname=classroom_cafm;host=localhost', $usuario, $password, $options);
#Excepciones para cuando ocurra un error
$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(!isset($_SESSION)){
    session_start();

}


?>