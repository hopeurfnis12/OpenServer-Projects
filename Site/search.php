<?php require "connect.php"?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
	<title>Search</title>
</head>
<body>
	<?php require "header.php"?>
	<div class="all">
		<form style="margin-top: 20px" method="post" id="searchform">
	    	<input class="search" type="text" name="name" autocomplete="off"> 
	    	<input class="btn" type="submit" name="submit" value="Search"> 
	    </form>
	    <br>
	    <div class="re">
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
							<a class="smalllink" style="font-size: 30px;" href="/serial.php?<?=$serial[0]?>"><?= $serial[1] ?></a>
							<br><br>
							<?php
						}
					} else
					if(empty($_POST['name'])) echo "<p>Please enter at least one keyword.</p>";
				}
			?>
		</div>
	</div>
</body>
</html>