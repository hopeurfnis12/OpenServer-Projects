<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
</head>
<body>

	<header>
		<div class="header">
			<a href="/">Главная страница</a>
			<a href="/warehouses.php">Склады</a>
			<a href="/products.php">Товары</a>
		</div>
	</header>
	
	<div class="main">

		<div class="search">
			
			<form style="margin-top: 20px" method="post" id="searchform">
				<select autofocus name="select">
					<option selected value="warehouse">По складу</option>
					<option value="article">По артиклу</option>
				</select>
			   	<input class="search" type="text" name="name" autocomplete="off"> 
			   	<input class="button" type="submit" name="submit" value="Поиск"> 
			</form>
			
			<div class="result">
			    <?php
					$db = mysqli_connect('localhost', 'root', '', 'store');
					if(isset($_POST['submit'])){
						if(preg_match("/[A-Z  | a-z | 0-9 | А-Я | а-я]+/", $_POST['name'])){
							$name=$_POST['name'];
							if($_POST["select"] == "warehouse"){
								$warehouses = mysqli_query($db, "select * from warehouses where address like '%".$name."%'");
								$warehouses = mysqli_fetch_all($warehouses);
								if (empty($warehouses)) {
									echo "<p>К сожалению ничего не нашли</p>";
								}
								foreach ($warehouses as $warehouse) {
									?>
									<a class="link" href="/warehouse.php?<?=$warehouse[0]?>"><?= $warehouse[1] ?></a>
									<br><br>
									<?php
								}
							}
							if($_POST["select"] == "article") {
								$products = mysqli_query($db, "select distinct article from products where article like '%".$name."%'");
								$products = mysqli_fetch_all($products);
								if (empty($products)) {
									echo  "<p>К сожалению ничего не нашли</p>";
								}
								foreach ($products as $product) {
									?>
									<a class="link" href="/article.php?<?=$product[0]?>"> <?= $product[0] ?> </a>
									<br><br>
									<?php
								}
							}
						} else
						if(empty($_POST['name'])) echo "<p>Вы ничего не написали</p>";
					}
				?>
			</div>

		</div>


	</div>
</body>
</html>