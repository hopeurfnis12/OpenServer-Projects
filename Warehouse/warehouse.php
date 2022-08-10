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
		<?php
			$url = $_SERVER['REQUEST_URI'];
			$url_id = "";
			for ($i=0; $i < strlen($url); $i++) {
				if($url[$i] != "?" && $t == 0){
					continue;
				}
				$i++;
				$t = 1;
				$url_id .= $url[$i];
			}
			$db = mysqli_connect('localhost', 'root', '', 'store');
			$warehouses = mysqli_query($db, "select * from warehouses where id =".$url_id."");
			$warehouses = mysqli_fetch_all($warehouses);
			foreach ($warehouses as $warehouse) {
				?>
				
				<h1> <?= $warehouse[1] ?> </h1>
				<br>
				<div style="margin-left: 20px;">
					<b>Телефон:</b> <?= $warehouse[2] ?>
					<br>
					<b>Email:</b> <?= $warehouse[3] ?>
				</div>
				<br><br>
				
				<h2>Товары:</h2>
				<br>
				<?php
				$products = mysqli_query($db, "select * from products where warehouses_id =".$url_id."");
				$products = mysqli_fetch_all($products);
				foreach ($products as $product) {
					?>
					<div class="product">
						<h3><b>Артикул: </b> <a style="font-size: 20px;" href="/article.php?<?=$product[2]?>"><?= $product[2] ?></a> </h3>
						<p><b>Описание: </b> <?= $product[3] ?> </p>
						<p><b>Количество: </b><?= $product[4] ?> </p>
					</div>

					<?php
			}
		}
		?>
	</div>
</body>
</html>