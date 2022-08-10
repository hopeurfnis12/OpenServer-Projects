<?php require "connect.php"?>
<?php
	$url = $_SERVER['REQUEST_URI'];
	$genre_name = "";
	for ($i=0; $i < strlen($url); $i++) {
		if($url[$i] != "?" && $t == 0){
			continue;
		}
		if($url[$i] == "?"){
			$i++;
			$t = 1;
		}
		$genre_name .= $url[$i];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <title>Genre</title>
</head>
<body>

	<?php require "header.php"?>

	<div class="content">
		<?php
			$genres = mysqli_query($connect, "select * from genres where genre like '%".$genre_name."%'");
			$genres = mysqli_fetch_all($genres);
			echo "<h1>".$genre_name."</h1>";
			?>
			<div class="list_img">
			<?php
			foreach ($genres as $genre) {
				$artists = mysqli_query($connect, "select * from artists where id =".$genre[1]."");
				$artists = mysqli_fetch_all($artists);
				foreach ($artists as $artist) {
					?>
					<div class="block">
						<a href="/persona.php?<?=$artist[0]?>"> <img class="link_img" src="img/<?= $artist[1] ?>.jpg"> </a>
						<br>
						<a href="/persona.php?<?=$artist[0]?>"><?= $artist[1] ?></a>
					</div>
					<?php
				}
			}
		?>
		</div>
	</div>

</body>
</html>