<?php 

include '/wamp64/www/vat_calc/config.php';

print_r($valueAdded);

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
<!-- <textarea name="export_data" style="display: none;" id="ta" cols="30" rows="10"><?php // echo $serializeData; ?></textarea> -->
    <button>
    <a href="VAT_calc.php">Back to Calculator</a>
    </button> 
    <form action="clearDB.php" method="POST">    
        <input type="submit" name="submit" value="Clear data from 'Historical Data' table" />
    </form>
    <form action="exportDBtoCSV.php" method="POST">    
        <input type="submit" name="submit" value="Export data from 'Historical Data' table" />
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>