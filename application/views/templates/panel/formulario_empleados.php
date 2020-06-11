<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
    <li><a href="<?php echo base_url();?>index.php/proyecto/vista_empleados">Personal</a></li>
    <li class="active">Alta de personal</li>
  </ol>

   <center><h1 class="page-header">ALTA DE PERSONAL</h1></center>

     <div class="panel panel-primary">
     <div class="panel-heading">Información personal del trabajador </div>
     <div class="panel-body">
        <?php 
        $atributos= array('class'=>'form-horizontal');
        echo form_open('Proyecto/alta_empleados',$atributos);?>

 <label for="Nombres">Nombre del usuario <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nombrei" value="<?php echo set_value('nombrei');?>" id="Nombres" class="form-control" placeholder="Nombres">
        <?php echo form_error('nombrei');?>
     <br>

    <label for="apellido_pi">Apellido paterno <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="apellido_pi" value="<?php echo set_value('apellido_pi');?>" id="apellido_pi" class="form-control" placeholder="Apellido paterno">
        <?php echo form_error('apellido_pi');?>
   
         <br>
          <label for="Apellido_mi" >Apellido materno <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="apellido_mi" value="<?php echo set_value('apellido_mi');?>" id="Apellido_mi" class="form-control" placeholder="Apellido materno">
         <?php echo form_error('apellido_mi');?>
         <br>
          
        <label for="generoi">Género <span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="generoi" value="Femenino" <?php if(set_value('generoi')=='femenino') echo "checked"; ?> id="generoi"> Femenino</label>
       </div>
       <div class="radio"><label><input type="radio" name="generoi" value="Masculino" <?php if(set_value('generoi')=='masculino') echo "checked"; ?> id="generoi"> Masculino</label>
       </div>
       <br>
       <label>Fecha de nacimiento <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fechai"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fechai');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
        <br>
<label for="requis">Área <span style="color: red" class="asterisco">*</span> </label>
  <select name="areas" class="form-control">
<?php foreach ($areas as $f) {
?>
    <option value="<?=$f->id_privilegio;?>" class="col-sm-2 control-label"><?=$f->nombre_privilegio;?></option>
<?php 
}   
?>
    </select>

     <br>
    <label for="requis">Centro asistencial al que entra <span style="color: red" class="asterisco">*</span> </label>
  <select name="centro" class="form-control">
<?php foreach ($centro as $c) {
?>
    <option value="<?=$c->id_centro;?>" class="col-sm-2 control-label"><?=$c->nombre_centro;?></option>
<?php 
}   
?>
    </select>
        <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label"></label>
       <div class="col-sm-10">
         <input type="hidden" name="usuario" class="form-control" value="<?php echo $sesion['id_usuario'];?>">
         <?php echo form_error('usuario');?>
       </div>
         
       </div>
              
       </div>
       
</div>

<div class="panel panel-primary">
     <div class="panel-heading">Información de la cuenta del trabajador </div>
     <div class="panel-body">

         <label for="correoi" >Correo <span style="color: red" class="asterisco">*</span></label>
        <input  type="email" name="correoi" value="<?php echo set_value('correoi');?>" id="correoi" class="form-control" placeholder="Correo">
         <?php echo form_error('correoi');?>
         <br>
    <label for="contrasena" >Contraseña <span style="color: red" class="asterisco">*</span></label>
        <input  type="contrasena" name="contrasena" value="<?php echo set_value('contrasena');?>" id="contrasena" class="form-control" placeholder="Contraseña">
         <?php echo form_error('contrasena');?>
<br>
</div>
</div>

<button class="btn btn-warning" name="formulario" type="submit">Guardar</button>

       </div></div>
             


      



</div>
</div>

</div>
