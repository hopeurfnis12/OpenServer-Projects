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
			$s = 0;
			$url = $_SERVER['REQUEST_URI'];
			$id = "";
			for ($i=0; $i < strlen($url); $i++) {
				if($url[$i] != "?" && $t == 0){
					continue;
				}
				if($url[$i] == "?"){
					$i++;
					$t = 1;
				}
				$id .= $url[$i];
			}
			$genre = mysqli_query($connect, "select * from genre where title like '%".$id."%'");
			$genre = mysqli_fetch_all($genre);
			echo "<h1>".$id."</h1><br>";
			foreach ($genre as $gen) {
				$serials = mysqli_query($connect, "select * from serials where id =".$gen[1]."");
				$serials = mysqli_fetch_all($serials);
				foreach ($serials as $serial) {
					?>
					<div class="block">
						<center>
							<div style="border: solid; padding: 20px; background: rgba(0,0,0, .6);">
								<img src="images/<?= $serial[1] ?>.jpg" style="width: auto; height: 200px;">
								<br>
								<a style="font-size: 20px;" class="link" href="/content.php?<?=$serial[0]?>"><?= $serial[1] ?></a>
							</div>
						</center>
					</div>
					<?php
				}
			}
		?>
	</div>

</body>
</html>