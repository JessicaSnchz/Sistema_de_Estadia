	
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/cargos">Cargos</a></li>
		  <li class="active">Alta de Cargo</li>
		</ol>

	<div class="panel panel-primary">
    <div class="panel-heading">Alta de Cargo</div>
    <div class="panel-body">
         <?php
        	$atributos = array('class'=>'form-horizontal');
        	echo form_open('proyecto/alta_cargo',$atributos);
       	 ?>
       		<label for="Nombres">Nombre del cargo<span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre');?>" id=Nombres"" placeholder="Nombre del cargo">
			<?php echo form_error('nombre');?>
 			</br>
 			<label for="Nombres">Descripción <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="descripcion_c" value="<?php echo set_value('descripcion_c');?>" placeholder="Descripción del puesto">
			<?php echo form_error('descripcion_c');?>
 			</br>
			<!--<label for="Nombres">Área <span class="asterisco">*</span> </label></br> <select type="text" name="id_area">
					<?php //foreach ($areas as $a){ ?>
					<option value="<?=$a->id_area;?>"><?=$a->nombre_a;?>
					
					</option>
			</select>-->

 			<button type="submit" class="btn btn-primary" name="formulario">Alta de cargo</button>
   	   </form>

 	          </div><!--panel body-->
    </div><!--panel primary-->
			

 			
 	</div>
  </div>
</div>