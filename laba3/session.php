<?php
	session_start();
	echo "Login: ".$_SESSION["user"]."<br>";
	echo "Password: ".$_SESSION["pas"];
?>