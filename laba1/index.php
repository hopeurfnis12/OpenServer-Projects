<?php

    echo "1. <br>";
    $a = 18;
    echo "a = $a <br>";
    $b = $a % 10;
    $c = floor($a/10);
    $d = $b + $c;
    echo "$c + $b = $d <br>";
    if($d % 3 == 0) echo "Делится на 3 <br>";
    else echo "Неделится на 3 <br>";


    echo "<br>2. <br>";
    $a = 124;
    $b = $a * $a;
    $c = $a % 10;
    $d = floor(($a % 100)/10);
    $f = floor($a/100);
    echo "a = ".$a."<br>";
    echo "$a^2= ".$a*$a."<br>";
    echo "$f^3= ".$f*$f*$f."<br>";
    echo "$d^3= ".$d*$d*$d."<br>";
    echo "$c^3= ".$c*$c*$c."<br>";
    $s2 = ($f*$f*$f) + ($d*$d*$d) + ($c*$c*$c);
    if($s2 == $b)
    echo "".$f*$f*$f." + ".$d*$d*$d." + ".$c*$c*$c." = $s2"." равно ".$a*$a."<br>";
    else echo "".$f*$f*$f." + ".$d*$d*$d." + ".$c*$c*$c." = $s2"." не равно ".$a*$a."<br>";


    echo "<br>3. <br>";
    $a = 3;
    $b = 1;
    $c = 3;
    echo "a = $a<br>";
    echo "b = $b<br>";
    echo "c = $c<br>";
    if($a == $b && $b == $c) echo "a = b = c <br>";
    else{
        if($a == $b) echo "a = b <br>";
        else{
            if($b == $c) echo "b = c <br>";
            else{
                if($a == $c) echo "a = c <br>";
                else echo "Нет пар <br>";
            }
        }
    }


    echo "<br>4. <br>";
    $a = array(1, 0, 4, -2, -3, 9);
    $t = 0;
    $b = 1;
    for($i = 0; $i < count($a); $i++){
        if(($a[$i] < 0) && ($t == 0)){
            $t = 1;
        }
        echo "$a[$i] ";
    }
    echo "<br>";
    if($t == 1){
        echo "Индекс отрицательных чисел: ";
        for($i = 0; $i < count($a); $i++){
            if($a[$i] < 0) echo $i+$b." ";
        }
        echo "<br>";
    }
    else echo "Нет отрицательных чисел <br>";


    echo "<br>5. <br>";
    $ss = "loolodas lolosda llo lolo lolo llosa lolosda.";
    $s = array();
    $st = 0;
    $a = 0;
    $sum = 0;
    echo "$ss <br>";
    
    for($i = 0; $i < strlen($ss); $i++){
        if($ss[$i] == ' ' || $ss[$i] == '.'){
            $st = $i + 1;
            array_push($s, substr($ss, $a, $st-$a-1));
        }
        $a = $st;
    }

    for($i = 0; $i < count($s); $i++){
        $p = 0;
        for($j = $i + 1; $j < count($s); $j++){
            if($s[$j] == $s[$i]){
                $s[$j] = "+";
                $p++;
            }
        }
        if($p != 0)
            $s[$i] = "+";
    }

    for($i = 0; $i < count($s); $i++){
        if($s[$i] == "+")
            $sum++;
    }

    echo "Количество одинаковых слов = $sum"
    
?>