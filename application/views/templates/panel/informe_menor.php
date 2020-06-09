 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/vista_ninos">Expedientes niños</a></li>
      <li class="active">Visita domiciliaria</li>
    </ol>

       <center> <h1 class="page-header">VALORACIÓN PSICOLÓGICA DEL MENOR</h1> </center>

<div class="panel panel-primary">
    <center> <div class="panel-heading"> 1. IDENTIFICACIÓN</div></center> 
    <div class="panel-body">
       <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/visita_domiciliaria/<?php echo $expediente['id_expediente'];?>">
      
         <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
              <td><center><img src="<?=base_url();?>/uploadt/<?=$expediente['foto_nino'];?>" width='200' height='215'></center></td>
                <!--<?php echo $expediente['foto_nino']?>-->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <label>Nombre del menor: </label> <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?><br>
                  <label>Género: </label>  <?php echo $expediente['genero_nino']?><br/>
                  <br/>
                 <label>Fecha de nacimiento: </label>  <?php echo $expediente['fecha_nnino']?><br/>
              <label>No. Expediente: </label>  <?php echo $expediente['no_expediente'] ?> <br>
              <label>No. Carpeta: </label> <?php echo $expediente['no_carpeta']?><br>
             
                <label>Fecha de ingreso: </label>  <?php echo $expediente['fecha_ingreso']?> <br/>
                  <label>Hora de ingreso: </label>  <?php echo $expediente['hora_ingreso']?> <br/>
                  <label>Centro asistencial: </label>  <?php echo $expediente['nombre_centro']?> <br/>
                  <label>Motivos de ingreso: </label> <?php echo $expediente['motivos_ingreso']?><br/>
                  
              </div>
            </div>
          </div>
      </form>
       </div> 
        </div>



     <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/informe_menor/'.$expediente['id_expediente'],$atributos);
        //var_dump($privilegio);
       ?>
 <input type="hidden" name="expediente" value="<?php echo $expediente['id_expediente']; ?>">
      <?php echo form_error('id_expediente');?>


      <div class="panel panel-primary">
    <center> <div class="panel-heading">2. FAMILIOGRAMA</div></center> 
    <div class="panel-body">
 <label for="familiograma"></label>
        <input  type="text" name="familiograma" value="<?php echo set_value('familiograma');?>" id="familiograma" class="form-control" placeholder="Descripción de su familia">
        <?php echo form_error('familiograma');?>
        <br>  
</div>
</div>

      <div class="panel panel-primary">
    <center> <div class="panel-heading">3. ANTECEDENTES</div></center> 
    <div class="panel-body">
 <label for="antec_m"></label>
        <input  type="text" name="antec_m" value="<?php echo set_value('antec_m');?>" id="antec_m" class="form-control" placeholder="Descripción de sus antecedentes ">
        <?php echo form_error('antec_m');?>
        <br>  
</div>
</div>
              <div class="panel panel-primary">
    <center> <div class="panel-heading">4. INSTRUMENTOS CLINICOS UTILIZADOS PARA LA VALORACIÓN</div></center> 
    <div class="panel-body">
 <label for="instrumentos"></label>
        <input  type="text" name="instrumentos" value="<?php echo set_value('instrumentos');?>" id="instrumentos" class="form-control" placeholder="instrumentos utlilizados ">
        <?php echo form_error('instrumentos');?>
        <br>  
</div>
</div> 
      <div class="panel panel-primary">
    <center> <div class="panel-heading">5. RESULTADOS DE LA VALORACIÓN</div></center> 
    <div class="panel-body">
 <label for="resul"></label>
        <input  type="text" name="resul" value="<?php echo set_value('resul');?>" id="resul" class="form-control" placeholder="Descripción de resultados ">
        <?php echo form_error('resul');?>
        <br>  
</div>
</div>
      <div class="panel panel-primary">
    <center> <div class="panel-heading">6. IMPRESIÓN DIAGNOSTICA </div></center> 
    <div class="panel-body">
 <label for="impresion"></label>
        <input  type="text" name="impresion" value="<?php echo set_value('impresion');?>" id="impresion" class="form-control" placeholder="Descripción de impresión ">
        <?php echo form_error('impresion');?>
        <br>  
</div>
</div>
      <div class="panel panel-primary">
    <center> <div class="panel-heading">7. RECOMENDACIONES </div></center> 
    <div class="panel-body">
 <label for="recomen"></label>
        <input  type="text" name="recomen" value="<?php echo set_value('recomen');?>" id="recomen" class="form-control" placeholder="Descripción de recomendaciones ">
        <?php echo form_error('recomen');?>
        <br>  
</div>
</div>
<br>

<button type="submit" class="btn btn-primary" name="formulario">Guardar</button>

  </div>
  </div>
</div>