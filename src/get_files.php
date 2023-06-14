<?php
$folderPath = '../public/docs/reglas'; 
$folders=scandir($folderPath);
// Ordenar los nombres de archivos de forma natural
natcasesort($folders);
echo '<div class="scrollable-body" style="max-height: 550px; overflow-y: auto;">';
echo '<div class="btn-group-vertical" aria-label="Vertical button group" >';
foreach ($folders as $folder) {
    if(!is_dir($folder)){
    $folderName = basename($folder);
    $file = pathinfo($folderName, PATHINFO_FILENAME);
    echo '<button type="button" class="text-start mb-3 px-5  btn btn-outline-danger btn-lg" onclick="showPdfTest(\'' . $folderName . '\')" /><i class="fa-solid fa-folder"></i> '. $file.'</button>';
}
}
echo '</div>';
echo '</div>';
/*
Para mostrar el nombre de un archivo PDF sin mostrar su extensión en PHP, puedes utilizar la función pathinfo() con el argumento PATHINFO_FILENAME. 
if (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') //Comprobar extensión
*/

/*
La función basename() en PHP se utiliza para obtener el nombre base de una ruta o una URL. Toma una cadena que representa una ruta o una URL como argumento y devuelve el último componente de esa ruta, es decir, el nombre del archivo o carpeta sin la ruta completa.
$path = '/ruta/a/mi/archivo.txt';
$filename = basename($path);
echo $filename; // Salida: archivo.txt
También URL:
$url = 'https://www.ejemplo.com/carpeta/archivo.pdf';
$filename = basename($url);
echo $filename; // Salida: archivo.pdf
*/

?>
