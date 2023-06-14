<?php 
$folderPath = '../public/docs/normativa';
$folders=scandir($folderPath);
natcasesort($folders);
echo '<div class="btn-group " aria-label="Default button group">';
foreach ($folders as $folder) {
    if(!is_dir($folder)){
    $folderName = basename($folder);
    $file = pathinfo($folderName, PATHINFO_FILENAME);
    //echo $file."<br>";
    echo '<button type="button" class="  btn btn-outline-danger btn-lg" onclick="showPdfTestN(\'' . $folderName . '\')" /><i class="fa-solid fa-folder"></i> '. $file.'</button>';
}
}
echo '</div>';

?>