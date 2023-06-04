<?php 

session_start(); //Indicamos cuál es la sesión que queremos cerrar
session_destroy();
header("location:../login.php");

?>