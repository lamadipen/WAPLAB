<!DOCTYPE html>
<?php 
	$error_type = "";
	if(isset($_GET["error"]))
	{
		$error_type = $_GET["error"];
	}	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade/buyagrade.css" type="text/css" rel="stylesheet">
	</head>
	
	<body>
		<h1>Sorry</h1>
		<div>
			<?php 
				if($error_type == "card_error"):
			?>
			<p>
				You didn't provide valid card number.<a href="buyagrade.html">Try Again?</a>
			</p>
			<?php 
				else:		
			?>
				<p>
					You didn't fill the form completely.<a href="buyagrade.html">Try Again?</a>
				</p>
			<?php
				endif;
			?>
		</div>
	
</body></html>