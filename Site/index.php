<?php require "connect.php"?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
	<title>Serials</title>
</head>
<body>
	<?php require "header.php"?>
	<div class="all">
		<?php
			$serials = mysqli_query($connect, "select * from serials");
			$serials = mysqli_fetch_all($serials);
			foreach ($serials as $serial) {
				?>
				<a class="link" href="/serial.php?<?=$serial[0]?>"><?= $serial[1] ?></a>
				<br>
				<?php
				$seasons = mysqli_query($connect, "select * from seasons where serial_id = ".$serial[0]."");
				$seasons = mysqli_fetch_all($seasons);
				foreach ($seasons as $season) {
					?>
					<a class="smalllink" href="/season.php?<?=$serial[0]?>?<?=$season[0]?>" style="margin-left: 20px"> <?= $season[2]; ?> </a>
					<br>
					<?php
				}
				echo '<br><br>';
			}
		?>
	</div>
</body>
</html>