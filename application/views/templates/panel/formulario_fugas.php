     <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
        <li class="active">Cambio a fuga</li>
      </ol>
        <!-- <center>
          <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/formulario_traslados/<?php echo $expediente['id_expediente'];?>" role="button">Traslados</a>

          <a class="btn btn-warning" href="<?php echo base_url();?>index.php/proyecto/formulario_egresos/<?php echo $expediente['id_expediente'];?>" role="button">Egresos</a>

          <a class="btn btn-success" href="<?php echo base_url();?>index.php/proyecto/formulario_fugas/<?php echo $expediente['id_expediente'];?>" role="button">Fugas</a>
         </center>

         <hr>
         <hr>-->

         <h1><center>CAMBIO DE ESTADO A FUGA</center></h1>

         <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label"></label>
       <div class="col-sm-10">
         <input type="hidden" name="usuario" class="form-control" value="<?php echo $sesion['id_usuario'];?>">
       </div>
       </div> 

       <div class="panel panel-primary">
      <div class="panel-heading">Información del niño</div>
    <div class="panel-body">
       <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/formulario_ninos_fugas/<?php echo $expediente['id_expediente'];?>">
      
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


        <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label"></label>
       <div class="col-sm-10">
         <input type="hidden" name="usuario" class="form-control" value="<?php echo $sesion['id_usuario'];?>">
       </div>
       </div> 

<div class="panel panel-primary">
     <div class="panel-heading">Información de la Fuga del niño</div>
     <div class="panel-body">

       <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/formulario_ninos_fugas/<?php echo $expediente['id_expediente'];?>">

        <label for="Nombres">Nombre del centro de procedencia <span style="color: red" class="asterisco">*</span> </label>
        <select class="form-control" name="id_centro">
      <?php foreach ($centr as $a){ ?>
        <option value="<?php echo $a->id_centro;?>"
            <?php 
        if($expediente_n['id_centro'] == $a->id_centro)
        echo "selected";?>
      ><?=$a->nombre_centro;?>
      <?php } ?>
        </option>
      </select>

        <input type="hidden" name="id_centro" class="form-control" value="<?php echo $expediente['id_centro'];?>">

        <input type="hidden" name="id_expediente" class="form-control" value="<?php echo $expediente['id_expediente'];?>">

        <input type="hidden" name="id_incidencia" class="form-control" value="<?php echo $expediente['id_incidencia'];?>">
      <br>
      <label for="Nombres">Nombre del centro de destino <span style="color: red" class="asterisco">*</span> </label>
        <select class="form-control" name="id_centrod">
      <?php foreach ($centr as $a){ ?>
        <option value="<?php echo $a->id_centro;?>"
            <?php 
        if($expediente_n['id_centro'] == $a->id_centro)
        echo "selected";?>
      ><?=$a->nombre_centro;?>
      <?php } ?>
        </option>
      </select>
    </br>
         <label for="fucha_fuga" >Fecha de fuga <span style="color: red" class="asterisco">*</span></label>
        <input  type="date" name="fucha_fuga" value="<?php echo set_value('fucha_fuga');?>" id="fucha_fuga" class="form-control" placeholder="Fecha de fuga">
         <?php echo form_error('fucha_fuga');?>
         <br>
         <label for="motivos_fuga" >Motivos de fuga <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="motivos_fuga" value="<?php echo set_value('motivos_fuga');?>" id="motivos_fuga" class="form-control" placeholder="Motivos de fuga">
         <?php echo form_error('motivos_fuga');?>
         <br>
        <label for="autoriza" >¿El niño ha sido localizado? <span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="localizado" value="Si" <?php if(set_value('localizado')=='Si') echo "checked"; ?> id="localizado"> Si</label>
       </div>
       <div class="radio"><label><input type="radio" name="localizado" value="No" <?php if(set_value('localizado')=='NO') echo "checked"; ?> id="localizado"> No</label>
       </div>
         <br>
        <label for="responsable" >Estancia del niño <span style="color: red" class="asterisco">*</span></label>
        <input type="text" name="responsable" value="<?php echo set_value('responsable');?>" id="responsable" class="form-control" placeholder="Persona responsable">
         <?php echo form_error('responsable');?>
         <br>
<button class="btn btn-warning" name="formulario" type="submit">Guardar</button>
</div>
</div>
             

  

             </div>
        </div>
  </div>

  
