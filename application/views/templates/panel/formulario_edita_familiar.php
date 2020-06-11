  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/vista_ninos">Registros de niños</a></li>
      <li class="active">Alta familiar</li>
    </ol>

        <center><h1 class="page-header">ALTA DE FAMILIAR</h1></center>
         
         <div class="panel panel-primary">
      <div class="panel-heading">Información del familiar</div>
    <div class="panel-body">

         <?php

        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_familiar/'.$ingreso['id_ingreso'],$atributos);
        //var_dump($privilegio);
       ?>
          
   <label for="nombre_f">Nombre familiar: <span class="asterisco">*</span></label>
        <input type="text" class="form-control" name="nombre_f" value="<?php echo set_value('nombre_f');?>" id="nombre_f" placeholder="Nombre">

            <?php echo form_error('nombre_f');?>
      </br>

      <label for="apellido_pf">Apellido paterno <span class="asterisco">*</span></label>
        <input type="text" class="form-control" name="apellido_pf" value="<?php echo set_value('apellido_pf');?>" id="apellido_pf" placeholder="Apellido paterno">
            <?php echo form_error('apellido_pf');?>
      </br>
      <label for="apellido_mf">Apellido materno <span class="asterisco">*</span></label>
        <input type="text" class="form-control" name="apellido_mf" value="<?php echo set_value('apellido_mf');?>" id="apellido_mf" placeholder="Apellido materno">
         <?php echo form_error('apellido_mf');?>
        <br>
       <label for="genero_f">Género <span style="color: red" class="asterisco">*</span></label>
        <div class="radio">
         <label><input type="radio" name="genero_f" value="Femenino" <?php if(set_value('genero_f')=='femenino') echo "checked"; ?> id="genero_f"> Femenino</label>
       </div>
       <div class="radio"><label><input type="radio" name="genero_f" value="Masculino" <?php if(set_value('genero_f')=='masculino') echo "checked"; ?> id="genero_f"> Masculino</label>
       </div>
    
       <br>
      <label>Fecha de nacimiento <span style="color: red" class="asterisco">*
     </span></label>
        <div class=input-group> <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fecha_naf"
        step="1"
        min="1900-01-01"      
        max="2100-12-31" class="btn btn-default" style="color: gray;"
        placeholder="año-mes-dia" >
        <?php echo form_error('fecha_naf');?>
      <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
          <br>
           <label for="Parentesco">Parentesco con el niño(a):<span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="relacion" value="Padre/Madre" <?php if(set_value('relacion')=='Padre/Madre') echo "checked"; ?> id="relacion"> Padre/Madre</label>
       </div>
       <div class="radio"><label><input type="radio" name="relacion" value="Padrino/Madrina" <?php if(set_value('relacion')=='Padrino/Madrina') echo "checked"; ?> id="relacion"> Padrino/Madrina</label>
       </div>
        <div class="radio"><label><input type="radio" name="relacion" value="Tio(a)" <?php if(set_value('relacion')=='Tio(a)') echo "checked"; ?> id="relacion">Tio(a)</label>
       </div>
        <div class="radio"><label><input type="radio" name="relacion" value="Primo(a)" <?php if(set_value('relacion')=='Primo(a)') echo "checked"; ?> id="relacion">Primo(a) </label>
       </div>
        <div class="radio"><label><input type="radio" name="relacion" value="Otro" <?php if(set_value('relacion')=='Otro') echo "checked"; ?> id="relacion"> Otro</label>
       </div>
      
      <input type="hidden" name="ingreso" value="<?php echo $ingreso['id_ingreso']; ?>">
      <?php echo form_error('id_ingreso');?>
      </div>
      </div>

      <button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
       </form>
  </div>
  </div>
</div>
