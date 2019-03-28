<div class="col-sm-2 col-sm-offset-9 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_1">Paso 1: Sobre el Trámite/Servicio</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_2_1">Paso 2: Sobre los pasos</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_3_1">Paso 3: Sobre los requisitos</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_4">Paso 4: Sobre los fundamentos jurídicos</a></li>
          <li class="active">Sobre aspectos generales</li>
		</ol>


        <h1 class="page-header">Nueva ficha técnica</h1>
        <div class="col-md-12">
 <div class="panel panel-primary">
      <div class="panel-heading">Paso 5: Sobre los aspectos generales de trámite/servicio</div>
    <div class="panel-body">

 <form  name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/alta_fichat_5/<?php echo $ts['id_ts']; ?>">
      
      <label for="tiempo_res">Tiempo de respuesta:<span class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="tiempo_res" placeholder="Ingrese el tiempo de respuesta promedio del trámite/servicio ante la ciudadanía">
      </br>
      <label for="info_rele">Información relevante en relación los requisitos<span class="asterisco"></span> </label>
      <textarea type="text" class="form-control" name="info_rele" placeholder="Ingrese los aspectos relevantes a considerar en forma de lista"></textarea>
      </br>
      <label for="info_rele_ts">Información relevante en relación al trámite/servicio<span class="asterisco"></span> </label>
      <textarea type="text" class="form-control" name="info_rele_ts" placeholder="Ingrese los aspectos relevantes a considerar en forma de lista"></textarea>
      </br>
      <?php $fecha_time = date("Y/m/d/");?>
      <input type="hidden" name="fecha_actual" value="<?php echo $fecha_time; ?>">
            <?php echo form_error('fecha_actual');?>
      <input type="hidden" name="id_ts" value="<?php echo $ts['id_ts']; ?>">
            <?php echo form_error('id_ts');?>
      <input type="hidden" name="id_us" value="<?php echo $sesion['id_usuario']; ?>">
            <?php echo form_error('id_us');?>
    </br>
    
<button type="submit" name="" value="enviar" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Agregar</button>
</br>
    </form>
  </div>
</div>                      
</div>
