    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Usuario</a></li>
		  <li class="active">Edición de persona</li>
		  

 <div class="panel panel-primary">
      <div class="panel-heading">Información personal</div>
    <div class="panel-body">

    <?php
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/usuarios/'.$persona['id_persona'],$atributos);

        
     ?>

			<label for="Nombres">Nombres <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombres" value="<?php if(set_value('nombres')) echo set_value('nombres'); else {if($persona) echo $persona['nombres'];}?>" id="nombres" placeholder="">
			<?php echo form_error('nombres');?>
 			</br>
 			<label for="Apellido_p">Apellido paterno <span class="asterisco">*</span></label>
		    <input type="text" class="form-control" name="ape_pat" value="<?php if(set_value('ape_pat')) echo set_value('ape_pat'); else {if($persona) echo $persona['ape_pat'];}?>" placeholder="">
			<?php echo form_error('ape_pat');?>
		 	</br>
		 	<label for="Apellido_m">Apellido Materno <span class="asterisco">*</span></label>
		    <input type="text" class="form-control" name="ape_mat" value="<?php if(set_value('ape_mat')) echo set_value('ape_mat'); else {if($persona) echo $persona['ape_mat'];}?>" placeholder="">
			<?php echo form_error('ape_mat');?>
		  	</br>
		    <input type="text" class="form-control" name="genero" value="<?php if(set_value('genero')) echo set_value('genero'); else {if($persona) echo $persona['genero'];}?>" placeholder="">
			<div class="radio">
			  		<label><input type="radio" name="genero" value="M" <?php if(set_value('genero')=='m') echo "checked";?>>Masculino</label>
				</div>
				<div class="radio">
			  		<label><input type="radio" name="genero" value="F" <?php if(set_value('genero')=='f') echo "checked";?>>Femenino</label>
				</div>
			<?php echo form_error('genero');?>
			<label for="fecha">Fecha de nacimiento <span class="asterisco">*</span></label> (día-mes-año)
          		<div class=input-group> <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
				<input type="text" class="form-control" name="fecha" value="<?php if(set_value('fecha')) echo set_value('fecha');  else {if($persona) echo $persona['fecha_nac'];}?> "  id="dp1"  placeholder="" ?>
				<span class="add-on"><i class="icon-calendar" id="cal"></i></span>
				</div>
       		<?php echo form_error('fecha'); ?>
    </div><!--panel body-->
 </div><!--panel primary-->
					

  		 <label for="Apellido_m">Numero de empleado <span class="asterisco">*</span></label>
		    <input type="text" class="form-control" name="num_empleado" value="<?php if(set_value('num_empleado')) echo set_value('num_empleado'); else {if($persona) echo $persona['num_empleado'];}?>" placeholder="">
			<?php echo form_error('num_empleado');?>
			 </br>
		   	<label for="Nombres">Area <span class="asterisco">*</span> </label></br> 
			<select type="text"  class="form-control" name="id_area">
			<?php foreach ($areas as $a){ ?>
				<option value="<?php echo $a->id_area;?>"
						<?php 
				if($persona['id_area'] == $a->id_area)
				echo "selected";?>
			><?=$a->nombre_a;?>
			<?php } ?>
				</option>
			</select>
			<br>
			<label for="Nombres">cargo <span class="asterisco">*</span> </label></br> 
			<select type="text"  class="form-control" name="id_cargo">
			<?php foreach ($cargos as $c){ ?>				<option value="<?php echo $c->id_cargo;?>"
						<?php 
				if($persona['id_cargo'] == $c->id_cargo)
				echo "selected";?>
			><?=$c->nombre;?>
			<?php } ?>
				</option>
			</select>
			<br>

			<label for="Email">Email <span class="asterisco">*</span></label>
		    <input type="text" class="form-control" name="correo" value="<?php if(set_value('correo')) echo set_value('correo'); else {if($persona) echo $persona['correo'];}?>" placeholder="">
			<?php echo form_error('correo');?>
			 </br>

			 <input type="hidden" name="id_persona" value="<?php echo $persona['id_persona']; ?>">
 			<?php echo form_error('id_persona');
 			

 			?>

 			

		  <button type="submit" class="btn btn-primary" name="formulario">Guardar Cambios</button>
		

		</form>

	</div>
   </div><!--row-->

</div>
