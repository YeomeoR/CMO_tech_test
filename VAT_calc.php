<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    
        
    <h1>Hello VAT free world!</h1>
    
    
    <form method="GET" action="calc_handler.php" id="inputs">
        <label for="vat" id="label">Include VAT? </label >
        <input type="checkbox" name="vat" id="exVat" value="<?php echo 'checked="checked"' ? true : false; ?>" />
        <input type="int" id="original" value="" name="original" placeholder="" />
    </form>
    
  


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="main.js"></script>

</body>
</html>