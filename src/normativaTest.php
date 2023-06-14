<?php require_once("../includes/conection.php") ?>
<?php
$file = pathinfo($_POST['regla'], PATHINFO_FILENAME);
$preparada = $bd->prepare('SELECT * FROM tests WHERE type = ? ORDER BY RAND() LIMIT 5');
$preparada->execute(array($file));
$respuesta = $preparada->fetchAll();

echo json_encode($respuesta);

?>