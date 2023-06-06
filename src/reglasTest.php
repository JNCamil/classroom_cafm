
<?php require_once ("../includes/conection.php") ?>
<?php
$file = pathinfo($_POST['regla'], PATHINFO_FILENAME);
$preparada = $bd->prepare('SELECT * FROM tests WHERE type = ? ORDER BY RAND() LIMIT 5');
$preparada->execute(array($file));
$respuesta = $preparada->fetchAll();

echo json_encode($respuesta);

//SHUFFLE**********************************
// $preparada=$bd->prepare('select count(cod) from tests where type=?'); // order by rand() limit 5
// $preparada->execute(array($file));
// $max=$preparada->fetch()['count(cod)'];

// $numeros=array();
// $aleatorios=array();
// for($i=1;$i<=$max;$i++){
//     $numeros[]=$i;}
// for($i=0;$i<5;$i++){ // array_shuffle
//     $r=random_int(0,count($numeros)-1);
//     $aleatorios[]=$numeros[$r];
//     unset($numeros[$r]);
//     $numeros=array_values($numeros);}

// $respuesta=array();
// foreach($aleatorios as $cod){
//     $preparada=$bd->prepare('select * from tests where cod=? ');
//     $preparada->execute(array($cod));
//     $respuesta[]=$preparada->fetch();}

// echo json_encode($respuesta);
?>