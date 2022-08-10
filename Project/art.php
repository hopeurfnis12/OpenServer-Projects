<?php require "blocks/connect.php"?>
<?php
	$url = $_SERVER['REQUEST_URI'];
	$id = "";
	for ($i=9; $i < strlen($url); $i++) { 
		$id .= $url[$i];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet">
	
	<?php
		$artists = mysqli_query($connect, "select artist from artists where id = ".$id."");
		$artists = mysqli_fetch_all($artists);
		foreach ($artists as $artist) {
			?>

			<title> <?= $artist[0] ?> </title>

			<?php
		}
	?>
	
</head>
<body>
	<?php require "blocks/header.php"?>

	<div class="content">
	<?php
		$artists = mysqli_query($connect, "select * from artists where id = ".$id."");
		$artists = mysqli_fetch_all($artists);
		foreach ($artists as $artist) {
			?>

			<img class="image" src="img/<?= $artist[3] ?>">

			<h1>
				<?= $artist[1] ?>
			</h1>
			

			<div class="text">
				<p> <?= $artist[2] ?> </p>
			</div>
			<?php
		}
		?>
		<div class="album">
			<?php
			echo '<h2>Альбомы</h2><br>';
			$albums = mysqli_query($connect, "select * from albums where artist_id = ".$id."");
			$albums = mysqli_fetch_all($albums);
			foreach ($albums as $album) {
				?>

				<a class="link_album" href="/alb.php?<?=$id?>?<?=$album[0]?>"> <?= $album[2] ?> </a>
				<br><br>
				<?php
			}

		?>
		</div>
		<br>
		<div class="award">
			<?php
				echo '<h2>Награды</h2><br>';
				$awards = mysqli_query($connect, "select * from awards where artist_id = ".$id."");
				$awards = mysqli_fetch_all($awards);
				foreach ($awards as $award) {
					?>
					<h3> <?= $award[2] ?> </h3>
					<div class="list">
						<div class="nw" style="margin-right: 20px;"> <?= $award[3] ?> </div>
						<div class="nw"> <?= $award[4] ?> </div>
					</div>
					<br>
					<?php
				}
			?>
		</div>
	</div>
	
	<?php require "blocks/footer.php"?>
</body>
</html>