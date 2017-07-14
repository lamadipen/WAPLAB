<?php 
	
	if(isset($_POST['user']))
	{
		$user = $_POST['user'];
	}

	if(isset($_POST['password']))
	{
		$password = $_POST['password'];	
	}
	$errors = array();

	if(empty($user))
	{
		$errors[] = "Username cannot be empty";
	}
	if(!preg_match("/.{5,}/", $password)){
		$errors[] = "Password has to be at least 5 characters";
	}

	$error = implode(" ", $errors);
	if($errors)
	{
		header("Location: index.php?errors=". urlencode($error));
		exit;
	}

	session_start();
	$_SESSION['user'] = $user;
	header("Location: success.php");

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>W1D1 Overview</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    	<?php echo $user. " ". $password ?>	
    </body>
</html>