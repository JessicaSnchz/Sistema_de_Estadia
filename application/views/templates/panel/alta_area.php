	
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/areas">Áreas</a></li>
		  <li class="active">Alta de Área</li>
		</ol>

	<div class="panel panel-primary">
    <div class="panel-heading">Alta de Área</div>
    <div class="panel-body">
         <?php
        	$atributos = array('class'=>'form-horizontal');
        	echo form_open('proyecto/alta_areas',$atributos);
       	?>
       		<label for="Nombres">Nombre del área <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre_a" value="<?php echo set_value('nombre_a');?>" id="Nombres" placeholder="Nombre del área">
			<?php echo form_error('nombre_a');?>
 			</br>
 			<label for="Nombres">Descripción <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="descripcion" value="<?php echo set_value('descripcion');?>" placeholder="Descripción">
			<?php echo form_error('descripcion');?>
 			</br>
 			<label for="Nombres">Ubicación <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="ubicacion" value="<?php echo set_value('ubicacion');?>" placeholder="Ubicación">
			<?php echo form_error('ubicacion');?>
			</br>
			<label for="Nombres">Dependencia <span class="asterisco">*</span> </label></br> <select type="text" name="id_depe">
					<?php foreach ($dependencias as $d){ ?>
					<option value="<?=$d->id_depe;?>"><?=$d->nombre;?>
					<?php } ?>
					</option>
			</select>
			<?php echo form_error('id_depe');?>
			</br>
		    </br>
			<label for="Nombres">Horario<span class="asterisco">*</span> </label></br>  <select type="text" name="id_horario">
					<?php foreach ($horario as $h){ ?>
					<option value="<?=$h->id_horario;?>"><?=$h->dias." ". $h->horas;?>
					<?php } ?>
					</option>
				</select>
				<?php echo form_error('id_horario');?>
			</br>
		    </br>

 			<button type="submit" class="btn btn-primary" name="formulario">Alta de área</button>
   	   </form>

 	          </div><!--panel body-->
    </div><!--panel primary-->
			

 			
 	</div>
  </div>
</div>