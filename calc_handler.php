<?php 

$link = mysqli_connect("localhost", "root", "", "vat_1");

if ($link === false) {
    die('Connection Error: Could not connect.' . mysqli_connect_error());
}

echo 'Connected to MariaDB vat_1, successfully' . mysqli_get_host_info($link);



$vat = 1.215;
$exVat = '';
$incVat = '';
$valueAdded = '';
$valueNotAdded = '';
// $id = '';
$now = '2022-06-11';


if (isset($_GET['vat'])) {
    $valueAdded = mysqli_escape_string($link, ($_GET['original'] / $vat));
    $valueNotAdded = mysqli_escape_string($link, ($_GET['original']));
    echo 'VAT included';
} else {
    $valueAdded = $_GET['original'];
    $valueNotAdded = $_GET['original'] * $vat;
    echo 'VAT excluded';
}
print_r($valueAdded);

$sql = "insert into historical_data (excVat, incVat) values ('$valueAdded', '$valueNotAdded')";

if (mysqli_query($link, $sql)) {
    echo ' Record added ';
} else {
    echo ' Error. Record not added ' . mysqli_error($link);
}

mysqli_close($link);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button>
    <a href="VAT_calc.php">Back to Calculator</a>
    </button> 
</body>
</html>