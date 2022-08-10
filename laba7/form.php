<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Форма</title>
</head>
<body>

</body>
</html>
<?php
	session_start();

	echo "ФИО:<br>";
	echo $_COOKIE['fio']."<br><br>";
	
	echo "Email:<br>";
	echo $_COOKIE['mail']."<br><br>";
	

	if($_COOKIE['yn'] == "no"){
		echo "Не работал раньше<br><br>";
	} else {
		echo "Работал раньше<br><br>";
	}
	
	echo "Языки которыми владеет:<br>";
	foreach($_SESSION['lan'] as $item) echo "$item<br>";
	echo "<br>";
	
	echo "Язык с которым лучше всего владеет:<br>";
	echo $_COOKIE['bestlan']."<br><br>";
	
	echo "О себе:<br>";
	echo $_COOKIE['comment']."<br><br>";
?>