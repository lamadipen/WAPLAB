<!DOCTYPE html>
<?php 
		
	/*
	Checking for get request parameter
	*/
	if(isset($_POST["submit"]))
	{
		$movie_title = $_POST["movie_title"];
		$movie_year = $_POST["movie_year"];
		$movie_rating = $_POST["movie_rating"];
		$overview = $_POST["overview"];
		$review = $_POST["review"];
		$review_array  = explode("#", $review);
		

		if (!file_exists($movie_title)) {
		    mkdir($movie_title, 0700);
		    file_put_contents("$movie_title/info.txt","$movie_title\n$movie_year\n$movie_rating");
		    file_put_contents("$movie_title/overview.txt","$overview");

		   	$filename  = basename($_FILES['overview_img']['name']);
			$extension = pathinfo($filename, PATHINFO_EXTENSION);
			$new       = 'overview.'.$extension;
			$target_file = $movie_title."/".$new;

		   	move_uploaded_file($_FILES["overview_img"]["tmp_name"], $target_file);

		   	for($i=0;$i<sizeof($review_array);$i++)
		   	{
		   		$review_no = $i+1;
		   		$rev =trim($review_array[$i]);
		   		file_put_contents("$movie_title/review$review_no.txt","$rev");
		   	}

		}
		
	}

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

		<h1 id="movie_title">Add Movie</h1>
		
		<div class="content_area">
			<div class="banner_container">	
		
		
			</div>
			<div class="content_body">
				<div class="left_content form">
					<form action="mymovie.php" method="POST" enctype="multipart/form-data">
						<div>
							<label>Movie Title</label>
							<input type="text" name="movie_title">
						</div>
						<div>
							<label>Year</label>
							<input type="text" name="movie_year">
						</div>
						<div>
							<label>Overall Rating</label>
							<input type="text" name="movie_rating">
						</div>
						<div>	
							<label>Overview</label>
							<textarea  name="overview"></textarea>
						</div>
						<div>	
							<label>Review</label>
							<textarea  name="review" placeholder="Add # between reviews"></textarea>
						</div>
						<div>	
							<label>Overview Image (Only .png)</label>
							<input type="file" name="overview_img">	
						</div>
						


						<input type="submit" name="submit">

					</form>
				</div>
			</div>
			<div id="page_no">
				<p></p>
			</div>
			
		<!-- content_area close-->	
		</div>
		
		<div class="validation">
			<a href="http://validator.w3.org/check/referer"><img src="w3c-html.png" alt="Valid HTML5" /></a> <br />
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="w3c-css.png" alt="Valid CSS" /></a>
		</div>
	</body>
</html>
