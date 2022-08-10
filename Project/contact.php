<?php require "blocks/connect.php"?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
	<title>erge die</title>
</head>
<body>
	
	<?php require "blocks/header.php"?>

	<div style="margin-top: 40px;">
		<form class="con">
	   		<label for="fname">Name</label>
	   		<br>
	   		<input class="lab" type="text" id="fname" name="firstname" placeholder="Your name.." style="margin-left: 60px;" autocomplete="off">
	   		<br><br>

	   		<label for="lname">Email</label>
	   		<br>
	   		<input class="lab" type="text" id="lname" name="lastname" placeholder="Your email.." style="margin-left: 65px;" autocomplete="off">
	   		<br><br>

	   		<label for="subject">Subject</label>
	   		<br>
	   		<textarea id="subject" name="subject" placeholder="Write something.." style="height:150px"></textarea>
	   		<br><br>
	   		<input class="btn" type="submit" value="Send" style="margin-left: 450px;">
		</form>
	</div>

	<?php require "blocks/footer.php"?>
</body>
</html>