<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="styles.css">
        <title>VAT Calculator</title>
    </head>
    <body>
    
        <div id="input-container">
           <h1>Hello VAT free world!</h1>
        
            <form method="POST" action="calc_handler.php" id="inputs">
               <label for="vat" id="label">Include VAT? </label >
               <input type="checkbox" name="vat" id="exVat" value="<?php echo 'checked="checked"' ? true : false; ?>" />
        &pound; &nbsp;<input type="int" id="original" value="" name="original" placeholder="Enter an amount" required="required" />
            </form>
            <h3>Press ENTER to submit your calculation request</h3>
    
        </div> 
    


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="main.js"></script>

</body>
</html>