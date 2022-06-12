<?php

if (isset($_POST['submit'])) {
    $link = mysqli_connect("localhost", "root", "", "vat_1");
    
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // fetch mysql table rows
    $sql = "select * from historical_data";
    $result = mysqli_query($link, $sql);
    if (!$result = mysqli_query($link, $sql)) {
        exit(mysqli_error($link));
    }

    // var_dump($result);

    $histData = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $histData[] = $row;
        }
    }

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=hist_data.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('id', 'date', 'excVat', 'incVat'));

    if (count($histData) > 0) {
        foreach ($histData as $row) {
            fputcsv($output, $row);
        }
    }

      //close the db connection
      mysqli_close($link);
}

