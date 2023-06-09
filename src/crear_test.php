
<?php require_once ("../includes/conection.php") ?>
<?php


    $opciones = $_POST["opciones"];

   // $opciones=json_decode($opcionesSeleccionadas);
    $consulta="select * from tests where ";
    //ORDER BY RAND() LIMIT 5"

    $valores=array();
    foreach ($opciones as $opcion) {
      $consulta .= " type=? OR ";
      $valores[]=$opcion;
    }
    $consulta = rtrim($consulta, " OR ") . "ORDER BY RAND() LIMIT 5;";


$preparada = $bd->prepare($consulta);
$preparada->execute($valores);
$respuesta = $preparada->fetchAll();

echo json_encode($respuesta);


?>