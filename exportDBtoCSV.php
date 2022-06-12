<?php
$filename = 'historical_data.csv';
$exportData = unserialize($_POST['export_data']);

$file = fopen($filename, 'w');

foreach ($exportData as $line) {
    fputcsv($file, $line);
}

fclose($file);

// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/csv; "); 

readfile($filename);

// deleting file
unlink($filename);
exit();

// if (isset($_POST['submit'])) {
//     $link = mysqli_connect("localhost", "root", "", "vat_1");
 
//     // Check connection
//     if($link === false){
//         die("ERROR: Could not connect. " . mysqli_connect_error());
//     }

// }