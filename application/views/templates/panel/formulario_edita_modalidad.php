 	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogo</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/modalidades">Modalidades</a></li>
		  <li class="active">Edición de Modalidad</li>
		</ol>

        <h1 class="page-header">Edición de Modalidad</h1>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_modalidad/'.$modalidades['id_modalidad'],$atributos);
        //var_dump ($areas);
       ?>
       		<label for="Nombres">Modalidad<span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre_modalidad" value="<?php if(set_value('nombre_modalidad')) echo set_value('nombre_modalidad'); else {if($modalidades) echo $modalidades['nombre_modalidad'];}?>" id="nombre_modalidad" placeholder="">
			<?php echo form_error('nombre_a');?>
 			</br>
 			<label for="Nombres">Descripción <span class="asterisco">*</span> </label>
			<textarea type="text" class="form-control" name="descripcion"><?php if(set_value('descripcion')) echo set_value('descripcion'); else {if($modalidades) echo $modalidades['descripcion'];}?></textarea>
			<?php echo form_error('descripcion');?>
 			</br>
 			<label for="Nombres">Identificador <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="identificador" value="<?php if(set_value('identificador')) echo set_value('identificador'); else {if($modalidades) echo $modalidades['identificador'];}?>" placeholder="">
			<?php echo form_error('identificador');?>
 		    </br>
			
			<input type="hidden" name="id_modalidad" value="<?php echo $modalidades['id_modalidad']; ?>">
 			<?php echo form_error('id_modalidad');?>

 			<button type="submit" class="btn btn-primary" name="formulario">Guardar cambios</button>
   	   </form>

</div>
 