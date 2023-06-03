<?php 

if(isset($_POST)){
    require_once "../includes/conection.php";
    // Escapa los caracteres especiales
    // $valor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
    /*
    Es importante tener en cuenta que al utilizar htmlspecialchars, el valor ingresado en el input será modificado para escapar los caracteres especiales. Por lo tanto, si necesitas utilizar el valor original en otro contexto, como en un archivo de texto o en un correo electrónico, deberás guardar el valor original en una variable separada antes de escaparlo con htmlspecialchars.
    POR LO QUE SERÍA RECOMENDABLE GUARDAR LA VARIABLE ORIGINAL en la primera línea:
    $nombre_original=isset($_POST["nombre"]) ? $_POST["nombre"] : false;
    */

    $titulo=isset($_POST["titulo"])? htmlspecialchars($_POST["titulo"], ENT_QUOTES, 'UTF-8'):false;
    $descripcion=isset($_POST["descripcion"])? htmlspecialchars($_POST["descripcion"], ENT_QUOTES, 'UTF-8'):false;
    $categoria=isset($_POST["categoria"])? (int)$_POST["categoria"]:false;
    $usuario= $_SESSION["usuario"]["id"];

    //Errores
    $errores = array();
     //Validación
    //titulo
    if (empty($titulo)) {
        $errores['titulo'] = "El título no es válido";
    }
    if (empty($descripcion)) {
        $errores['descripcion'] = "La descripción no es válida";
    }
    if (empty($categoria) && !is_numeric($categoria)) {
        $errores['categoria'] = "La categoría no es válida";
    }

    if(count($errores)==0){
        $fecha_actual = date("Y-m-d H:i:s"); #formato YYYY-MM-DD HH:mm:ss

        if(isset($_GET['editar'])){ //FLAG DESDE URL
        $entrada_id=$_GET['editar'];
        $preparada=$bd->prepare("update entradas SET titulo=?, descripcion=?, categoria_id=? where id=?");
        $preparada->execute(array($titulo,$descripcion,$categoria,$entrada_id));

        }else{
        $preparada=$bd->prepare("insert into entradas (usuario_id,categoria_id,titulo,descripcion,fecha) values (?,?,?,?,?)");
        $preparada->execute(array($usuario,$categoria,$titulo,$descripcion,$fecha_actual));
        }
  
        header("Location: ../index.php");

        
    }else{
        $_SESSION["errores_entrada"]=$errores;
        //Si estamos editando y hay un error en EDITAR ENTRADA
        if(isset($_GET['editar'])){
           header("Location:editar_entrada.php?id=".$_GET['editar']);
        }else{
            //SI ESTAMOS EN CREAR PREGUNTA
            header("Location:../create_question.php");

        }
        
    }

    
}
?>