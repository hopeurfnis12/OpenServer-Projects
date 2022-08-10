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
			$s = 0;
			$url = $_SERVER['REQUEST_URI'];
			$id = "";
			for ($i=0; $i < strlen($url); $i++) {
				if($url[$i] != "?" && $t == 0){
					continue;
				}
				$i++;
				$t = 1;
				$id .= $url[$i];
			}

			$serials = mysqli_query($connect, "select * from serials where id = ".$id."");
			$serials = mysqli_fetch_all($serials);
			foreach ($serials as $serial) {
				$s = $serial[7];
				?>
				
				<h1 style="margin-bottom: 20px;">
					<?= $serial[1] ?>
				</h1>

				<div class="text">

					<div style="float: right;">
						<img src="images/<?= $serial[1] ?>.jpg">
					</div>

					<p><?= $serial[2] ?></p>
					<br>

					<div class="info">
						<p><b>Genre </b>
							<?
								$genre = mysqli_query($connect, "select * from genre where serial_id = ".$id."");
								$genre = mysqli_fetch_all($genre);
								foreach ($genre as $gen) {
									?>
									<a class="link_genre" href="/genre.php?<?=$gen[2]?>"><?= $gen[2] ?></a>
									<?php
								}
							?>
						</p>
						<p><b>Created by </b> <?= $serial[3] ?> </p>
						<p><b>Written by </b> <?= $serial[4] ?> </p>
						<p><b>Directed by </b> <?= $serial[5] ?> </p>
						<p><b>Country of origin </b> <?= $serial[6] ?> </p>
						<p><b>No. of seasons </b> <?= $serial[7] ?> </p>
						<p><b>No. of episodes </b> <?= $serial[8] ?> </p>
						<p><b>Original release </b> <?= $serial[9] ?> </p>
					</div>
				</div>
				<br>
				
				<?php
			}
		?>

		<div class="episodes">
			<?php
			echo '<h2 style="margin-bottom: 10px;">Episodes</h2>';
			for($i = 1; $i <= $s; $i++){
				echo "<h3>Season ".$i."</h3>";
				$series = mysqli_query($connect, "select * from series where serials_id = ".$id." and season = ".$i."");
				$series = mysqli_fetch_all($series);
				foreach ($series as $season) {
					?>
					<div class="seasons">
						<p style="margin-left: 10px"> <b> <?= $season[3] ?> </b></p>
						<p style="margin-left: 20px;"> <b> Original release date: </b> <?= $season[5] ?> </p>
						<p style="margin-left: 30px; margin-right: 30px;"> <?= $season[4] ?> </p>
						<br>
					</div>
					<br><br>
					<?php
				}
			}

		?>
		</div>
</body>
</html>