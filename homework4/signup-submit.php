<?php 

	$name = $_POST["name"];
	$gender = $_POST["gender"];
	$age = $_POST["age"];
	$personality = $_POST["personality"];
	$os = $_POST["os"];
	$min = $_POST["min"];
	$max = $_POST["max"];

	$file_content = "\n".$name.",".$gender.",".$age.",".$personality.",".$os.",".$min.",".$max;

	file_put_contents("singles.txt", $file_content,FILE_APPEND);

	header("Location:result.php?name=$name");

 ?>