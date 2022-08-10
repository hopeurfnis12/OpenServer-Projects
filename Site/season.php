<?php require "connect.php"?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
	<title>Season</title>
</head>
<body>
	<?php require "header.php"?>
	<div class="all">

		<?php
			$url = $_SERVER['REQUEST_URI'];
			$id = "";
			$season_id = "";
			$j = 0;
			for ($i=12; $i < strlen($url); $i++) { 
				if($url[$i] == "?"){
					$j = $i+1;
					break;
				}
				$id .= $url[$i];
			}
			for (; $j < strlen($url); $j++) { 
				$season_id .= $url[$j];
			}

			$serials = mysqli_query($connect, "select * from serials where id = ".$id."");
			$serials = mysqli_fetch_all($serials);
			foreach ($serials as $serial) {
				?>
				<h1> <?= $serial[1] ?> </h1>
				<?php
			}
		?>

		<div class="seasons">
			<?php
			$seasons = mysqli_query($connect, "select * from seasons where id = ".$season_id."");
			$seasons = mysqli_fetch_all($seasons);
			foreach ($seasons as $season) {
				?>
				<h2 style="margin-left: 10px"> <?= $season[2] ?> </h2>
				<br>
				<?php
			}
		?>

		<div class="ep">
			<?php
			$ep = mysqli_query($connect, "select * from ep where season_id = ".$season_id." and serial_id = ".$id."");
			$ep = mysqli_fetch_all($ep);
			foreach ($ep as $episod) {
				?>
				<div style="border-style: none solid solid none; margin-bottom: 50px; border-width: 2px;">
					<p style="margin-left: 20px; margin-right: 20px;"> <b> <?= $episod[3] ?> </b> <p1 style="float: right; margin-top: 0;"> - <?= $episod[4] ?> </p1> </p>

					<p style="margin-left: 20px; margin-right: 20px;"> <?= $episod[5] ?> </p>
				</div>
				<?php
			}
		?>

	</div>
</body>
</html>