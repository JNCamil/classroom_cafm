
<?php require_once ('../includes/conection.php'); ?>


<?php 
$preparada = $bd->prepare("SELECT DISTINCT type FROM tests ORDER BY CAST(REGEXP_REPLACE(type, '[^0-9]', '') AS UNSIGNED), type");
$preparada->execute();
$filas = $preparada->fetchAll(PDO::FETCH_ASSOC);

echo '<div class="scrollable-body" style="max-height: 550px; overflow-y: auto;">';
echo '<div class="form-group">';
echo '<form class="text-start" method="post" id="miForm">';

foreach ($filas as $fila) {
  $checkboxId = uniqid('checkbox_');
  echo '<div class="form-check">';
  echo '<input class="form-check-input border-danger p-2" type="checkbox" id="' . $checkboxId . '" name="opciones[]" value="' . $fila['type'] . '">';
  echo '<label class="form-check-label fs-5" for="' . $checkboxId . '">' . $fila['type'] . '</label>';
  echo '</div>';
}

echo '<button type="button" class="btn btn-danger btn-lg my-3" onclick="empezarCrear()">Crear TEST</button>';
echo '</form>';
echo '</div>';
echo '</div>';


// foreach ($filas as $fila) {
//     $type = $fila['type'];
    
//     if (preg_match('/^Regla\d+$/', $type)) {
//         echo '<button type="button" class="text-start mb-3 px-5  btn btn-outline-danger btn-lg" onclick="showPdfTest(\'' . $type . '.pdf\')" /><i class="fa-solid fa-folder"></i> '. $type.'</button>';
//     }
//   }
  
/*
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["opciones"])) {
    $opcionesSeleccionadas = $_POST["opciones"];

    // Procesar las opciones seleccionadas
    foreach ($opcionesSeleccionadas as $opcion) {
      // Realizar acciones con cada opción seleccionada
      echo "Opción seleccionada: " . $opcion . "<br>";
    }
  } else {
    echo "No se seleccionaron opciones.";
  }
}
?>
*/


?>