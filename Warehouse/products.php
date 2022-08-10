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

				if($url[$i] == "?"){
					$i++;
					$t = 1;
				}

				$url_id .= $url[$i];
			}
			$db = mysqli_connect('localhost', 'root', '', 'store');
			$products = mysqli_query($db, "select distinct article, description from products");
			$products = mysqli_fetch_all($products);
			foreach ($products as $product) {
				?>
				<div class="product">
					<h3><b>Артикул: </b> <a style="font-size: 20px;" href="/article.php?<?=$product[0]?>"><?= $product[0] ?></a> </h3>
					<p><b>Описание: </b><?= $product[1] ?> </p>
				</div>
				<?php
			}
		
		?>
	</div>
</body>
</html>