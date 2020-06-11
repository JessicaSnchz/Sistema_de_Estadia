     <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     	<ol class="breadcrumb">
 			 <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  			<li class="active">Cambio</li>
			</ol>
         <center>
          <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/formulario_traslados/<?php echo $expediente['id_expediente'];?>" role="button">Traslados</a>

          <a class="btn btn-warning" href="<?php echo base_url();?>index.php/proyecto/formulario_egresos/<?php echo $expediente['id_expediente'];?>" role="button">Egresos</a>

          <a class="btn btn-success" href="<?php echo base_url();?>index.php/proyecto/formulario_fugas/<?php echo $expediente['id_expediente'];?>" role="button">Fugas</a>
         </center>

         <hr>
         <hr>

                <div class="panel panel-primary">
      <div class="panel-heading">Información del niño</div>
    <div class="panel-body">
       <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/valoracion_nutriologica/<?php echo $expediente['id_expediente'];?>">
      
         <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
              <td><center><img src="<?=base_url();?>/assets/img/<?=$expediente['foto_nino'];?>" width='100' height='115'></center></td>
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

          
             </div>
        </div>
  </div>

  
