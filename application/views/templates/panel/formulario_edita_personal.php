	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/vista_empleados">Personal</a></li>
		  <li class="active">Edición de personal</li>
		</ol>

        <center><h1 class="page-header">EDICIÓN DE PERSONAL</h1></center>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_personal/'.$persona['id_persona'],$atributos);
        //var_dump($privilegio);
       ?>
       		<label for="Nombres">Nombres <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombrep" value="<?php if(set_value('nombrep')) echo set_value('nombrep'); else {if($persona) echo $persona['nombres'];}?>" id="Nombres" placeholder="Nombres">
			<?php echo form_error('nombrep');?>
 			</br>
           <label for="Nombres">Apellido paterno <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="apellido_pp" value="<?php if(set_value('apellido_pp')) echo set_value('apellido_pp'); else {if($persona) echo $persona['apellido_p'];}?>" placeholder="Apellido paterno">
			<?php echo form_error('apellido_pp');?>
            <br>
 			<label for="Nombres">Apellido materno <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="apellido_mp" value="<?php if(set_value('apellido_mp')) echo set_value('apellido_mp'); else {if($persona) echo $persona['apellido_m'];}?>" id="Nombres" placeholder="Apellido materno">
			<?php echo form_error('apellido_mp');?>
 			</br>
 			<label for="Nombres">Género <span class="asterisco">*</span> </label>
			<div class="radio">
			  		<label><input type="radio" name="generop" value="Masculino" <?php if(set_value('generop')=='Masculino') echo "selected";?>>Masculino</label>
				</div>
				<div class="radio">
			  		<label><input type="radio" name="generop" value="Femenino" <?php if(set_value('generop')=='Femenino') echo "selected";?>>Femenino</label>
				</div>
			<?php echo form_error('generop');?>
			<br>
 			<label for="Nombres">Correo eléctronico <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="correop" value="<?php if(set_value('correop')) echo set_value('correop'); else {if($persona) echo $persona['correo'];}?>" id="Nombres" placeholder="Correo eléctronico">
			<?php echo form_error('correop');?>
 			<br>
           <label for="Nombres">Area <span class="asterisco">*</span> </label></br> 
			<select class="form-control" name="id_privilegio">
			<?php foreach ($areas as $a){ ?>
				<option value="<?php echo $a->id_privilegio;?>"
						<?php 
				if($persona['id_privilegio'] == $a->id_privilegio)
				echo "selected";?>
			><?=$a->nombre_privilegio;?>
			<?php } ?>
				</option>
			</select>
 			<br>
            <label for="Nombres">Centro asistencial <span class="asterisco">*</span> </label></br> 

 			<select class="form-control" name="id_centro">
			<?php foreach ($centrot as $a){ ?>
				<option value="<?php echo $a->id_centro;?>"
						<?php 
				if($persona['id_centro'] == $a->id_centro)
				echo "selected";?>
			><?=$a->nombre_centro;?>
			<?php } ?>
				</option>
			</select>
 			<br>
 			<input type="hidden" name="id_persona" value="<?php echo $persona['id_persona']; ?>">
 			<?php echo form_error('id_persona');?>
 			<button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
   	   </form>
 	</div>
  </div>
</div>
