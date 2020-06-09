<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Upload Formulario</title>
</head>
<body>
	<h1>Subir archivo CodeIgniter</h1>	
	<?php echo $error;?>

	<?php echo form_open_multipart('Proyecto/do_upload');?> 
		<input type="file" name="userfile" size="20" />
		<br /><br />
		<input type="submit" value="Subir archivo" />
   
	<?php  echo form_close(); ?>

    
        
</body>
</html>