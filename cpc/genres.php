<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
</head>
<body>
	<?php require "connect.php"?>

	<?php require "header.php"?>

	<div class="all">
		<?php
			$genres = mysqli_query($connect, "select distinct title from genres");
			$genres = mysqli_fetch_all($genres);
			foreach ($genres as $genre) {
				?>
				<div class="block">
					<a class="link" href="/genre.php?<?=$genre[0]?>"><?= $genre[0] ?></a>
				</div>
				<?php
			}
		?>
	</div>

</body>
</html>