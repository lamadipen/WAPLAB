<?php include("top.html"); ?>

<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file is the front page that links to two of the files you are going
     to write, signup.php and matches.php.  You don't need to modify this file. -->
<div>
	<h1>Welcome!</h1>
	<form method="get" action="matches-submit.php">
		<fieldset>
			<legend>Returinig User:</legend>
			<strong>Name:</strong>
			<input type="text" name="name">
			<input type="submit" value="View My Matches" class="form_input">
		</fieldset>
	</form>
</div>

<?php include("bottom.html"); ?>

