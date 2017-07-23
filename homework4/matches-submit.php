<?php 
	$name = trim($_GET["name"]);

	$all_singles = file_get_contents("singles.txt");
	
	$singles_array = explode("\n", $all_singles);

	$my_choice = get_my_details($all_singles,$name);
	
	function get_my_details($all_singles, $name)
	{
		// escape special characters in the query
		$pattern = preg_quote($name, '/');
		// finalise the regular expression, matching the whole line
		$pattern = "/^.*$pattern.*\$/m";
		// search, and store all matching occurences in $matches
		if(preg_match_all($pattern, $all_singles, $matches)){
		   //echo "Found matches:\n";
		   //echo implode("\n", $matches[0]);
		   return implode("\n", $matches[0]);	
		}
		else{
		   //echo "No matches found";
			return null;
		}
	}


	function find_matches($single,$my_choice)
	{
		$single_array = explode(",",$single);
		$my_choice_array = explode(",", $my_choice);
		
		if($my_choice_array[1] != $single_array[1] && $my_choice_array[4] == $single_array[4] && ($my_choice_array[5] <= $single_array[2] 
			&& $single_array[2] <= $my_choice_array[6]) && personality_match($my_choice_array[3],$single_array[3]))
		{
			return $single_array;
		}
		else
		{
			return null;
		}
	}

	function personality_match($my_personality,$match_personality)
	{
		for($i=0; $i <sizeof($my_personality);$i++)
		{
			if($my_personality[$i] == $match_personality[$i])
			{
				return true;
			}	
			else
			{
				return false;
			}
		}

	}
 ?>
<?php include("top.html"); ?>

<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file is the front page that links to two of the files you are going
     to write, signup.php and matches.php.  You don't need to modify this file. -->
<div>
	<h1>Matches for <?= $name; ?></h1>
	<?php 
		for ($i=0; $i < sizeof($singles_array); $i++) { 
			$match = find_matches($singles_array[$i],$my_choice);
			if(!empty($match)):
	?>
		<div class="match">
			<img src="images/user.jpg">	
			<div>
				<p>	
					<?= $match[0]; ?>	
				</p>
			</div>
		
				<ul>
					<li><strong>gender:</strong> <?= $match[1]; ?></li>
					<li><strong>age:</strong>  <?= $match[2]; ?></li>
					<li><strong>type:</strong> <?= $match[3]; ?></li>
					<li><strong>OS:</strong><?= $match[4]; ?></li>
				</ul>
		</div>

	<?php
		endif;
		}
	?>

</div>

<?php include("bottom.html"); ?>
