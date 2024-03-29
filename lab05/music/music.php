<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
			$song_count = 5678;
			$hour_count = (int)$song_count/10;
		 ?>

		<p>

			I love music.
			I have <?= $song_count ?> total songs,
			which is over <?= $hour_count ?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->


		<div class="section">
			<h2>Billboard News</h2>

			<ol>
				<?php
				$new_spages = $_GET["newspages"];
				for ($i = 11; $i > 11 - $new_spages; $i--) {
					if ($i < 10){ ?>
						<li><a href="https://www.billboard.com/archive/article/2019<?= $i ?>">2019-<?= "0".$i ?></a></li>
					<?php }
					else { ?>
						<li><a href="https://www.billboard.com/archive/article/2019<?= $i ?>">2019-<?= $i ?></a></li>
				<?php	} ?>
			<?php	} ?>
			</ol>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
				<?php
				$artist = array("Guns N' Roses", "Green Day", "Blink182", "Queen");

				for ($j = 0; $j <= 3; $j++) { ?>
					<li><?= $artist[$j] ?></li>
				<?php } ?>
			</ol>
		</div>
		<!-- Ex 5: Favorite Artists from a File (Files) explode implode-->
		<div class="section">
			<h2>My favorite Music</h2>

			<ol>
				<?php $favorite = file("favorite.txt");
				foreach ($favorite as $favorite) {
					$a = explode(" ",$favorite);
					$a2 = implode("_",$a);?>
				<li><a href="http://en.wikipedia.org/wiki/<?= $a2 ?>"><?= $favorite ?></a></li>
			<?php } ?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ol>
				<li></li>
			</ol>
		</div>


		<!-- Ex 7: MP3 Formatting basename-->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<li class="mp3item">
					<a href="lab5/musicPHP/songs/paradise-city.mp3">paradise-city.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/basket-case.mp3">basket-case.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/all-the-small-things.mp3">all-the-small-things.mp3</a>
				</li>

				<!-- Exercise 8: Playlists (Files) array_multisort-->
				<li class="playlistitem">326-13f-mix.m3u:
					<ul>
						<li>Basket Case.mp3</li>
						<li>All the Small Things.mp3</li>
						<li>Just the Way You Are.mp3</li>
						<li>Pradise City.mp3</li>
						<li>Dreams.mp3</li>
					</ul>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
