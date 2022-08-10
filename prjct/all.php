<?php require "connect.php"?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet">
	<title>Artists</title>
</head>
<body>	
	<?php require "header.php"?>
	
	<div class="content">
		<div class="list_img">
			<?php
				$artists = mysqli_query($connect, "select * from artists");
				$artists = mysqli_fetch_all($artists);
				foreach ($artists as $artist) {
					?>
					<div class="block">
						<a href="/persona.php?<?=$artist[0]?>"> <img class="link_img" src="img/<?= $artist[1] ?>.jpg"> </a>
						<br>
						<a href="/persona.php?<?=$artist[0]?>"><?= $artist[1] ?></a>
					<br>
					</div>

					<?php
				}
			?>
		</div>
	</div>
</body>
</html>