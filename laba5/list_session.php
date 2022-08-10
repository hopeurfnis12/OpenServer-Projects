<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

</body>
</html>

<?php
	session_start();
	echo '<a href="/index.php">Index</a>'."<br>";
	echo "<h1>Добро пожаловать, ".$_COOKIE['login']."</h1><br>";
	echo '<h2>Ваш завтрак: '.$_SESSION["bf"]."</h2><br>";

?>