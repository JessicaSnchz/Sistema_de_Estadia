 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/vista_ninos">Expedientes niños</a></li>
      <li class="active">Notas psicológicas</li>
    </ol>

       <center> <h1 class="page-header">NOTAS PSICOLÓGICAS</h1> </center>
        <!--<center> <h2 class="page-header">SEDIF</h2> </center>-->
         


 <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/notas/'.$expediente['id_expediente'],$atributos);
        //var_dump($privilegio);
       ?>
 <input type="hidden" name="expediente" value="<?php echo $expediente['id_expediente']; ?>">
      <?php echo form_error('id_expediente');?>


      <div class="panel panel-primary">
      <div class="panel-heading">Notas psicológicas</div>
    <div class="panel-body">




<div class="panel panel-primary">
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
                <label>Género: </label>  <?php echo $expediente['genero_nino']?><br>
              <label>No. Expediente: </label>  <?php echo $expediente['no_expediente'] ?> <br>
              <label>No. Carpeta: </label> <?php echo $expediente['no_carpeta']?><br>
                  <label>Centro asistencial: </label>  <?php echo $expediente['nombre_centro']?> <br/>
                  
              </div>
            </div>
          </div>
      </form>
       </div> 
        </div>



     <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/notas/'.$expediente['id_expediente'],$atributos);
        //var_dump($privilegio);
       ?>
 <input type="hidden" name="expediente" value="<?php echo $expediente['id_expediente']; ?>">
      <?php echo form_error('id_expediente');?>


      <div class="panel panel-primary">
    <div class="panel-body">
 <label for="actividad">Nombre de la actividad:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="actividad" value="<?php echo set_value('actividad');?>" id="actividad" class="form-control" >
        <?php echo form_error('actividad');?>
        <br>
<label>Fecha: <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fecha_n"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fecha_n');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
        <br>

   
       
<center><label for="coment">COMENTARIOS</span></label></center>
        <input  type="text" name="coment" value="<?php echo set_value('coment');?>" id="coment" class="form-control" placeholder="Describa sus cometarios ">
        <?php echo form_error('coment');?>
        <br>
        

        
<br>


  </div>
  </div>
 </div>
  </div>

  <button type="submit" class="btn btn-primary" name="formulario">Guardar</button>