		<?php
	//var_dump(form_error());
	//die();
	?>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/horarios">Horarios</a></li>
		  <li class="active">Alta de horarios</li>
		</ol>

        <h1 class="page-header">Alta de horarios</h1>
        
         <?php
        	$atributos = array('class'=>'form-horizontal');
        	echo form_open('proyecto/alta_horario',$atributos);
       	?>
       		<label for="dias">Dias <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="dias" value="<?php echo set_value('dias');?>" id="dias" placeholder="Ejemplo Lunes - Viernes">
			<?php echo form_error('dias');?>
 			</br>
 			<label for="horas">Horas <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="horas" value="<?php echo set_value('horas');?>" placeholder="Ejemplo 07:00 - 16:oo">
			<?php echo form_error('horas');?>
 			</br>
 			</br>
 			<button type="submit" class="btn btn-primary" name="formulario">Agregar horario</button>
   	   </form>
 	</div>
  </div>
</div>