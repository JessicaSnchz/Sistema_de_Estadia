      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <ol class="breadcrumb">
</ol>
<?php echo form_open_multipart('Proyecto/do_upload');?>
  <label for="requis">Foto niño <span style="color: red" class="asterisco">*</span> </label>
    <input type="file" name="userfile" size="30" />
    <br /><br />
            <br>
            <div class="panel panel-primary">
     <div class="panel-heading">Información del ingreso</div>
     <div class="panel-body">


    <label for="requis">Centro asistencial al que entra <span style="color: red" class="asterisco">*</span> </label>
  <select name="centro" class="form-control">
<?php foreach ($centro_a as $c) {
?>
    <option value="<?=$c->id_centro;?>" class="col-sm-2 control-label"><?=$c->nombre_centro;?></option>
<?php 
}   
?>
    </select>

    <br>

    <label>Fecha de ingreso <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fechan"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fechan');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>

<br>
<label>Hora de ingreso <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>
  
      <input name="horan" type="time" value="13:00:00" max="23:00:00:a" min="9:00:00:G:a" step="1" class="form-control" id="inputPassword" placeholder="Hora de ingreso">
      <?php echo form_error('horan');?>
    </div>

        <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label"></label>
       <div class="col-sm-10">
         <input type="hidden" name="usuarioni" class="form-control" value="<?php echo $sesion['id_usuario'];?>">
         <?php echo form_error('usuarioni');?>
       </div>
         
       </div>
              
       </div>
       
</div>

   <div class="panel panel-primary">
     <div class="panel-heading">Información personal del niño</div>
     <div class="panel-body">

 <label for="Nombres">Nombre del niño <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nombren" value="<?php echo set_value('nombren');?>" id="Nombres" class="form-control" placeholder="Nombres">
        <?php echo form_error('nombren');?>
     <br>

    <label for="apellido_pn">Apellido paterno <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="apellido_pn" value="<?php echo set_value('apellido_pn');?>" id="apellido_pn" class="form-control" placeholder="Apellido paterno">
        <?php echo form_error('apellido_pn');?>
   
         <br>
          <label for="Apellido_mn" >Apellido materno <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="apellido_mn" value="<?php echo set_value('apellido_mn');?>" id="Apellido_mn" class="form-control" placeholder="Apellido materno">
         <?php echo form_error('apellido_mn');?>
         <br>
        <label for="generon">Género <span class="asterisco">*</span></label>
          <div class="radio">
            <label><input type="radio" name="generon" value="M" <?php if(set_value('generon')=='m') echo "checked";?>>Masculino</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="generon" value="F" <?php if(set_value('generon')=='f') echo "checked";?>>Femenino</label>
        </div>
      <?php echo form_error('generon'); ?>
       <br>
       <label>Fecha de nacimiento <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fechann"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fechann');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
        <br>
    <label for="lugaron">Lugar de nacimiento <span style="color: red" class="asterisco"></span></label>
        <input  type="text" name="lugaron" value="<?php echo set_value('lugaron');?>" id="lugaron" class="form-control" placeholder="Lugar de origen">
        <?php echo form_error('lugaron');?>
   
         <br>
          <label for="municipioon" >Municipio de origen <span style="color: red" class="asterisco"></span></label>
        <input  type="text" name="municipioon" value="<?php echo set_value('municipioon');?>" id="municipioon" class="form-control" placeholder="Municipio de origen">
         <?php echo form_error('municipioon');?>
       </div>
       
</div>


<div class="panel panel-primary">
     <div class="panel-heading">Información de la entrega</div>
     <div class="panel-body">
      <label for="Carpeta">No. Carpeta de investigación <span style="color: red" class="asterisco">*</span></label>
       <input type="tetx" class="form-control" id="Carpeta" name="carpeta" value="<?php echo set_value('carpeta'); ?>" placeholder="No. Carpeta">
           <?php echo form_error('carpeta'); ?>
     <br>
         <label for="Motivos">Motivos de ingreso <span style="color: red" class="asterisco">*</span></label>
         <input type="text" class="form-control" id="Motivos" name="motivos" value="<?php echo set_value('motivos'); ?>" id="motivos" placeholder="Motivos ingreso">
         <?php echo form_error('motivos'); ?>
        <br>
         <label for="Observaciones">Observaciones <span style="color: red" class="asterisco">*</span></label>
          <input type="text" class="form-control" name="observaciones" id="Observaciones" value="<?php echo set_value('observaciones'); ?>" placeholder="Observaciones del estado">
           <?php echo form_error('observaciones'); ?>
           <br>
           <label for="Persona_trae">Nombre de quién lo trae <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="persona_trae" value="<?php echo set_value('persona_trae');?>" id="Persona_trae" placeholder="Nombre de quién lo trae">
      <?php echo form_error('persona_trae');?>
<br>
            
</div>
</div>

</div>
     <button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
   <br>

  <?php  echo form_close(); ?>
          </form>
             </div>
        </div>
  </div>
  