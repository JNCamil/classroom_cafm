<?php
if (isset($_POST['login'])) {
    require_once("../includes/conection.php");
    $email = trim($_POST["email"]);
    $pass = $_POST["password"];
    $resultado = $bd->prepare("select * from usuarios where email=?");
    $resultado->execute(array($email));
    $numero_registro = $resultado->rowCount(); 
    if ($numero_registro != 0) {
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        $verify = password_verify($pass, $fila["password"]);
        if ($verify) {
            $_SESSION["usuario"] = $fila;
            header("Location:../index.php");
        } else {
            $_SESSION["errores"]["login"] = "Contraseña incorrecta";
            header("Location:../login.php");
        }
    } else {
        $_SESSION["errores"]["login"] = "Usuario no identificado";
        header("Location:../login.php");
    }
}

?>