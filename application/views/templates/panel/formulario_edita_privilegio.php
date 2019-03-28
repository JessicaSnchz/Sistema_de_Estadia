	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/privilegios">Privilegios</a></li>
		  <li class="active">Edición de privilegio</li>
		</ol>

        <h1 class="page-header">Edición de privilegio</h1>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_privilegio/'.$privilegio['id_privilegio'],$atributos);
        //var_dump($privilegio);
       ?>
       		<label for="Nombres">Privilegio <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php if(set_value('nombre')) echo set_value('nombre'); else {if($privilegio) echo $privilegio['nombre_privilegio'];}?>" id="Nombres" placeholder="Privilegio">
			<?php echo form_error('nombre');?>
 			</br>
 			<label for="Nombres">Descripción <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="descripcion" value="<?php if(set_value('descripcion')) echo set_value('descripcion'); else {if($privilegio) echo $privilegio['descripcion'];}?>" placeholder="Descripción">
			<?php echo form_error('descripcion');?>
 			</br>
 			<input type="hidden" name="id_privilegio" value="<?php echo $privilegio['id_privilegio']; ?>">
 			<?php echo form_error('id_privilegio');?>
 			<button type="submit" class="btn btn-primary" name="formulario">Edita privilegio</button>
   	   </form>
 	</div>
  </div>
</div>
