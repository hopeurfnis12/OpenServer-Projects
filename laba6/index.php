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
</body>
</html>
<?php
    session_start();
    if(isset($_POST["login"])){
        if($_POST["login"] == $_COOKIE['login']){
            if($_POST["password"] == $_COOKIE['password']){
                header('Location: message.php');
            }
            else{
                echo "Неверный пароль<br>";
            }
        }
        else {
            echo "Неверный логин <br>";
        }
    }
?>