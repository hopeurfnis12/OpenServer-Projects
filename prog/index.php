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
		<div class="cover">
			<?php
				$serials = mysqli_query($connect, "select * from serials");
				$serials = mysqli_fetch_all($serials);
				foreach ($serials as $serial) {
					?>
					<div class="block">
						<a href="/content.php?<?=$serial[0]?>">
							<div class="cover_img"><img src="images/<?= $serial[1] ?>.jpg"></div>
						</a>
					</div>
					<?php
				}
			?>
		</div>
	</div>

</body>
</html>