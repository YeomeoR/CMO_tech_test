<?php

    // ================= REMOVE DATA FROM TABLE ===============
    if (isset($_POST['submit'])) {
        $link = mysqli_connect("localhost", "root", "", "vat_1");

        if ($link === false) {
            die('ERROR: Unable to connect' . $msqli_connect_error($link));
        }
        $sqlRows = "truncate table historical_data";
        if (mysqli_query($link, $sqlRows)) {
            echo ' Records have been removed ';
        } else {
            echo 'ERROR: Unable to execute request: $sqlRows.' . mysqli_error($link);
        }

        // close conn
        mysqli_close($link);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Remove Data</title>
    </head>
    <body>
        <button id="to-home"> <a href="/vat_calc/VAT_calc.php">Back to Home</a> </button>
    </body>
    </html>