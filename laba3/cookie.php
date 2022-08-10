<?php
	if(isset($_COOKIE["login"])){
    	$user = $_COOKIE['login'];
    	$pas = $_COOKIE['password'];
    	echo "<h2>Просмотр cookie-записи</h2>";
    	echo "<h3>Добро пожаловать, $user!<br>Ваш пароль, $pas</h3>";
	}
?>
