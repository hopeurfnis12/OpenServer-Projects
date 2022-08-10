<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Авторизация</title>
</head>
<body>
	<form action="" method="POST">
		<label> Логин </label>
		<input name="login" type="text" placeholder="Введите логин" autocomplete="off">
		<br><br>
		<label> Пароль </label>
		<input name="password" type="password" placeholder="Введите пароль">
		<br><br>
		<button>Войти</button>

		<p><a href="/registr.php">Зарегистрироваться</a></p>
		<p><a href="/purchase.php">Счетчик обновления</a></p>
		<p><a href="/basket.php">Покупка</a></p>
</body>
</html>
<?php
	session_start();
	if(isset($_POST["login"])){
		if($_POST["login"] == $_COOKIE['login']){
			if($_POST["password"] == $_COOKIE['password']){
				header('Location: cookie.php');
			}
			else{
				echo "Неверный пароль<br>";
			}
		}
		else {
			echo "Неверный логин <br>";
		}
	}
	echo "<br>";
	echo "1. Регистрация и авторизация пользователей (страница index.php, используется cookie).<br>";
	echo "2. Счетчик обновления страницы для выбора товаров (страница purchase.php, используется session).<br>";
	echo "3. Список приобретенных товаров (выводится после подтверждения выбора продуктов на странице basket.php).<br>";
?>