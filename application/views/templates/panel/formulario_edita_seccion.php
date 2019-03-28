	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/secciones">Secciones</a></li>
		  <li class="active">Edición de sección</li>
		</ol>

        <h1 class="page-header">Edición de sección</h1>
         <?php
       		 $atributos = array('class'=>'form-horizontal');
       		 echo form_open('proyecto/edita_seccion/'.$seccion['id_seccion'],$atributos);
     	  ?>
       		<label for="Nombres">Nombre de la sección <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php if(set_value('nombre')) echo set_value('nombre'); else {if($seccion) echo $seccion['nombre_seccion'];}?>" id="Nombres" placeholder="seccion">
			<?php echo form_error('nombre');?>
 			</br>
 			<label for="Nombres">Descripción <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="descripcion" value="<?php if(set_value('descripcion')) echo set_value('descripcion'); else {if($seccion) echo $seccion['descripcion'];}?>" placeholder="Descripción">
			<?php echo form_error('descripcion');?>
 			</br>
 			<label for="Nombres">URL <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="url" value="<?php if(set_value('url')) echo set_value('url'); else {if($seccion) echo $seccion['url'];}?>" placeholder="URL">
			<?php echo form_error('url');?>
			<input type="hidden" name="id_seccion" value="<?php echo $seccion['id_seccion']; ?>">
 			<?php echo form_error('id_seccion');?>
 			</br>
 			<div class="checkbox">
		    <label>
		      <input type="checkbox" name="menu" value="1"
		      	<?php
		      		if(set_value('menu') || $seccion['activo'])
		      			echo "checked";
		     		else
		      			echo "";
		      	?>
		      		> Aparece en el menú
		    </label>
		  </div>
			<?php echo form_error('menu');?>
			<br>
 			<button type="submit" class="btn btn-primary" name="formulario">Editar sección</button>
   	   </form>
 	</div>
  </div>
</div>
