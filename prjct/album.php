<?php require "connect.php"?>
<?php
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
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet">
	<title>Album</title>
</head>
<body>
	<?php require "header.php"?>

	<div class="content">
		<?php
			$albums = mysqli_query($connect, "select * from albums where id = ".$id."");
			$albums = mysqli_fetch_all($albums);
			foreach ($albums as $album) {
				?>
				<h1> <?= $album[2] ?> </h1>
				<p> <?= $album[3]?></p>
				<?php
				}
		?>
	</div>
</body>
</html>