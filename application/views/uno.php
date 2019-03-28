<!DOCTYPE html>
<html>
<head>
	<title>Página uno</title>
</head>
<body>
	<h1>Bienvenido a la página 1</h1>
	<p>Nombre: <?php echo $nombre; ?></p>
	<p>Número: <?php echo $numero;?></p>
	<p>Días de la semana:</p>
		<ul>
			<?php
			foreach($arreglo as $a){
			?>
			<li><?php echo $a; ?></li>
			<?php
			}	
			?>
		</ul>

</body>
</html>