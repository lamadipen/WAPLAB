<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    $error ="";
    if(isset($_GET['errors'])){
        $error = $_GET['errors'];
    }

?>
<html>
    <head>
        <title>W1D1 Overview</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <script type="text/javascript"  src="index.js" ></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript"  src="index-jq.js" ></script>
        <link rel="stylesheet" type="text/css" href="style.css">   
    </head>
    <body>
        <div class="container">
        	<form action="submit.php" method="post">
                <h1>Please login</h1>
                <div id="errors">
                    <?php if($error){
                        echo $error;
                    ?>

                    <?php }?>    
                </div>
        		<span class="label">User:</span>
        		<input type="text" name="user" id="user">
                <br/>
                <span class="label">Password:</span>
                <input type="password" name="password">
                <br/>
                <input id="submitbtn" type="submit" name="Login">
        	</form>

        </div>
    </body>
</html>
