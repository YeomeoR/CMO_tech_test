<?php

// function dd($array, $die = false) {
//     echo '<pre>' . print_r($array) . '</pre>';
//     if ($die === true) {
//         die();
//     }
// }




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
        <?php include '/xampp/htdocs/includes/functions/debug_functions.php'; ?>
        
    <h1>Hello VAT free world!</h1>
    
    
    <form method="GET" action="calc_handler.php" id="inputs">
        <label for="vat">Add VAT?</label>
        <input type="checkbox" name="vat" id="exVat" value="<?php echo 'checked="checked"' ? true : false; ?>">
        <input type="int" id="original" value="" name="original" placeholder="">
    </form>
    
  
<?php 

// $excVat = 

?>



</body>
</html>