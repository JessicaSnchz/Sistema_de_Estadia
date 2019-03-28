	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/usuarios">Usuarios</a></li>
		  <li class="active">Edita usuario</li>
		</ol>

        <h1 class="page-header">Edición de Usuarios</h1>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_usuario/'.$usuario['id_usuario'],$atributos);
        //var_dump($privilegio);
       ?>
       		<label for="Nombres">Nombres<span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php if(set_value('nombre')) echo set_value('nombre'); else {if($privilegio) echo $privilegio['nombre_privilegio'];}?>" id="Nombres" placeholder="Privilegio">
			<?php echo form_error('nombre');?>
 			</br>
 			<label for="Nombres">Apellido paterno<span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php if(set_value('nombre')) echo set_value('nombre'); else {if($privilegio) echo $privilegio['nombre_privilegio'];}?>" id="Nombres" placeholder="Privilegio">
			<?php echo form_error('nombre');?>
		</br>
 			<label for="Nombres">Apellido materno<span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="descripcion" value="<?php if(set_value('descripcion')) echo set_value('descripcion'); else {if($privilegio) echo $privilegio['descripcion'];}?>" placeholder="Descripción">
			<?php echo form_error('descripcion');?>
 			</br>
 			<label for="Nombres">Género<span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php if(set_value('nombre')) echo set_value('nombre'); else {if($privilegio) echo $privilegio['nombre_privilegio'];}?>" id="Nombres" placeholder="Privilegio">
			<?php echo form_error('nombre');?>
 		</br>
 		<div class="form-group">
				Tipo de privilegio <select type="text" name="privilegio">
					<?php foreach ($privilegio as $p){ ?>
						<option value="<?=$var->id_privilegio;?>"><?=$p->id_privilegio;?>
						<?php } ?>
					</option>
				</select>
</div>
			  	
 	</br>
 			<input type="hidden" name="id_privilegio" value="<?php echo $privilegio['id_privilegio']; ?>">
 			<?php echo form_error('id_privilegio');?>
 			<button type="submit" class="btn btn-primary" name="formulario">Edita privilegio</button>
   	   </form>
 	</div>
  </div>
</div>
