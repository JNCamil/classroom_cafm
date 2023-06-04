<?php
$folderPath = '../public/docs/reglas'; // Ruta de la carpeta donde se encuentran los documentos PDF
//$folders = array_filter(glob($folderPath . '/*'), 'is_dir'); // Obtener lista de carpetas
$folders=scandir($folderPath);
// Ordenar los nombres de archivos de forma natural
natcasesort($folders);
echo '<div class="btn-group  d-grid gap-2 d-sm-flex flex-sm-wrap" aria-label="Default button group">';
foreach ($folders as $folder) {
    if(!is_dir($folder)){
    $folderName = basename($folder);
    $file = pathinfo($folderName, PATHINFO_FILENAME);
    //echo $file."<br>";
    echo '<button type="button" class="mb-3  btn btn-outline-danger flex-grow-1 flex-sm-grow-0" onclick="showPdfTest(\'' . $folderName . '\')" /><i class="fa-solid fa-folder"></i> '. $file.'</button>';
}
}
echo '</div>';
/*
Para mostrar el nombre de un archivo PDF sin mostrar su extensión en PHP, puedes utilizar la función pathinfo() con el argumento PATHINFO_FILENAME. 
if (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') //Comprobar extensión
*/

/*
la función scandir() para obtener la lista de archivos en la carpeta docs. Sin embargo, esto también incluirá los archivos ocultos y los elementos de directorio "." y "..". Puedes filtrarlos usando un condicional para asegurarte de que solo se muestren los archivos PDF
$files = array_diff(scandir($folderPath), array('.', '..', '.DS_Store')); // Obtener lista de archivos PDF


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
