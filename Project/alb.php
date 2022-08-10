<?php require "blocks/connect.php"?>
<?php
	$url = $_SERVER['REQUEST_URI'];
	$id = "";
	$id_album = "";
	$j = 0;
	for ($i=9; $i < strlen($url); $i++) { 
		if($url[$i] == "?"){
			$j = $i+1;
			break;
		}
		$id .= $url[$i];
	}
	for (; $j < strlen($url); $j++) { 
		$id_album .= $url[$j];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet">
	
	<?php
		$albums = mysqli_query($connect, "select * from albums where id = ".$id_album."");
		$albums = mysqli_fetch_all($albums);
		foreach ($albums as $album) {
			?>

			<title> <?= $album[2] ?> </title>

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


			<h1>
				<a href="/art.php?<?=$artist[0]?>"><?= $artist[1] ?></a>
			</h1>
			<?php
		}
		?>
		<div class="album">
			<?php
			$albums = mysqli_query($connect, "select * from albums where id = ".$id_album."");
			$albums = mysqli_fetch_all($albums);
			foreach ($albums as $album) {
				?>

				<h2> <?= $album[2] ?> </h2>
				<p> <?= $album[3]?></p>
				<?php
			}
		?>
		</div>
	</div>
	
	<?php require "blocks/footer.php"?>
</body>
</html>