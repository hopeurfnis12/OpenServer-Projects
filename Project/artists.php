<?php require "blocks/connect.php"?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet">
	<title>Artists</title>
</head>
<body>	
	<?php require "blocks/header.php"?>

	<div class="as">
		<?php
			$artists = mysqli_query($connect, "select * from artists");
			$artists = mysqli_fetch_all($artists);
			foreach ($artists as $artist) {
				?>
				<a href="/art.php?<?=$artist[0]?>"><?= $artist[1] ?></a>
				<br>
				<?php
				$albums = mysqli_query($connect, "select * from albums where artist_id = ".$artist[0]."");
				$albums = mysqli_fetch_all($albums);
				foreach ($albums as $album) {
					?>
					<a class="link_album" href="/alb.php?<?=$artist[0]?>?<?=$album[0]?>" style="margin-left: 20px"> <?= $album[2]; ?> </a>
					<br>
					<?php
				}
				echo '<br><br>';
			}
		?>
	</div>
	
	<?php require "blocks/footer.php"?>
</body>
</html>