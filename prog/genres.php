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
		<div class="genres">
		<?php
			$genre = mysqli_query($connect, "select distinct title from genre");
			$genre = mysqli_fetch_all($genre);
			foreach ($genre as $gen) {
				?>
				<div class="genres_block">
					<center>
						<h2>
							<div class="genres_title">
								<a href="/genre.php?<?=$gen[0]?>"> <?= $gen[0] ?> </a>
							</div>
						</h2>
					</center>
				</div>
				<?php
			}
		?>
		</div>
	</div>

</body>
</html>