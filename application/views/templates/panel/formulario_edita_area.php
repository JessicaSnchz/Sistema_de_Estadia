 	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogo</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/areas">Áreas</a></li>
		  <li class="active">Edición de Área</li>
		</ol>

        <h1 class="page-header">Edición de Área</h1>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_area/'.$areas['id_area'],$atributos);
        //var_dump ($areas);
       ?>
       		<label for="Nombres">Área<span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre_a" value="<?php if(set_value('nombre_a')) echo set_value('nombre_a'); else {if($areas) echo $areas['nombre_a'];}?>" id="nombre_a" placeholder="">
			<?php echo form_error('nombre_a');?>
 			</br>
 			<label for="Nombres">Descripción <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="descripcion" value="<?php if(set_value('descripcion')) echo set_value('descripcion'); else {if($areas) echo $areas['descripcion'];}?>" placeholder="">
			<?php echo form_error('descripcion');?>
 			</br>
 			<label for="Nombres">Ubicación <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="ubicacion" value="<?php if(set_value('ubicacion')) echo set_value('ubicacion'); else {if($areas) echo $areas['ubicacion'];}?>" placeholder="">
			<?php echo form_error('ubicacion');?>
 		    </br>
			<label for="Nombres">Dependencia <span class="asterisco">*</span> </label></br> <select type="text" name="id_depe">
			<?php foreach ($dependencias as $d){ ?>
				<option value="<?php echo $d->id_depe;?>"
						<?php 
				if($areas['id_depe'] == $d->id_depe)
				echo "selected";?>
			><?=$d->nombre;?>
			<?php } ?>
				</option>
			</select>
		    </br>
			</br>
			<label for="Nombres">Horario <span class="asterisco">*</span> </label></br> <select type="text" name="id_horario">
			<?php foreach ($horario as $h){ ?>
				<option value="<?php echo $h->id_horario;?>"
						<?php 
				if($areas['id_horario'] == $h->id_horario)
				echo "selected";
					?>
			><?=$h->dias.": ".$h->horas;?>
			<?php } ?>
				</option>
			</select>
			</br>
			</br>
				<input type="hidden" name="id_area" value="<?php echo $areas['id_area']; ?>">
 			<?php echo form_error('id_area');?>

 			<button type="submit" class="btn btn-primary" name="formulario">Guardar cambios</button>
   	   </form>

</div>
 