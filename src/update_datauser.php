<?php

if (isset($_POST['modificar'])) {
    require_once("../includes/conection.php");


    $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST["nombre"], ENT_QUOTES, 'UTF-8') : false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    $email = isset($_POST['email']) ? trim($_POST['email']) : false;


    //Errores
    $errores = array();


    //Validación
    //nombre
    if (!empty($nombre) && is_string($nombre) && !preg_match("/[0-9]+/", $nombre)) {
        $nombre_valido = true;

    } else {
        $nombre_valido = false;
        $errores['nombre'] = "El nombre no es válido";
    }
    //Apellidos
    if (!empty($apellidos) && is_string($apellidos) && !preg_match("/[0-9]+/", $apellidos)) {
        $apellidos_valido = true;

    } else {
        $apellidos_valido = false;
        $errores['apellidos'] = "El apellido no es válido";
    }
    //Email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_valido = true;

    } else {
        $email_valido = false;
        $errores['email'] = "El email no es válido";
    }


    $guardar_usuario = false;

    if (empty($errores)) {
        $guardar_usuario = true;
        $id = $_SESSION["usuario"]["id"];
        //COMPROBAR SI EMAIL YA EXISTE, ya que al ser unique, tirará un PDOException
        $preparadaEmail = $bd->prepare("select id, email from usuarios where email=?");
        $preparadaEmail->execute(array($email));
        $filaEmail=$preparadaEmail->fetch(PDO::FETCH_ASSOC);

        if ($filaEmail["id"]==$id || empty($filaEmail)) {  //empty comprueba un rowcount() == 0
            $preparada = $bd->prepare("update usuarios set nombre=?, apellidos=?, email=? where id=?");
            if ($preparada->execute(array($nombre, $apellidos, $email, $id))) {

                //Se actualizan los datos para el usuario

                $_SESSION["usuario"]["nombre"] = $nombre;
                $_SESSION["usuario"]["apellidos"] = $apellidos;
                $_SESSION["usuario"]["email"] = $email;
                $_SESSION["completado"] = "Tus datos se han actualizado con éxito";
            } else {
                $_SESSION["errores"]["general"] = "Fallo al actualizar tus datos";
                //No captura PDOException, más abajo cómo

            }

        }else{
            $_SESSION["errores"]["general"] = "El email ya existe";
        }




    } else {
        $_SESSION["errores"] = $errores;


    }
    header("Location:../data_user.php");
    // if(count($errores)==0){
    //     echo"USUARIO VÁLIDO";
    // }

    /*
    try {
    $stmt = $pdo->prepare("UPDATE usuarios SET nombre = ?, apellidos = ?, email = ? WHERE id = ?");
    $stmt->execute([$nombre, $apellidos, $email, $id]);
    $_SESSION["exito"] = "El usuario se ha actualizado correctamente.";
    } catch (PDOException $e) {
    $_SESSION["errores"]["general"] = "Error al actualizar el usuario: " . $e->getMessage();
    }*/
}



?>