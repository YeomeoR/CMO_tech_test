<?php 

// $link = mysqli_connect("localhost", "root", "", "vat_1");

// if ($link === false) {
//     die('Connection Error: Could not connect.' . mysqli_connect_error());
// }

// echo 'Connected to MariaDB vat_1, successfully' . mysqli_get_host_info($link);

include '/wamp64/www/vat_calc/config.php';

$vat = 1.215;
$exVat = '';
$incVat = '';
$valueAdded = '';
$valueNotAdded = '';

print_r($valueAdded);

// prepare insert stmt
// $sql = "insert into historical_data (excVat, incVat) values (?, ?)";
// if ($stmt = mysqli_prepare($link, $sql)) {
//     // bind vars to prepared stmt as params
//     mysqli_stmt_bind_param($stmt, 'ii', $valueNotAdded, $valueAdded);
    
//     // set params and calculate
//     if (isset($_GET['vat'])) {
//         $valueAdded = mysqli_escape_string($link, ($_GET['original']));
//         $valueNotAdded = mysqli_escape_string($link, ($_GET['original']  / $vat));
//         echo ' VAT was included in the original figure ';
//     } else {
//         $valueAdded = $_GET['original'] * $vat;
//         $valueNotAdded = $_GET['original'];
//         echo ' VAT was excluded in the original figure ';
//     }
        
//         if (mysqli_stmt_execute($stmt)) {
//             echo ' Record added ';
//         } else {
//             echo ' Error. Record not added ' . mysqli_error($link);
//         }
// } else {
//     echo 'ERROR: Could not prepare stmt query: $sql' . mysqli_error($link);
// }

// // close stmt
// mysqli_stmt_close($stmt);


// // close conn
// mysqli_close($link);
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

<?php 
$link = mysqli_connect("localhost", "root", "", "vat_1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// create table with historical data from DB table historical_data
$sqlRows = "select * from historical_data";
if ($results = mysqli_query($link, $sqlRows)) {
    if (mysqli_num_rows($results) > 0) {
        echo '<table>';
        echo    '<tr>';
        echo        '<th>Request ID</th>';
        echo        '<th>Date Requested</th>';
        echo        '<th>Excl. VAT</th>';
        echo        '<th>INC. VAT</th>';
        echo    '</tr>';
        foreach($results as $result) {
            echo '<tr>';
            echo    '<td>' . $result['id'] . '</td>';
            echo    '<td>' . $result['date'] . '</td>';
            echo    '<td>' . $result['excVat'] . '</td>';
            echo    '<td>' . $result['incVat'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        // free result set
        mysqli_free_result($results);
    } else {
        echo 'No historical records found.';
    }
} else {
    echo 'ERROR: Could not execute $sqlRows. ' . mysqli_error($link);
}
// close conn
mysqli_close($link);
?>
    <button>
    <a href="VAT_calc.php">Back to Calculator</a>
    </button> 
    <button>
    <a href="VAT_calc.php">Clear data from 'Historical Data' table</a>
    </button> 
</body>
</html>