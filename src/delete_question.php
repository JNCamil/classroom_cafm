<?php 
require_once ('../includes/conection.php');

if(isset($_SESSION['usuario']['id']) && isset($_GET['id'])){
    $entrada_id = $_GET['id'];
    $usuario_id = $_SESSION['usuario']['id'];

    $sql = "DELETE FROM entradas WHERE usuario_id=? AND id=?";

    try {
        $preparada = $bd->prepare($sql);
        $preparada->execute(array($usuario_id, $entrada_id));
    } catch (PDOException $e) {
        echo "Error al eliminar: " . $e->getMessage();
    }
    
}

header("Location:../index.php");

?>