		
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/modalidades">Modalidades</a></li>
		  <li class="active">Alta de modalidades</li>
		</ol>

        <!--<h1 class="page-header">Alta de dependencias</h1>-->
        <div class="panel panel-primary">
    <div class="panel-heading">Alta de modalidades</div>
    <div class="panel-body">
         <?php
        	$atributos = array('class'=>'form-horizontal');
        	echo form_open('proyecto/alta_modalidad',$atributos);
       	?>
 		 <label for="Nombre">Modalidad <span class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="nombre_modalidad" value="<?php echo set_value('nombre_modalidad');?>" id="nombre_modalidad" placeholder="Nombre de la modalidad">
      <?php echo form_error('nombre_modalidad');?>
      </br>
      <label for="Nombre">Descripción <span class="asterisco">*</span> </label>
      <textarea  type="text" class="form-control" name="descripcion" value="<?php echo set_value('descripcion');?>" id="descripcion" placeholder="Describa la modalidad"></textarea>
     </br>
      <?php echo form_error('descripcion');?>
     <label for="Nombre">Identificador <span class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="identificador" value="<?php echo set_value('identificador');?>" id="identificador" placeholder="Ingrese algun caracter que identifique la modalidad">
      <?php echo form_error('identificador');?>
      </br>
     
 			
 			<button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
   	       </form>
	</div><!--panel body-->
    </div><!--panel primary-->
 	</div>
  </div>
</div>