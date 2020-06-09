	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/vista_centro">Centros asistenciales</a></li>
		  <li class="active">Edición de centro</li>
		</ol>

        <center><h1 class="page-header">EDICIÓN DE CENTRO ASISTENCIAL</h1></center>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_centro/'.$centro['id_centro'],$atributos);
        //var_dump($privilegio);
       ?>
       		<label for="Nombres">Nombre del centro asistencial <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="centro" value="<?php if(set_value('centro')) echo set_value('centro'); else {if($centro) echo $centro['nombre_centro'];}?>" id="Nombres" placeholder="Nombre centro">
			<?php echo form_error('centro');?>
 			</br>
 			<label for="Nombres">Ubicación <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="ubicacion" value="<?php if(set_value('ubicacion')) echo set_value('ubicacion'); else {if($centro) echo $centro['ubicacion'];}?>" placeholder="Ubicación">
			<?php echo form_error('ubicacion');?>
 			</br>
 			<input type="hidden" name="id_centro" value="<?php echo $centro['id_centro']; ?>">
 			<?php echo form_error('id_centro');?>
 			<button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
   	   </form>
 	</div>
  </div>
</div>
