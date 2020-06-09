<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Panel</a></li>
    <li><a href="<?php echo base_url();?>index.php/proyecto/expediente_incidencia">Expedientes</a></li>
    <li class="active">Cambio a Traslado</a></li>
  </ol>

<div class="panel panel-primary">
      <div class="panel-heading">Información del niño</div>
    <div class="panel-body">
       <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/formulario_ninos_traslados/<?php echo $expediente['id_expediente'];?>">
      
         <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
              <td><center><img src="<?=base_url();?>/assets/img/<?=$expediente['foto_nino'];?>" width='300' height='315'></center></td>
                <!--<?php echo $expediente['foto_nino']?>-->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <label>Nombre del niño: </label> <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?><br>
              <label>No. Expediente: </label>  <?php echo $expediente['no_expediente'] ?> <br>
              <label>No. Carpeta: </label> <?php echo $expediente['no_carpeta']?><br>
              <label>Fecha de nacimiento: </label>  <?php echo $expediente['fecha_nnino']?><br/>
                <label>Edad: </label>  <br/>
                <label>Género: </label> <?php echo $expediente['genero_nino']?> <br>
                <label>Lugar de nacimiento: </label>  <?php echo $expediente['lugar_nnino']?> <br>
                <label>Municipio de origen:  </label>  <?php echo $expediente['municipio_origen']?><br>
                <label>Fecha de ingreso: </label>  <?php echo $expediente['fecha_ingreso']?> <br/>
                  <label>Hora de ingreso: </label>  <?php echo $expediente['hora_ingreso']?> <br/>
                  <label>Centro asistencial: </label>  <?php echo $expediente['nombre_centro']?> <br/>
                  <label>Motivos de ingreso: </label> <?php echo $expediente['motivos_ingreso']?><br/>
                  <label>Observaciones del ingreso </label> <?php echo $expediente['observaciones_ingreso']?>
              </div>
            </div>
          </div>
      </form>
       </div> 
        </div>


 <div class="panel panel-primary">
      <div class="panel-heading">Información del traslado del menor</div>
    <div class="panel-body">
    <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/formulario_ninos_traslados/<?php echo $expediente['id_expediente'];?>">

   <label for="Nombres">Centro asistencial en el que está <span class="asterisco">*</span> </label></br> 

      <select class="form-control" name="id_centro">
      <?php foreach ($cen as $a){ ?>
        <option value="<?php echo $a->id_centro;?>"
            <?php 
        if($expediente_n['id_centro'] == $a->id_centro)
        echo "selected";?>
      ><?=$a->nombre_centro;?>
      <?php } ?>
        </option>
      </select>
    <br>
        <label for="Nombres">Centro asistencial al que entra <span class="asterisco">*</span> </label></br> 
        <select name="id_centroe" class="form-control">
        <?php foreach ($centro_tras as $c) {
        ?>
    <option value="<?=$c->id_centro;?>" class="col-sm-2 control-label"><?=$c->nombre_centro;?></option>
     <?php 
     }   
     ?>
    </select>

    <br>

    <label>Fecha del traslado <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fecha_traslado"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fecha_traslado');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
        <br>
        <label for="Nombres">Motivos del traslado<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="motivos_traslado" value="<?php echo set_value('motivos_traslado');?>" id="Nombres" class="form-control" placeholder="Motivos del traslado">
        <?php echo form_error('motivos_traslado');?>
      <br>
        <label for="Nombres">Persona que autoriza (encargada)<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="autoriza" value="<?php echo set_value('autoriza');?>" id="Nombres" class="form-control" placeholder="Nombre de quién autoriza">
        <?php echo form_error('autoriza');?>
     <br>
         

      <input type="hidden" name="id_expediente" value="<?php echo $expediente['id_expediente']; ?>">
      <?php echo form_error('id_expediente');?>


      <!--<?php $fecha_time = date("Y/m/d/");?>
      <input type="hidden" name="fecha_actual" value="<?php echo $fecha_time; ?>">
      <?php echo form_error('fecha_actual');?>-->

    </div><!--panel body-->
 </div>
<button class="btn btn-warning" name="formulario" type="submit">Guardar</button>
 

</div>
   </div><!--row-->
</div>