<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
</head>
<body>
	<form action="registr.php" method="POST">
		
		<label> Логин </label>
		<input name="login" type="text" placeholder="Введите логин" autocomplete="off">
		<br><br>
		
		<label> Пароль </label>
		<input name="password" type="password" placeholder="Введите пароль">
		<br><br>
		
		<input type="submit" name="sub" value="Зарегестрироваться" >
		
		<p><a href="/index.php">Авторизоваться</a></p>
</body>
</html>

<?php
	session_start();
	if(isset($_POST["login"])){
		setcookie('login', $_POST['login']);
		setcookie('password', $_POST['password']);
		header('Location: index.php');
	}
?>