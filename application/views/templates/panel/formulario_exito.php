<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Archivo éxitoso</title>	
	</head>
<body>
	<h3> Tu archivo se ha subido correctamente!! </h3>
	<ul>
		<?php foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
		<?php endforeach; ?>
	</ul>
	<p>
	
	<br /><br />
		<a href="<?php echo base_url();?>index.php/Proyecto/vista_ninos" role="button" >Archivos</a>
   
	</p>

</body>
</html>