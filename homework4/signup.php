<?php include("top.html"); ?>

<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file is the front page that links to two of the files you are going
     to write, signup.php and matches.php.  You don't need to modify this file. -->
<div>
	<h1>Signup!</h1>
	<div>
		<form method="post" action="signup-submit.php">
			<fieldset>
				<strong>Name:</strong>
				<input type="input" name="name" maxlength="16">
				<strong>Gender:</strong>
				<label>Male</label>
				<input type="radio" name="gender" value="M">
				<label>Female</label>
				<input type="radio" name="gender" value="F" checked>
				<strong>Age:</strong>
				<input type="input" name="age" maxlength="2">
				<strong>Personality type:</strong  maxlength="2">
				<input type="text" name="personality">
				<select name="os">
					<option value="Windows" selected>Windows</option>
					<option value="Mac OS X">Mac OS X</option>
					<option value="Linux">Linux</option>
				</select>
				<strong>Seeking age:</strong>
				<input type="text" name="min"  maxlength="2" placeholder="min">
				<input type="text" name="max"  maxlength="2" placeholder="max">
				<input type="submit" name="Signup">
			</fieldset>
		</form>
	</div>
	
</div>

<?php include("bottom.html"); ?>
