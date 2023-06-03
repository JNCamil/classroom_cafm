<?php 
if (isset($_POST['login'])) {
    require_once("../includes/conection.php");
    $email=trim($_POST["email"]);
    $pass=$_POST["password"];


    $resultado = $bd->prepare( "select * from usuarios where email=?");


    $resultado->execute(array($email));

    $numero_registro = $resultado->rowCount(); //0 FALSE

    if ($numero_registro != 0) {
        $fila=$resultado->fetch(PDO::FETCH_ASSOC);
        //COMPROBAR CONTRASEÑA:
        $verify=password_verify($pass, $fila["password"]);

        if($verify){
            
            $_SESSION["usuario"] = $fila;

            // if(isset($_SESSION["errores"]["login"])){//Si hay errores que los borre
            //     unset($_SESSION["errores"]["login"]);
            // }
            header("Location:../index.php");
        }else{
            $_SESSION["errores"]["login"]="Contraseña incorrecta";
        }  

    } else {

        $_SESSION["errores"]["login"]="Usuario no identificado";
        header("Location:../login.php");

    }
    //header("Location:../index.php");
}

?>