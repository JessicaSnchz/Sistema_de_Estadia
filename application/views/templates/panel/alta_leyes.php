<?php
	//var_dump(form_error());
	//die();
	?>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/leyes">Leyes</a></li>
		  <li class="active">Alta de Leyes</li>
		</ol>

        <h1 class="page-header">Alta de dependencias</h1>
         <?php
        	$atributos = array('class'=>'form-horizontal');
        	echo form_open('proyecto/alta_leyes',$atributos);
        	
       	?>
       		<label for="Nombres">Disposición<span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="titulo" value="<?php echo set_value('titulo');?>" placeholder="Disposición">
			<?php echo form_error('titulo');?>
 			</br>
 			
			</br>
 			<button type="submit" class="btn btn-primary" name="formulario">Alta Ley</button>
   	   </form>
 	</div>
  </div>
</div>