<?php require "connect.php"?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
	<title>Home</title>
</head>
<body>
	
	<?php require "header.php"?>

	<div class="content">			
		<form method="post" id="searchform">
			<select name="select">
				<option value="Artists">Artists</option>
				<option value="Albums">Albums</option>
			</select>
	    	<input class="search" type="text" name="name" autocomplete="off"> 
	    	<input class="btn" type="submit" name="submit" value="Search"> 
	    </form>
	    <div class="result">
		    <?php
				if(isset($_POST['submit'])){
					
					if(preg_match("/[A-Z  | a-z]+/", $_POST['name'])){
						$name=$_POST['name'];
					
						if($_POST["select"] == "Artists"){
							$artists = mysqli_query($connect, "select * from artists where artist like '%".$name."%'");
							$artists = mysqli_fetch_all($artists);
							if (empty($artists)) {
								echo  "<p>No Search Results Found!</p>";
							}
							foreach ($artists as $artist) {
								?>
								<a href="/persona.php?<?=$artist[0]?>"><?= $artist[1] ?></a>
								<br><br>
								<?php
							}
						}
						if($_POST["select"] == "Albums") {
							$albums = mysqli_query($connect, "select * from albums where album like '%".$name."%'");
							$albums = mysqli_fetch_all($albums);
							if (empty($albums)) {
								echo  "<p>No Search Results Found!</p>";
							}
							foreach ($albums as $album) {
								?>
								<a class="link_album" href="/album.php?<?=$album[0]?>"> <?= $album[2]; ?> </a>
								<br><br>
								<?php
							}
						}
					}
					
					else
					if(empty($_POST['name'])) echo "<p>Please enter at least one keyword.</p>";
				}
			?>
		</div>
	</div>
</body>
</html>