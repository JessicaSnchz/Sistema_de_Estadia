<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  <li><a href="<?php echo base_url();?>index.php/proyecto/vista_centro">Centros Asistenciales</a></li>
    <li class="active">Alta Centro Asistencial</li>
  </ol>

   <center><h1 class="page-header">ALTA DE CENTRO ASISTENCIAL</h1></center>

        <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label"></label>
       <div class="col-sm-10">
         <input type="hidden" name="usuario" class="form-control" value="<?php echo $sesion['id_usuario'];?>">
       </div>
       </div> 

<div class="panel panel-primary">
     <div class="panel-heading">Información del Centro Asistencial </div>
     <div class="panel-body">
        <?php 
        $atributos= array('class'=>'form-horizontal');
        echo form_open('Proyecto/alta_centro',$atributos);
        ?>
         <label for="centro" >Nombre del Centro Asistencial <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="centro" value="<?php echo set_value('centro');?>" id="centro" class="form-control" placeholder="Centro Asistencial">
         <?php echo form_error('centro');?>
         <br>
    <label for="ubicacion" >Ubicación <span style="color: red" class="asterisco">*</span></label>
        <input type="text" name="ubicacion" value="<?php echo set_value('ubicacion');?>" id="ubicacion" class="form-control" placeholder="Ubicación">
         <?php echo form_error('ubicacion');?>
<br>
<button class="btn btn-warning" name="formulario" type="submit">Guardar</button>
</div>
</div>
             


</div>
</div>

</div>
