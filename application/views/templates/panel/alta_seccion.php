		<?php
	//var_dump(form_error());
	//die();
	?>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/secciones">Secciones</a></li>
		  <li class="active">Alta de sección</li>
		</ol>

        <h1 class="page-header">Alta de sección</h1>
         <?php
        	$atributos = array('class'=>'form-horizontal');
        	echo form_open('proyecto/alta_seccion',$atributos);
       	?>
       		<label for="Nombres">Nombre de la sección <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre');?>" id="Nombres" placeholder="Nombre de la sección">
			<?php echo form_error('nombre');?>
 			</br>
 			<label for="Nombres">Descripción <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="descripcion" value="<?php echo set_value('descripcion');?>" placeholder="Descripción">
			<?php echo form_error('descripcion');?>
 			</br>
 			<label for="Nombres">URL <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="url" value="<?php echo set_value('url');?>" placeholder="URL">
			<?php echo form_error('url');?>
			<br>
			<div class="checkbox">
		    <label>
		      <input type="checkbox" value="1" name="menu" <?php if(set_value('menu')) echo "checked"; else echo "";?>> Aparece en el menú
		    </label>
		  </div>
			<?php echo form_error('menu');?>

 			</br>
 			<button type="submit" class="btn btn-primary" name="formulario">Alta de sección</button>
   	   </form>
 	</div>
  </div>
</div>