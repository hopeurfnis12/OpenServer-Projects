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

		<div class="search">
			<form style="margin-top: 20px" method="post" id="searchform">
			   	<input class="search" type="text" name="name" autocomplete="off"> 
			   	<input class="btn" type="submit" name="submit" value="Search"> 
			</form>
			<div class="re" style="display: flex; margin-top: 20px;">
			    <?php
					if(isset($_POST['submit'])){
						if(preg_match("/[A-Z  | a-z]+/", $_POST['name'])){
							$name=$_POST['name'];
							$serials = mysqli_query($connect, "select * from serials where name like '%".$name."%'");
							$serials = mysqli_fetch_all($serials);
							if (empty($serials)) {
								echo  "<p>No Search Results Found!</p>";
							}
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
						} else
						if(empty($_POST['name'])) echo "<p>Please enter at least one keyword.</p>";
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>