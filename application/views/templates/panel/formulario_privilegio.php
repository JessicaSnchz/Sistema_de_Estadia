	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/privilegios">Privilegios</a></li>
		  <li class="active">Alta de privilegio</li>
		</ol>

        <h1 class="page-header">Alta de privilegio</h1>
         <?php
        	$atributos = array('class'=>'form-horizontal');
        	echo form_open('proyecto/alta_privilegio',$atributos);
       	?>
       		<label for="Nombres">Privilegio <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre');?>" id="Nombres" placeholder="Privilegio">
			<?php echo form_error('nombre');?>
 			</br>
 			<label for="Nombres">Descripción <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="descripcion" value="<?php echo set_value('descripcion');?>" placeholder="Descripción">
			<?php echo form_error('descripcion');?>
 			</br>
 			<button type="submit" class="btn btn-primary" name="formulario">Alta de privilegio</button>
   	   </form>
 	</div>
  </div>
</div>