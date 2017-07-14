<!DOCTYPE html>
<?php 
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('index.php?errors='.urlencode('Please login first'));
        exit();
    }
    else{
        $user = $_SESSION['user'];
    }
?>
<html>
    <head>
        <title>W1D1 Overview</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">   
    </head>
    <body>
        <div class="container">
            <?php echo "Welcome ". $user; ?> 

        </div>
    </body>
</html>