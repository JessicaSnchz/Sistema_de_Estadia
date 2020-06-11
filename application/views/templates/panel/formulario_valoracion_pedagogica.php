  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/expediente_pedagogia">Expedientes niños</a></li>
      <li class="active">Valoración</li>
    </ol>

       <center> <h1 class="page-header">ALTA DE VALORACIÓN</h1> </center>

<div class="panel panel-primary">
      <div class="panel-heading">Información del niño</div>
    <div class="panel-body">
       <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/valoracion_pedagogica/<?php echo $expediente['id_expediente'];?>">
      
         <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
              <td><center><img src="<?=base_url();?>/uploadt/<?=$expediente['foto_nino'];?>" width='300' height='315'></center></td>
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
                <label>Género: </label>  
                 <?php if(($expediente['genero_nino'])=="F"){
                  ?>
                  <span>Femenino</span>
                <?php
                }
                else{
                  ?>
                  <span>Masculino</span>
                  <?php 
                }?> <br/>
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
      <div class="panel-heading">Información de la valoración</div>
    <div class="panel-body">

     <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/valoracion_pedagogica/'.$expediente['id_expediente'],$atributos);
        //var_dump($privilegio);
       ?>

<label for="Parentesco">Rango de edad: <span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="rango" value="0-3" <?php if(set_value('rango')=='0-3') echo "checked"; ?> id="rango"> 0 - 3 años</label>
       </div>
       <div class="radio"><label><input type="radio" name="rango" value="4-7" <?php if(set_value('rango')=='4-7') echo "checked"; ?> id="rango"> 4 - 7 años</label>
       </div>
        <div class="radio"><label><input type="radio" name="rango" value="8-11" <?php if(set_value('rango')=='8-11') echo "checked"; ?> id="rango">8 - 11 años</label>
       </div>
        <div class="radio"><label><input type="radio" name="rango" value="12-15" <?php if(set_value('rango')=='12-15') echo "checked"; ?> id="rango">12 - 15 años</label>
       </div>
        <div class="radio"><label><input type="radio" name="rango" value="16-18" <?php if(set_value('rango')=='16-18') echo "checked"; ?> id="rango"> 16 - 18 años</label>
       </div>
<br>
<label for="Estudios">Estudios <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="estudios" value="<?php echo set_value('estudios');?>" id="Estudios" class="form-control" placeholder="Estudios">
        <?php echo form_error('estudios');?>
<br>
<label for="nombre">Desempeño en la lectura <span class="asterisco">*</span> </label>
    </br>
      <?php 
        foreach ($nivel as $l) {
      ?>
     <div>
          <input type="radio" class="form-control.radio " id="lectura" name="lectura" value="<?=$l->id_nivel;?>"> <?=$l->nombre;?>
     </div>
      <?php }?>
      <?php echo form_error('lectura');?> 
    </br>
    <label for="Observaciones1">Observaciones <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="observaciones1" value="<?php echo set_value('observaciones1');?>" id="Observaciones1" class="form-control" placeholder="Observaciones">
        <?php echo form_error('observaciones1');?>
<br>
<label for="nombre">Comprensión lectora <span class="asterisco">*</span> </label>
    </br>
      <?php 
        foreach ($nivel as $cl) {
      ?>
     <div>
          <input type="radio" class="form-control.radio " id="comp_lectura" name="comp_lectura" value="<?=$cl->id_nivel;?>"> <?=$cl->nombre;?>
     </div>
      <?php }?>
      <?php echo form_error('comp_lectura');?> 
    </br>
    <label for="Observaciones6">Observaciones <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="observaciones6" value="<?php echo set_value('observaciones6');?>" id="Observaciones6" class="form-control" placeholder="Observaciones">
        <?php echo form_error('observaciones6');?>
<br>
<label for="nombre">Desempeño en transcripción <span class="asterisco">*</span> </label>
    </br>
      <?php 
        foreach ($nivel as $t) {
      ?>
     <div>
          <input type="radio" class="form-control.radio " id="transcripcion" name="transcripcion" value="<?=$t->id_nivel;?>"> <?=$t->nombre;?>
     </div>
      <?php }?>
      <?php echo form_error('transcripcion');?> 
    </br>
    <label for="Observaciones2">Observaciones <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="observaciones2" value="<?php echo set_value('observaciones2');?>" id="Observaciones2" class="form-control" placeholder="Observaciones">
        <?php echo form_error('observaciones2');?>
<br>
<label for="nombre">Desempeño matematico <span class="asterisco">*</span> </label>
    </br>
      <?php 
        foreach ($nivel as $m) {
      ?>
     <div>
          <input type="radio" class="form-control.radio " id="matematico" name="matematico" value="<?=$m->id_nivel;?>"> <?=$m->nombre;?>
     </div>
      <?php }?>
      <?php echo form_error('matematico');?> 
    </br>
    <label for="Observaciones3">Observaciones <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="observaciones3" value="<?php echo set_value('observaciones3');?>" id="Observaciones3" class="form-control" placeholder="Observaciones">
        <?php echo form_error('observaciones3');?>
<br>
<label for="nombre">Desempeño en español <span class="asterisco">*</span> </label>
    </br>
      <?php 
        foreach ($nivel as $e) {
      ?>
     <div>
          <input type="radio" class="form-control.radio " id="espanol" name="espanol" value="<?=$e->id_nivel;?>"> <?=$e->nombre;?>
     </div>
      <?php }?>
      <?php echo form_error('espanol');?> 
    </br>
    <label for="Observaciones4">Observaciones <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="observaciones4" value="<?php echo set_value('observaciones4');?>" id="Observaciones4" class="form-control" placeholder="Observaciones">
        <?php echo form_error('observaciones4');?>
<br>
<label for="nombre">Desempeño en escritura/ortografia <span class="asterisco">*</span> </label>
    </br>
      <?php 
        foreach ($nivel as $o) {
      ?>
     <div>
          <input type="radio" class="form-control.radio " id="ortografico" name="ortografico" value="<?=$o->id_nivel;?>"> <?=$o->nombre;?>
     </div>
      <?php }?>
      <?php echo form_error('ortografico');?> 
    </br>
    <label for="Observaciones5">Observaciones <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="observaciones5" value="<?php echo set_value('observaciones5');?>" id="Observaciones5" class="form-control" placeholder="Observaciones">
        <?php echo form_error('observaciones5');?>
<br>
<label for="nombre">Canalización de estudios <span class="asterisco">*</span> </label>
    </br>
      <?php 
        foreach ($estudios as $es) {
      ?>
     <div>
          <input type="radio" class="form-control.radio " id="canalizacion" name="canalizacion" value="<?=$es->id_educacion;?>"> <?=$es->nombre_educacion;?>
     </div>
      <?php }?>
      <?php echo form_error('canalizacion');?> 

      <input type="hidden" name="expediente" value="<?php echo $expediente['id_expediente']; ?>">
      <?php echo form_error('id_expediente');?>

      <?php $fecha_time = date("Y/m/d/");?>
      <input type="hidden" name="fecha_actual" value="<?php echo $fecha_time; ?>">
      <?php echo form_error('fecha_actual');?>

        </div> 
        </div>
  <button type="submit" class="btn btn-primary" name="formulario">Guardar</button>

  </div>
  </div>
</div>
