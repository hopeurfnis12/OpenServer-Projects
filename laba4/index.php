<?php
	header('Content-Type: text/html; charset=utf-8');

	echo "1. Создайте проверку на существования файла Task.txt.<br>";
	
	$fl = fopen('Task.txt', 'r+') or die('Невозможно открыть файл');
	if($fl == true) echo "Файл открыт";
	echo "<br><br>";


	echo "2. Выведите на экран содержимое файла Task.txt с использованием функции file().<br>";
	
	$arr = file("Task.txt");
	$ar = $arr;
	foreach ($arr as $s) {
		echo "$s <br>";
	}

	
	echo "<br>";

	
	echo "3. Выведите количество предложений и количество строк в тексте Task.txt.<br>";
	
	$words = 0;
	$lines = count(file("Task.txt")); 
	while (false !== ($r = fgetc($fl))) {
		if($r == '.') $words++;
	}

	echo "Предложений = $words <br>";
	echo "Строк = $lines <br>";
	echo "<br>";


	echo "4. Выведите на экран каждую четную строку текста Task.txt.<br>";
	
	for($i = 1; $i <= count($arr); $i++){
		if($i % 2 == 0){
			echo "Строка $i: ".$arr[$i - 1]."<br>";
		}
	}

	echo "<br>";


	echo "5. Замените первое вхождение слова «PHP» в тексте Task.txt на:<br>
		  «PHP (серверный язык программирования)». Сохраните изменения и выведите на экран.<br><br>";
	
	$a = " (серверный язык программирования)";
	$t = 0;
	$l = 0;
	$i = 0;
	$j = 0;
	
	fseek($fl, 0);
	for($i = 0; $i < count($arr); $i++){
		for($j = 0; $j < strlen($arr[$i]); $j++){
			$l++;
			if($arr[$i][$j - 2] == 'P' && $arr[$i][$j - 1] == 'H' && $arr[$i][$j] == 'P' && $t == 0){
				fseek($fl, $l);
				fwrite($fl, $a);
				$t = 1;
				$j++;
				break;
			}
		}
		if($t == 1) break;
		
	}
	
	fseek($fl, 0, SEEK_END);
	//while(!feof($fl)) continue;
	if($t == 1){
		for(; $i < count($arr); $i++){
			for(; $j < strlen($arr[$i]); $j++){
				fwrite($fl, $arr[$i][$j]);
			}
			$j = 0;
		}
	}
	
	$arra = file("Task.txt");
	foreach ($arra as $x) { 	
		echo "$x <br>";
	}

	fclose($fl); //закрываем файловый поток
	
?>