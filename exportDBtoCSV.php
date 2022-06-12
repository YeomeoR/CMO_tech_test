<?php


if (isset($_POST['submit'])) {
    $link = mysqli_connect("localhost", "root", "", "vat_1");
 
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    // Grab records from the DB table
    $query = $link->query("select * from historical_data");

    if ($query->num_rows > 0) {
        $delimiter = ',';
        $filename = 'Historical-Data-' . date('d/m/Y') . '.csv';

        // point to file
        $file = fopen('php://memory', 'w');

        // set cols
        $cols = array('id', 'date', 'excVat', 'incVat');
        fputcsv($filename, $cols, $delimiter);

        // output rows formatting as csv and write to $file
        while($row = $query->fetch_assoc()) {
            $rowData = array($row['id'], $row['date'], $row['excVat'], $row['incVat']);
            fputcsv($file, $cols, $delimiter);
        }

        // point to beg of file
        fseek($file, 0);

        // set headers to download instead of display
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        // output remaining data
        fpassthru($file);
    }
    exit;
}