<?php

$user = "root"; 
$password = ""; 
$host = "localhost"; 
$database = "vat_1";

$link = mysqli_connect($host, $user, $password, $database);

if ($link === false) {
    die('Connection Error: Could not connect.' . mysqli_connect_error());
}

echo 'Connected to MariaDB vat_1, successfully' . mysqli_get_host_info($link);


$vat = 1.2;
// $R = $vat; // Rate: as requested in test specs
$exVat = '';
// $V = $exVat; // excl. VAT: as requested in test specs
$incVat = '';
$valueAdded = '';
$valueNotAdded = '';

print_r($valueAdded);

// prepare insert stmt
$sql = "insert into historical_data (excVat, incVat) values (?, ?)";
if ($stmt = mysqli_prepare($link, $sql)) {
    // bind vars to prepared stmt as params
    mysqli_stmt_bind_param($stmt, 'ii', $valueNotAdded, $valueAdded);
    
    // set params and calculate
    if (isset($_POST['vat'])) {
        $valueAdded = mysqli_escape_string($link, ($_POST['original']));
        $valueNotAdded = mysqli_escape_string($link, ($_POST['original']  / $vat));
        echo ' VAT was included in the original figure ';
    } else {
        $valueAdded = $_POST['original'] * $vat;
        $valueNotAdded = $_POST['original'];
        echo ' VAT was excluded in the original figure ';
    }
        
        if (mysqli_stmt_execute($stmt)) {
            echo ' Record added ';
        } else {
            echo ' Error. Record not added ' . mysqli_error($link);
        }
} else {
    echo 'ERROR: Could not prepare stmt query: $sql' . mysqli_error($link);
}

// close stmt
mysqli_stmt_close($stmt);


// close conn
mysqli_close($link);
?>