<?php require "connect.php"?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
	<title>Serial</title>
</head>
<body>
	<?php require "header.php"?>
	<div class="all">

		<?php
			$url = $_SERVER['REQUEST_URI'];
			$id = "";
			for ($i=12; $i < strlen($url); $i++) { 
				$id .= $url[$i];
			}

			$serials = mysqli_query($connect, "select * from serials where id = ".$id."");
			$serials = mysqli_fetch_all($serials);
			foreach ($serials as $serial) {
				?>

				<img class="image" src="poster/<?= $serial[3] ?>">

				<h1>
					<?= $serial[1] ?>
				</h1>

				<div class="text">
					<?= $serial[2] ?>
				</div>

				<div>
					<p><b>Original release:</b> <?= $serial[4] ?> </p>
					<p><b>Country of origin:</b> <?= $serial[5] ?> </p>
					<p><b>Genre:</b> <?= $serial[6] ?> </p>

				</div>
				
				<?php
			}
		?>

		<div class="seasons">
			<?php
			echo '<h2>Seasons</h2><br>';
			$seasons = mysqli_query($connect, "select * from seasons where serial_id = ".$id."");
			$seasons = mysqli_fetch_all($seasons);
			foreach ($seasons as $season) {
				?>
				<a style="margin-left: 20px" class="smalllink" href="/season.php?<?=$id?>?<?=$season[0]?>"> <?= $season[2] ?> </a>
					<p style="margin-left: 30px;"> <b>Episodes:</b> <?= $season[3] ?> </p>
				<br>
				<?php
			}

		?>

	</div>
</body>
</html>