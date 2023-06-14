
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
/*
se generaron los checkboxes utilizando un bucle foreach y se asignó un identificador único a cada checkbox utilizando la función uniqid para evitar conflictos*/
?>