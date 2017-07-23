<?php include("top.html"); ?>

<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file is the front page that links to two of the files you are going
     to write, signup.php and matches.php.  You don't need to modify this file. -->
<div>
	<strong>Thank you</strong>
	<div>
		<p>Welcome to NerdLove, <?= $_GET["name"]; ?>
		</p>
		<p>Now <a href="matches.php">Log in to see the matches!</a></p>
	</div>
	
</div>

<?php include("bottom.html"); ?>
