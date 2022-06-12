<?php 

// include 'config.php'; // alternate path
// include '/config.php'; // alternate path - suggested 
include '/wamp64/www/vat_calc/config.php'; // working local path

print_r($valueAdded);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <title>Historical Data Table</title>
</head>
<body>
    <h1>HISTORICAL VAT DATA</h1>

<?php 
// connect
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
        $serializeData = serialize($results);
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

<p>fig1. Table of VAT calculation data based on user input requests.</p>

<form action="clearDB.php" method="POST">    
    <input class="btn" id="delete" type="submit" name="submit" value="Clear data from 'Historical Data' table" />
</form>
<form action="exportDBtoCSV.php" method="POST">    
    <input class="btn" id="export" type="submit" name="submit" value="Export data from 'Historical Data' table" />
</form>
<button class="btn" id="back">
<a href="VAT_calc.php">Back to Calculator</a>
</button> 

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>