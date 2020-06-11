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
       <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/valoracion_nutriologica/<?php echo $expediente['id_expediente'];?>">
      
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
        echo form_open('proyecto/valoracion_nutriologica/'.$expediente['id_expediente'],$atributos);
        //var_dump($privilegio);
       ?>


<label for="Peso">Peso <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="peso" value="<?php echo set_value('peso');?>" id="Peso" class="form-control" placeholder="Peso">
        <?php echo form_error('peso');?>
<br>
    <label for="Talla">Talla <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="talla" value="<?php echo set_value('talla');?>" id="talla" class="form-control" placeholder="Talla">
        <?php echo form_error('talla');?>
<br>

    <label for="Pesoi">Peso ideal <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="pesoi" value="<?php echo set_value('pesoi');?>" id="pesoi" class="form-control" placeholder="Peso ideal">
        <?php echo form_error('pesoi');?>

    </br>
    <label for="Diagnostico">Diagnostico nutricional <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="diagnostico" value="<?php echo set_value('diagnostico');?>" id="Diagnostico" class="form-control" placeholder="Diagnostico">
        <?php echo form_error('diagnostico');?>
<br>

    <label for="Dieta">Dieta <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="dieta" value="<?php echo set_value('dieta');?>" id="Dieta" class="form-control" placeholder="Dieta">
        <?php echo form_error('dieta');?>
<br>
    <label for="Plan">Plan alimenticio <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="plan" value="<?php echo set_value('plan');?>" id="Plan" class="form-control" placeholder="Plan alimenticio">
        <?php echo form_error('plan');?>
<br>

    <label for="Rasgos">Rasgos fisicos <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="rasgos" value="<?php echo set_value('rasgos');?>" id="Rasgos" class="form-control" placeholder="Rasgos fisicos">
        <?php echo form_error('rasgos');?>
<br>
    <label for="Comedor">Datos del comedor <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="comedor" value="<?php echo set_value('comedor');?>" id="Comedor" class="form-control" placeholder="Datos del comedor">
        <?php echo form_error('comedor');?>
<br>

    <label for="Enfernedad">Enfermedad <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="enfermedad" value="<?php echo set_value('enfermedad');?>" id="Enfermedad" class="form-control" placeholder="Enfermedad">
        <?php echo form_error('enfermedad');?>
<br>

    <label for="Trato">Trato especial <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="trato" value="<?php echo set_value('trato');?>" id="Trato" class="form-control" placeholder="Trato especial">
        <?php echo form_error('trato');?>
<br>

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
