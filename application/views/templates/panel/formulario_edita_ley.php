	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogo</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/leyes">Leyes</a></li>
		  <li class="active">Actualiza Leyes</li>
		</ol>

        <h1 class="page-header">Edición de Leyes</h1>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_ley/'.$leyes['id_ley'],$atributos);
       
      	       ?>
       		<label for="Nombres">Titulo <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="titulo" value="<?php if(set_value('titulo')) echo set_value('titulo'); else {if($leyes) echo $leyes['titulo'];}?>" placeholder="Disposición">
			<?php echo form_error('titulo');?>
 			</br>
  			<input type="hidden" name="id_ley" value="<?php echo $leyes['id_ley']; ?>">
 			<?php echo form_error('id_ley');?>
 			<br>		
			
 		</br>


 		
 			<button type="submit" class="btn btn-primary" name="formulario">Guardar cambios</button>
   	   </form>
 	</div>
  </div>
</div>
