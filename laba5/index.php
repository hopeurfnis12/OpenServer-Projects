<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index</title>
</head>
<body>
	<form action="" method="POST">
		
		<h1> Имя пользователя </h1>
		<input name="login" type="text" placeholder="Введите имя" autocomplete="off">
		<br><br>
		
		<select  name="breakfast" size="1">
 	    	<option selected="selected">Каша</option>
	    	<option>Яичница</option>
	    	<option>Бутерброд</option>
		</select>
		<br><br>

		<button>Войти</button>
		<br><br>

</body>
</html>

<?php
	session_start();	
	if(isset($_POST["login"])){
		setcookie('login', $_POST['login']);
		$_SESSION["bf"] = $_POST["breakfast"];
		header('Location: list_session.php');
    }

    echo "1. Создайте две страницы: index.php и list_session.php <br><br>";
	echo "2. Создайте на первой странице скрипт, сохраняющий в cookie введенное в текстовую строку имя пользователя. <br><br>";
	echo "3. В list_session.php выведите это имя из сохраненного cookie <br><br>";
	echo "4. Добавьте в index.php элемент с выпадающим списком <br><br>";
	echo "5. Создайте скрипт, сохраняющий выбранное блюдо для завтрака в session. <br><br>";
	echo "6. Выведите название завтрака из сохраненной session на странице list_session.php. <br><br>";


?>