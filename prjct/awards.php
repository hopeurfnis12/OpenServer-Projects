<?php require "connect.php"?>
<?php
	$url = $_SERVER['REQUEST_URI'];
	$id = "";
	$t = 0;
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
	<title>Awards</title>
</head>
<body>
	<?php require "header.php"?>

	<div class="content">
		<?php
			echo '<h1>Награды</h1><br>';
			$awards = mysqli_query($connect, "select * from awards where artist_id = ".$id."");
			$awards = mysqli_fetch_all($awards);
			foreach ($awards as $award) {
				?>
				<h2> <?= $award[2] ?> </h2>
				<div class="list">
					<?php
					if(!empty($award[3])){
						?>
						<div class="list_nominee">
							<h3>Nominee</h3>
							<p><?= $award[3] ?></p>
						</div>
						<?php
					}
					?>
					
					<?php
					if(!empty($award[4])){
						?>
						<div class="list_wins">
							<h3>Wins</h3>
							<p><?= $award[4] ?></p>
						</div>
						<?php
					}
					?>

				</div>
				<br><br>
				<?php
			}
		?>
	</div>
</body>
</html>