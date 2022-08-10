<p><a href="/index.php">Авторизация</a></p>
<form action="" method="POST">
    msg: <input name="msg" autocomplete="off">
    title: <input name="title" autocomplete="off">
    <input type="submit" name="sub" value="Подтвердить">
</form>

<?php
    include_once("connect.php");
    if(!mysqli_ping($connect))
        die("Ошибка с соединением");
    if(!empty($_POST["title"]) && !empty($_POST["msg"])){
  
        $msg=$_POST["msg"];
        $title=$_POST["title"];
        
        $sql="INSERT INTO message (title,msg) VALUES ('$title', '$msg')";
        
        mysqli_query($connect, $sql);
    }
    else echo "<b>Введите данные</b><br><br>";
    $command = "select * from message";
    $query = mysqli_query($connect, $command);
    if($query){
        while($row = mysqli_fetch_array($query)){
            echo "<b>Title: ".$row['title']."</b><br>";
            echo "Message: ".$row['msg']."<br><br>";
        }
    }
    else echo "Ошибка выполнения";
    mysqli_close($connect);
?>