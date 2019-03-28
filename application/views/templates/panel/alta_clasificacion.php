		
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/clasificaciones">Clasificaciones</a></li>
		  <li class="active">Alta de clasificación</li>
		</ol>

        <!--<h1 class="page-header">Alta de dependencias</h1>-->
        <div class="panel panel-primary">
    <div class="panel-heading">Alta de clasificación (Registro públicos municipales)</div>
    <div class="panel-body">
         <?php
        	$atributos = array('class'=>'form-horizontal');
        	echo form_open('proyecto/alta_clasificacion',$atributos);
       	?>
      <label for="Nombre">Clasificación <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre_clasificacion" value="<?php echo set_value('nombre_clasificacion');?>" id="nombre_clasificacion" placeholder="Nombre de la clasificación">
			<?php echo form_error('nombre_clasificacion');?>
 			</br>
 		  <label for="Nombre">Descripción <span class="asterisco">*</span> </label>
      <textarea  type="text" class="form-control" name="descripcion" value="<?php echo set_value('descripcion');?>" id="descripcion" placeholder="Describa la clasificación en cuestión"></textarea>
     </br>
      <?php echo form_error('descripcion');?>
     <label for="Nombre">Identificador <span class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="identificador_c" value="<?php echo set_value('identificador_c');?>" id="identificador_c" placeholder="Ingrese algun caracter que identifique la clasificación">
      <?php echo form_error('identificador_c');?>
      </br>
 			
 			<button type="submit" class="btn btn-primary" name="formulario">Alta de medio</button>
   	       </form>
	</div><!--panel body-->
    </div><!--panel primary-->
 	</div>
  </div>
</div>