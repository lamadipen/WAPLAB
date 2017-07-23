<?php include("top.html"); ?>

<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file is the front page that links to two of the files you are going
     to write, signup.php and matches.php.  You don't need to modify this file. -->
<div>
	<h1>Signup!</h1>
	<div>
		<form method="post" action="signup-submit.php">
			<fieldset>
				<legend>New User Signup:</legend>
				<div class="form_input">
					<strong class="column">Name:</strong>
					<input type="input" name="name" maxlength="16" class="sixteen">	
				</div>
				<div class="form_input">
					<strong class="column">Gender:</strong>
					<input type="radio" name="gender" value="M">
					<label>Male</label>
					<input type="radio" name="gender" value="F" checked>
					<label >Female</label>	
				</div>
				<div class="form_input">
					<strong class="column">Age:</strong>
					<input type="number" name="age" maxlength="2" class="six">
				</div>
				<div class="form_input">
					<strong class="column">Personality type:</strong  maxlength="2">
					<input type="text" name="personality" maxlength="4" class="six">
					<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp .">Don't Know your type?</a>
				</div>
				<div class="form_input">
					<strong class="column">Favorite OS:</strong>
					<select name="os">
						<option value="Windows" selected>Windows</option>
						<option value="Mac OS X">Mac OS X</option>
						<option value="Linux">Linux</option>
					</select>
				</div>
				<div class="form_input">
					<strong class="column">Seeking age:</strong>
					<input type="number" name="min"  maxlength="2" placeholder="min" class="six"> to
					<input type="number" name="max"  maxlength="2" placeholder="max" class="six">	
				</div>
				<div>
					<input type="submit" value="Sign up">		
				</div>
			</fieldset>
		</form>
	</div>
	
</div>

<?php include("bottom.html"); ?>
