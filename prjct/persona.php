<?php require "connect.php"?>
<?php
	$url = $_SERVER['REQUEST_URI'];
	$id = "";
	for ($i=0; $i < strlen($url); $i++) {
		if($url[$i] != "?" && $t == 0){
			continue;
		}
		if($url[$i] == "?"){
			$i++;
			$t = 1;
		}
		$id .= $url[$i];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet">
	<title>Persona</title>
</head>
<body>
	<?php require "header.php"?>

	<div class="content">
		<?php
		$artists = mysqli_query($connect, "select * from artists where id = ".$id."");
		$artists = mysqli_fetch_all($artists);
		foreach ($artists as $artist) {
			?>

			<img class="image" src="img/<?= $artist[1] ?>.jpg">

			<h1>
				<?= $artist[1] ?>
			</h1>
			

			<div class="text">
				<p> <?= $artist[2] ?> </p>
			</div>
			<?php
		}
		?>

		<div class="genre">
			<?php
			echo '<br><h2>Жанры</h2><br>';
			$genres = mysqli_query($connect, "select * from genres where artist_id = ".$id."");
			$genres = mysqli_fetch_all($genres);
			foreach ($genres as $genre) {
				?>

				<a class="link_person" href="/genre.php?<?=$genre[2]?>"> <?= $genre[2] ?> </a>
				<br><br>
				<?php
			}

		?>

		<div class="album">
			<?php
			echo '<br><h2>Альбомы</h2><br>';
			$albums = mysqli_query($connect, "select * from albums where artist_id = ".$id."");
			$albums = mysqli_fetch_all($albums);
			foreach ($albums as $album) {
				?>

				<a class="link_person" href="/album.php?<?=$album[0]?>"> <?= $album[2] ?> </a>
				<br><br>
				<?php
			}

		?>

		</div>

		<br>
		
		<h2><a href="awards.php?<?=$id?>">Награды</a></h2>

	</div>
</body>
</html>