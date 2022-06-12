<?php


if (isset($_POST['submit'])) {
    $link = mysqli_connect("localhost", "root", "", "vat_1");
    
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // fetch mysql table rows
    $sql = "select id, date, excVat, incVat from historical_data";
    $results = mysqli_query($link, $sql) or die("Selection Error " . mysqli_error($link));

    var_dump($results);

    $fp = fopen('php://memory', 'w');

    foreach ($results as $result) {
        fputcsv($fp, $result);
    }

    // while($row = mysqli_fetch_assoc($result))
    // {
    //     fputcsv($fp, $row);
    // }
    
    fclose($fp);

    //close the db connection
    mysqli_close($link);

}