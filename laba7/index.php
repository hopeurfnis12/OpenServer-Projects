<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Анкета</title>
</head>
<body>
	
	<form method="POST">
  			
  		* ФИО:<br>
		<input type="text" name="fio" size="50" placeholder="Введите ФИО" maxlength="25" autocomplete="off"><br>
		<br>
		
		* Адрес email:<br>
	    <input  type="text" name="mail" placeholder="Введите email" autocomplete="off"><br>	
		<br>


		* Работали ли раньше програмистом<br>
		<input type="radio" name="yn" value="Yes">Да<br>
		<input type="radio" name="yn" value="No">Нет<br>
		<br>
		
		* Какими языками владеете:<br>
		<input type="checkbox" name="lan[]" value="Python">Python<br>
		<input type="checkbox" name="lan[]" value="Java">Java<br>
		<input type="checkbox" name="lan[]" value="JavaScript">JavaScript<br>
		<input type="checkbox" name="lan[]" value="C#">C#<br>
		<input type="checkbox" name="lan[]" value="Swift">Swift<br>
		<br>

		* Каким языком лучше всего владеете:<br>
		<select  name="bestlan" size="1">
			<option value="Python">Python</option>
			<option value="Java">Java</option>
			<option value="JavaScript">JavaScript</option>
			<option value="C#">C#</option>
			<option value="Swift">Swift</option>
		</select><br>
		<br>

	 	* О себе:<br>
	    <textarea rows="5" cols="20" name="comment" placeholder="Опишите себя"></textarea><br>
	    <br>

		<input type="submit"><br>
		<br>
	</form>

</body>
</html>


<?php
	session_start();
	if(empty($_POST["fio"])){
		echo "Вы не написали ФИО<br>";
	} else {
		setcookie('fio', $_POST['fio']);
		if(empty($_POST["mail"])){
			echo "Вы не написали email<br>";
		} else {
			$t = true;
			$f = true;
			for($i = 0; $i < strlen($_POST['mail']); $i++){
				if($_POST['mail'][$i] != '@' && $t == true){
					if(strtoupper($_POST['mail'][$i]) < 'A' && strtoupper($_POST['mail'][$i]) > 'Z' && ($_POST['mail'][$i]) < '0' && ($_POST['mail'][$i]) > '9' && ($_POST['mail'][$i]) != '-' && ($_POST['mail'][$i]) != '_') {
						$f = false;
						break;
					}
				}

				if($_POST['mail'][$i] == '@' && $t == true){
					$t = false;
				} else {
					if($_POST['mail'][$i] == '@' && $t == false){
						$f = false;
						break;
					} else {
						if($t == false){
							if(($_POST['mail'][$i] >= 'a' && $_POST['mail'][$i] <= 'z') ||
								$_POST['mail'][$i] == '.' || $_POST['mail'][$i] == '-'){
								continue;
							} else {
								$f = false;
								break;
							}
						}		
					}
				}
				
				//echo $i."<br>";

			}
			if($f == false){
				echo "Неверно введен email<br>";
				echo $_POST['mail']."<br>";
			} else {
				setcookie('mail', $_POST['mail']);
				if(empty($_POST["yn"])){	
					echo "Вы не ответили на вопрос<br>";
				} else {
					setcookie('yn', $_POST['yn']);			
					if(empty($_POST["lan"])){
						echo "Вы не выбрали какими языками владеете<br>";
					} else {
						$_SESSION['lan'] = $_POST["lan"];
						setcookie('bestlan', $_POST['bestlan']);
						if(empty($_POST["comment"])){	
							echo "Вы не написали о себе<br>";
						} else {
							setcookie('comment', $_POST['comment']);
							header('Location: form.php');
						}
					}
				}
			}
		}
	}

	echo "<br>";	
	echo "Создайте html-страницу для проведения анкетирования (на любую тему).<br><br>";
	echo "	Форма должна содержать:<br>";
	echo "	- кнопочные поля<br>";
	echo "	- текстовые поля<br>";
	echo "	- переключатели-флажки<br>";
	echo "	- radio переключатели<br>";
	echo "	- сворачивающееся меню<br>";
	echo "	- поле ввода электронного адреса<br>";
	echo "	- поле для примечаний (textarea)<br>";
?>