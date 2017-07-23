<!DOCTYPE html>
<?php 

	$name = $card = $section = $section = $card_type ="";
	$all_read_date ="";
	if(isset($_POST["name"]) && isset($_POST["section"]) && isset($_POST["card"]) && isset($_POST["card_type"]) 
		&& !empty($_POST["card"]) && !empty($_POST["card_type"]) && trim($_POST["name"]) != " " && $_POST["card"] != " ")
	{
		$name = $_POST["name"];
		$section = $_POST["section"];
		$card = $_POST["card"];
		$card_type = $_POST["card_type"];

		card_validation($card,$card_type);

		$all_data = $name.";".$section.";".$card.";".$card_type."\n";
		file_put_contents("suckers.txt", $all_data,FILE_APPEND);

		$all_read_date = file_get_contents("suckers.txt");
	}
	else{
		header("Location:tryagain.php");
	}

	function card_validation($card, $card_type)
	{
		if(strlen($card) < 16){
			header("Location:tryagain.php");
		}
		if($card_type === "visa" && $card[0] != 4 )
		{
			header("Location:tryagain.php?error=card_error");
		}
		if($card_type === "mastercard" && $card[0] != 5 )
		{
			header("Location:tryagain.php?error=card_error");
		}
		if(!luhn_validation($card))
		{
			header("Location:tryagain.php?error=card_error");
		}
	}

	function luhn_validation($card)
	{
		$sum = 0;
		$card_length = strlen($card);
		for ($i=$card_length-1; $i >= 0  ; $i--) { 
			if($i%2!= 0)
			{
				$sum += (int)$card[$i];	
			}
			else
			{
				$double = (int)$card[$i]*2;
		
				if($double < 10)
				{
					$sum +=$double;
				}
				else
				{
					$str_double = strval($double);

					for ($j=0; $j < strlen($str_double); $j++) { 
						$sum += $str_double[$j];
					}
				}
			}
		}

		if($sum%10 == 0)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
?>
<html>
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/12sp/labs/4/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><?= $name;  ?></dd>

			<dt>Section</dt>
			<dd><?= $section; ?></dd>

			<dt>Credit Card</dt>
			<dd><?= $card ."($card_type)"; ?></dd>
		</dl>

		<div>
			<h2>Here are all the suckers who have submitted here</h2>
			<pre>
				<?= $all_read_date; ?>
			</pre>
		</div>
	</body>
</html>  