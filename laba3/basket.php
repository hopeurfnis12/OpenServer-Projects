<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Покупка</title>
</head>
<body>
	<p><a href="/index.php">Авторизоваться</a></p>
	<form method="POST">

		<label> Продукт 1: </label>
		<input name="pr1" type="number" placeholder="Введите количество" autocomplete="off">
		<br><br>
		
		<label> Продукт 2: </label>
		<input name="pr2" type="number" placeholder="Введите количество" autocomplete="off">
		<br><br>
		
		<input type="submit" name="sub" value="Подтвердить">
</body>
</html>

<?php
	session_start();
	if(isset($_POST["pr1"])){
		setcookie('pr1', $_POST['pr1']);
		setcookie('pr2', $_POST['pr2']);
		header('Location: purchase.php');
	}
?>
