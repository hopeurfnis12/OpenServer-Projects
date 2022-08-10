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
			$db = mysqli_connect('localhost', 'root', '', 'store');
			$warehouses = mysqli_query($db, "select * from warehouses");
			$warehouses = mysqli_fetch_all($warehouses);
			foreach ($warehouses as $warehouse) {
				?>
				
				<a class="link" href="/warehouse.php?<?=$warehouse[0]?>"><?= $warehouse[1] ?></a>
				
				<br><br>
				
				<?php
			}
		?>
	</div>

</body>
</html>