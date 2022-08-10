<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Счетчик</title>
</head>
<body>
		<p><a href="/index.php">Авторизация</a></p>
		<p><a href="/basket.php">Покупка</a></p>
</body>
</html>
<?php
	session_start();

	if (!isset ($_SESSION['counter'])){
		echo "Ещё не обновили страницу";
		$_SESSION['counter'] = 0;
	}
	else {
		$_SESSION['counter']++;
		echo "Количество обновлений: ".$_SESSION['counter'];
	}
	echo "<br><br>";
	if (empty($_COOKIE['pr1'])) {
    	$_COOKIE['pr1'] = 0;
	}
	if (empty($_COOKIE['pr2'])) {
    	$_COOKIE['pr2'] = 0;
	}
	echo "Продукт 1: ".$_COOKIE['pr1']."<br>";
	echo "Продукт 2: ".$_COOKIE['pr2']."<br>";
?>