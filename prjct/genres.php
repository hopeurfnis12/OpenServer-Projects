<?php require "connect.php"?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <title>Genres</title>
</head>
<body>

	<?php require "header.php"?>

	<div class="content">
		<?php
			$genres = mysqli_query($connect, "select distinct genre from genres");
			$genres = mysqli_fetch_all($genres);
			foreach ($genres as $genre) {
				?>
				<h1><a href="/genre.php?<?=$genre[0]?>"><?= $genre[0] ?></a></h1>
				<br><br>
				<?php
			}
		?>
	</div>

</body>
</html>