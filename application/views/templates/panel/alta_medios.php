		
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/medios">Medios</a></li>
		  <li class="active">Alta de medios</li>
		</ol>

        <!--<h1 class="page-header">Alta de dependencias</h1>-->
        <div class="panel panel-primary">
    <div class="panel-heading">Alta de medios</div>
    <div class="panel-body">
         <?php
        	$atributos = array('class'=>'form-horizontal');
        	echo form_open('proyecto/alta_medio',$atributos);
       	?>
       		<label for="Nombre">Nombre del medio <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre');?>" id="nombre" placeholder="Nombre del medio de comunicación">
			<?php echo form_error('nombre');?>
 			</br>
 		    </br>
 			
 			<button type="submit" class="btn btn-primary" name="formulario">Alta de medio</button>
   	       </form>
	</div><!--panel body-->
    </div><!--panel primary-->
 	</div>
  </div>
</div>