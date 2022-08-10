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
			echo "<h1>".$url_id."</h1><br>";
			$db = mysqli_connect('localhost', 'root', '', 'store');
			$products = mysqli_query($db, "select * from products where article =".$url_id."");
			$products = mysqli_fetch_all($products);
			foreach ($products as $product) {
				?>
				<div class="product">
					<?php
					$warehouses = mysqli_query($db, "select * from warehouses where id =".$product[1]."");
					$warehouses = mysqli_fetch_all($warehouses);
					foreach ($warehouses as $warehouse) {
						?>
						
						<a class="link" href="/warehouse.php?<?=$warehouse[0]?>"><?= $warehouse[1] ?></a>

						<?php
					}
					?>
					<p><b>Описание: </b><?= $product[3] ?> </p>
					<p><b>Количество: </b><?= $product[4] ?> </p>
				</div>
				<?php
			}
		
		?>
	</div>
</body>
</html>