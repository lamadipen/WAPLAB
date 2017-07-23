<!DOCTYPE html>
<!-- saved from url=(0056)http://mumstudents.org/cs472/2015-07-DE/Labs/3/music.php -->
<html><!--
	Web Programming Step by Step
	Lab #3, PHP
	-->
	<?php 
		$no_songs= 5678;
		$upperBound = 5;

		$artists_string = file_get_contents("Music Viewer_files/favorite.txt");
		
		//$artists = array("Britney Spears", "Christina Aguilera", "Justin Bieber", "Lady Gaga");
		$artists = explode(" ", $artists_string);
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Music Viewer</title>
		
		<link href="http://mumstudents.org/~000-98-5464/Lab3/Music%20Viewer_files/viewer.css" type="text/css" rel="stylesheet">
	</head>

	<body>
		
		<h1>My Music Page</h1>
		
		<!-- Exercise 1: Number of Songs (Variables) -->
		<p>
			I love music.
			I have <?= $no_songs; ?> total songs,
			which is over <?= $no_songs/10; ?> hours of music!
		</p>

		<!-- Exercise 2: Top Music News (Loops) -->
		<!-- Exercise 3: Query Variable -->
		<div class="section">
			<h2>Yahoo! Top Music News</h2>
		
			<ol>
				<?php 
					if(isset($_GET['newspages']))
					{
						$upperBound = $_GET['newspages'];
					}
				
					for($i=1; $i <= $upperBound; $i++){
				?>
					<li><a href="http://music.yahoo.com/news/archive/<?= urlencode($i); ?>.html">Page <?= $i; ?></a></li>
				<?php }
				?>
			</ol>
		</div>

		<!-- Exercise 4: Favorite Artists (Arrays) -->
		<!-- Exercise 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
		
			<ol>
				<?php for($i=0; $i < count($artists); $i++){
				?>
					<li><a href="http://music.yahoo.com/videos/<?= urlencode($artists[$i]); ?>"><?= $artists[$i]; ?></a></li>
				<?php
					}
				?>
			</ol>
		</div>
		
		<!-- Exercise 6: Music (Multiple Files) -->
		<!-- Exercise 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

		<ul id="musiclist">

			<?php
				foreach (glob("Music Viewer_files/songs/*.mp3") as $mp3s){
			?>
				<li class="mp3item">
					<a href="http://mumstudents.org/cs472/Labs/3/songs/<?= urlencode(basename($mp3s)); ?>"><?= basename($mp3s); ?> <?= "(". ceil(filesize($mp3s)/1024) ; ?> <?= "kb)";?></a>
				</li>
			<?php } ?>
			<?php
                foreach (glob("Music Viewer_files/songs/*.m3u") as $m3u){
            ?>
                <li class="playlistitem">
                    <a href="http://mumstudents.org/cs472/Labs/3/songs/<?=  urlencode(basename($m3u)); ?>"><?= basename($m3u); ?> <?= "(". ceil(filesize($m3u)/1024) ; ?> <?= "kb)";?></a>
                    <ul>
                        <?php 
                        $contents = file_get_contents($m3u);
                        $contents_array = explode(PHP_EOL, $contents);
                        foreach ($contents_array as $content){
                            if(substr($content, 0,1)!='#'&&trim($content)!=""){
                        ?>
                        <li><?php 
                            echo $content;
                        ?></li>
                        <?php 
                        }
                        }
                        ?>
                    </ul>
                </li>
            <?php 

                } 
            ?>		
		</ul>
		</div>

		<div>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://mumstudents.org/~000-98-5464/Lab3/Music%20Viewer_files/w3c-html.png" alt="Valid HTML5">
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://mumstudents.org/~000-98-5464/Lab3/Music%20Viewer_files/w3c-css.png" alt="Valid CSS">
			</a>
		</div>
	


</body></html>