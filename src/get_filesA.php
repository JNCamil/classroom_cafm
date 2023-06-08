<?php 
$folderPath = '../public/docs/actas'; // Ruta de la carpeta donde se encuentran los documentos PDF
//$folders = array_filter(glob($folderPath . '/*'), 'is_dir'); // Obtener lista de carpetas
$folders=scandir($folderPath);
// Ordenar los nombres de archivos de forma natural
natcasesort($folders);
echo '<div class="btn-group " aria-label="Default button group">';
foreach ($folders as $folder) {
    if(!is_dir($folder)){
    $folderName = basename($folder);
    $file = pathinfo($folderName, PATHINFO_FILENAME);
    //echo $file."<br>";
    echo '<button type="button" class=" p-3 btn btn-outline-danger btn-lg" onclick="showPdfTestA(\'' . $folderName . '\')" /><i class="fa-solid fa-folder"></i> '. $file.'</button>';
}
}
echo '</div>';

?>