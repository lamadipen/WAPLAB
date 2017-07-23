<!DOCTYPE html>
<?php 
		
	/*
	Checking for get request parameter
	*/
	if(isset($_GET["film"]))
	{
		$movie = $_GET["film"];
	}
	$info = file_get_contents("$movie/info.txt");
	$info_array = explode("\n", $info);
	$movie_year = $info_array[1];
	$movie_full_name = $info_array[0];
	$rating = $info_array[2];

?>
<html lang="en">
	<head>
		<title>Rancid Tomatoes</title>
		<link rel="icon" href="rotten.gif" type="image/gif" sizes="16x16">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="movie.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="bannerbg">
			<img src="banner.png" alt="Rancid Tomatoes" />
		</div>

		<h1 id="movie_title"><?= $movie_full_name. " ($movie_year)" ;?></h1>
		
		<div class="content_area">
			<div class="banner_container">	
				<div class="left_banner">
					<?php
						/*Displaying Rotton and fresh logo as per condition*/
						if($rating > 60)
						{
					?>
							<img src="http://mumstudents.org/cs472/2015-07-DE/Homework/3/resources/freshbig.png" alt="Rotten" />
					<?php
						} 
						else
						{
					?>
							<img src="rottenbig.png" alt="Rotten" />
					<?php		

						}
					?>
					
					<span><?= $rating; ?>%</span>
				</div>
				<div class="right_banner">
					<div>
						<img src="<?= $movie;?>/overview.png" alt="general overview" />
					</div>
						<?php 
							$overview = file_get_contents("$movie/overview.txt");
							$overview_array = explode("\n", $overview);
						?>
						<dl>
							<?php 
								/*Displaying overview of the movie*/
								foreach ($overview_array as $key => $value) {
									$ov_items = explode(":",  $value);
							?>
									<dt><?= $ov_items[0]; ?></dt>
									<dd><?= $ov_items[1]; ?></dd>
							<?php
								}
							?>
						</dl>
				</div>
			</div>
			<div class="content_body">
				<?php 
					  /*Displaying overview of the movie continued*/
					  $reviews = glob("$movie/review*.txt");
					  $size_of_reviews = sizeof($reviews);

					  if ($size_of_reviews % 2 == 0) {
						  $first_half = $second_half = $size_of_reviews/2;
					  } 
					  else
					  {
					  	 $first_half = ceil($size_of_reviews/2) ;
					  	 $second_half =  floor($size_of_reviews/2);
					  }	
						
				?>
				<div class="left_content">
					<?php 
						/*Displaying overview of the movie continued*/
						for($i=0; $i < $first_half;$i++)
						{
							$review = file_get_contents("$reviews[$i]");
							$review_array = explode("\n", $review);
					?>
						<div class="rotten_comment">
							<p>
								<?php 
									if($review_array[0] == "FRESH")
									{
								?>
										<img src="fresh.gif" alt="Fresh" />
								<?php
									}
									else{
								?>
										<img src="rotten.gif" alt="Rotten" />
								<?php
									}
								?>
								
								<q>
									<?= $review_array[0]; ?>	
								</q>
							</p>
						</div>
						<div class="critics_block">
							<p>
								<img src="critic.gif" alt="Critic" />
								<?= $review_array[2]; ?> <br />
								<em><?= $review_array[3]; ?></em>
							</p>	
						</div>
					<?php			

						}
					?>
				</div>
				<div class="right_content">
					<?php 
						/*Displaying overview of the movie continued*/
						for($i=$first_half+1; $i < $size_of_reviews ;$i++)
						{
							$review = file_get_contents("$reviews[$i]");
							$review_array = explode("\n", $review);
					?>
						<div class="rotten_comment">
							<p>
								<?php 
									if($review_array[0] == "FRESH")
									{
								?>
										<img src="fresh.gif" alt="Fresh" />
								<?php
									}
									else{
								?>
										<img src="rotten.gif" alt="Rotten" />
								<?php
									}
								?>
								
								<q>
									<?= $review_array[0]; ?>	
								</q>
							</p>
						</div>
						<div class="critics_block">
							<p>
								<img src="critic.gif" alt="Critic" />
								<?= $review_array[2]; ?> <br />
								<em><?= $review_array[3]; ?></em>
							</p>	
						</div>
					<?php			

						}
					?>	
				</div>
			</div>
			<div id="page_no">
				<p>(1-<?= $size_of_reviews; ?>) of <?= $size_of_reviews; ?></p>
			</div>
			
		<!-- content_area close-->	
		</div>
		
		<div class="validation">
			<a href="http://validator.w3.org/check/referer"><img src="w3c-html.png" alt="Valid HTML5" /></a> <br />
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="w3c-css.png" alt="Valid CSS" /></a>
		</div>
	</body>
</html>
