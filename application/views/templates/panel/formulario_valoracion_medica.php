<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>index.php/proyecto/expediente_medico">Expedientesn</a></li>
    <li class="active">Valoraión medica</li>
  </ol>

<!--<h2>Formulario de registro</h2>-->

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
      <div class="panel-heading">Información médica del niño</div>
    <div class="panel-body">
    <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/evaluacion_medico/<?php echo $expediente['id_expediente']; ?>/<?php echo $expediente['id_ingreso']; ?>">
     <h5> <b style="color: black;">
   <label for="condicion">Condición inicial: <span class="asterisco">*</span></label>
          <div class="radio">
            <label><input type="radio" name="condicion" value="Buena" <?php if(set_value('condicion')=='Buena') echo "checked";?>>Buena</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="condicion" value="Regular" <?php if(set_value('condicion')=='Regular') echo "checked";?>>Regular</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="condicion" value="Mala" <?php if(set_value('condicion')=='Mala') echo "checked";?>>Mala</label>
        </div>
      <?php echo form_error('condicion'); ?>
  
       <br>
        <label for="des_ini">Descripción inicial de salud a su ingreso: <span style="color: red" class="asterisco">*</span> </label> 
      <input type="text" class="form-control" name="des_ini" value="<?php echo set_value('des_ini');?>" id="descripcion" placeholder="Descripción inicial">
      <?php echo form_error('des_ini');?>
      <br>

         <label for="peso">Peso: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="peso" value="<?php echo set_value('peso');?>" id="peso" placeholder="Ingrese su peso">
      <?php echo form_error('peso');?>
      <br>
        <label for="talla">Talla: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="talla" value="<?php echo set_value('talla');?>" id="talla" placeholder="Asigne la talla">
      <?php echo form_error('talla');?>
      <br>
      <label for="cabeza">Cabeza: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="cabeza" value="<?php echo set_value('cabeza');?>" id="cabeza" placeholder="Descripción de la cabeza">
      <?php echo form_error('cabeza');?>
      <br>
        <label for="ojos">Ojos: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="ojos" value="<?php echo set_value('ojos');?>" id="ojos" placeholder="Descripción de los ojos">
      <?php echo form_error('ojos');?>
      <br>
   
      <br>
        <label for="nariz">Nariz: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="nariz" value="<?php echo set_value('nariz');?>" id="nariz" placeholder="Descripción de la nariz">
      <?php echo form_error('nariz');?>
      <br>
        <label for="boca">Boca: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="boca" value="<?php echo set_value('boca');?>" id="boca" placeholder="Descripción de la boca">
      <?php echo form_error('boca');?>
      <br>
        <label for="cuello">Cuello: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="cuello" value="<?php echo set_value('cuello');?>" id="cuello" placeholder="Descripción del cuello">
      <?php echo form_error('cuello');?>
      <br>
        <label for="torax">Torax: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="torax" value="<?php echo set_value('torax');?>" id="torax" placeholder="Descripción del torax">
      <?php echo form_error('torax');?>
      <br>
        <label for="abdomen">Abdomen: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="abdomen" value="<?php echo set_value('abdomen');?>" id="abdomen" placeholder="Descripción del abdomen">
      <?php echo form_error('abdomen');?>
      <br>
        <label for="genitales">Genitales: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="genitales" value="<?php echo set_value('genitales');?>" id="genitales" placeholder="Descripción de los genitales">
      <?php echo form_error('genitales');?>
      <br>
        <label for="columna">Columna: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="columna" value="<?php echo set_value('columna');?>" id="columna" placeholder="columna">
      <?php echo form_error('columna');?>
      <br>
        <label for="extremidades">Extremidades: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="extremidades" value="<?php echo set_value('extremidades');?>" id="extremidades" placeholder="Descripción de sus extremidades">
      <?php echo form_error('extremidades');?>
      <br>
        <label for="tez">Tés: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="tes" value="<?php echo set_value('tes');?>" id="tes" placeholder="Descripción de su tés">
      <?php echo form_error('tes');?>
      <br>
       
      </select>

      <input type="hidden" name="expediente" value="<?php echo $expediente['id_expediente']; ?>">
      <?php echo form_error('id_expediente');?>

      <?php $fecha_time = date("Y/m/d/");?>
      <input type="hidden" name="fecha_actual" value="<?php echo $fecha_time; ?>">
      <?php echo form_error('fecha_actual');?>

    </div><!--panel body-->
 </div>
<button class="btn btn-warning" name="formulario" type="submit">Guardar</button>
 

</div>
   </div><!--row-->
</div>