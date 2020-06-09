	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/vista_empleados">Personal</a></li>
		  <li class="active">Edición de estatus</li>
		</ol>

        <center><h1 class="page-header">EDICIÓN DE ESTATUS DE PERSONAL</h1></center>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_estatus_personal/'.$persona['id_persona'],$atributos);
        //var_dump($privilegio);
       ?>
       		<label for="Nombres">Nombres <span class="asterisco">*</span> </label>
			<input type="text" readonly="readonly" class="form-control" name="nombrep" value="<?php if(set_value('nombrep')) echo set_value('nombrep'); else {if($persona) echo $persona['nombres'];}?> <?php if(set_value('apellido_pp')) echo set_value('apellido_pp'); else {if($persona) echo $persona['apellido_p'];}?> <?php if(set_value('apellido_mp')) echo set_value('apellido_mp'); else {if($persona) echo $persona['apellido_m'];}?>" id="Nombres" placeholder="Nombres">
			<?php echo form_error('nombrep');?>
 			</br>
 			<label for="Nombres">Género <span class="asterisco">*</span> </label>
			<input type="text" readonly="readonly"  class="form-control" name="genero" value="<?php if(set_value('genero')) echo set_value('genero'); else {if($persona) echo $persona['genero'];}?>" id="Nombres" placeholder="Género">
			<?php echo form_error('genero');?>
 			<br>
 			<label for="Nombres">Centro asistencial <span class="asterisco">*</span> </label>
			<input type="text" readonly="readonly" class="form-control" name="nombre_centro" value="<?php if(set_value('nombre_centro')) echo set_value('nombre_centro'); else {if($persona) echo $persona['nombre_centro'];}?>" id="Nombres" placeholder="Nombre centro">
			<?php echo form_error('nombre_centro');?>
 			<br>
 			<label for="Nombres">Área <span class="asterisco">*</span> </label>
			<input type="text" readonly="readonly" class="form-control" name="nombre_privilegio" value="<?php if(set_value('nombre_privilegio')) echo set_value('nombre_privilegio'); else {if($persona) echo $persona['nombre_privilegio'];}?>" id="Nombres" placeholder="Apellido materno">
			<?php echo form_error('nombre_privilegio');?>
 			<br>
 			<input type="hidden" name="id_persona" value="<?php echo $persona['id_persona']; ?>">
 			<?php echo form_error('id_persona');?>
 			<label for="nombre">Estatus<span class="asterisco">*</span> </label>
        <div class="radio">
         <label><input type="radio" name="id_estado" value="Activo" <?php if(set_value('id_estado')=='activo') echo "selected"; ?> id="id_estado"> Activo</label>
       </div>
       <div class="radio"><label><input type="radio" name="id_estado" value="Inactivo" <?php if(set_value('id_estado')=='inactivo') echo "selected"; ?> id="id_estado"> Inactivo</label>
       </div>
      <br>
 			<button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
   	   </form>
 	</div>
  </div>
</div>
