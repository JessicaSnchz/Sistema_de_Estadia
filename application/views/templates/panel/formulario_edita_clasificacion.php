 	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogo</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/clasificaciones">Modalidades</a></li>
		  <li class="active">Edición de Clasificaciones (RPM)</li>
		</ol>

        <h1 class="page-header">Edición de Clasificaciones (RPM)</h1>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_clasificacion/'.$clasificaciones['id_clasificacion'],$atributos);
        //var_dump ($areas);
       ?>
       		<label for="Nombres">Clasificación<span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre_clasificacion" value="<?php if(set_value('nombre_clasificacion')) echo set_value('nombre_clasificacion'); else {if($clasificaciones) echo $clasificaciones['nombre_clasificacion'];}?>" id="nombre_clasificacion" placeholder="">
			<?php echo form_error('nombre_clasificacion');?>
 			</br>
 			<label for="Nombres">Descripción <span class="asterisco">*</span> </label>
			<textarea type="text" class="form-control" name="descripcion"><?php if(set_value('descripcion')) echo set_value('descripcion'); else {if($clasificaciones) echo $clasificaciones['descripcion'];}?></textarea> 
			<?php echo form_error('descripcion');?>
 			</br>
 			<label for="Nombres">Identificador <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="identificador_c" value="<?php if(set_value('identificador_c')) echo set_value('identificador_c'); else {if($clasificaciones) echo $clasificaciones['identificador_c'];}?>" placeholder="">
			<?php echo form_error('identificador_c');?>
 		    </br>
			
			<input type="hidden" name="id_clasificacion" value="<?php echo $clasificaciones['id_clasificacion']; ?>">
 			<?php echo form_error('id_clasificacion');?>

 			<button type="submit" class="btn btn-primary" name="formulario">Guardar cambios</button>
   	   </form>

</div>
 