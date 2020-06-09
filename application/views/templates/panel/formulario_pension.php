<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Formulario de pensiones</h1>
          
          <!-- Main jumbotron for a primary marketing message or call to action -->
  
     <div class="panel panel-primary">
        <div class="panel-heading">Información del depositante </div>
  <div class="panel-body">

    <?php
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/formulario_pension',$atributos); 
     ?>

			
    
            <label for="Nombres">Nombre del depositante: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="nombres" value="<?php echo set_value('nombres');?>" id="Nombres" placeholder="Nombres">
      <?php echo form_error('nombres');?>
      </br>
      <label for="Apellido_pd">Apellido paterno: <span style="color: red" class="asterisco">*</span></label>
        <input type="text" class="form-control" name="apellido_p" value="<?php echo set_value('apellido_pd');?>" id="Apellido_pd" placeholder="Apellido paterno">
            <?php echo form_error('apellido_pd');?>
      </br>
      <label for="Apellido_m">Apellido materno: <span style="color: red" class="asterisco">*</span></label>
        <input type="text" class="form-control" name="apellido_md" value="<?php echo set_value('apellido_md');?>" id="Apellido_md" placeholder="Apellido materno">
         <?php echo form_error('apellido_md');?>
        </br>
        <label for="generod">Género:<span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="generod" value="f" <?php if(set_value('generod')=='f') echo "checked"; ?> id="generod"> Femenino</label>
       </div>
       <div class="radio"><label><input type="radio" name="generod" value="m" <?php if(set_value('generod')=='m') echo "checked"; ?> id="generod"> Masculino</label>
       </div>
       <br>
      
           <label for="Parentesco">Parentesco con el niño(a):<span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="parentesco" value="a" <?php if(set_value('parentesco')=='a') echo "checked"; ?> id="parentesco"> Padre/Madre</label>
       </div>
       <div class="radio"><label><input type="radio" name="parentesco" value="b" <?php if(set_value('parentesco')=='b') echo "checked"; ?> id="parentesco"> Padrino/Madrina</label>
       </div>
        <div class="radio"><label><input type="radio" name="parentesco" value="c" <?php if(set_value('parentesco')=='c') echo "checked"; ?> id="parentesco">Tio(a)</label>
       </div>
        <div class="radio"><label><input type="radio" name="parentesco" value="d" <?php if(set_value('parentesco')=='d') echo "checked"; ?> id="parentesco">Primo(a) </label>
       </div>
        <div class="radio"><label><input type="radio" name="parentesco" value="e" <?php if(set_value('parentesco')=='e') echo "checked"; ?> id="parentesco"> Otro</label>
       </div>
       <br>
</div><!--panel body-->
 </div><!--panel body-->


     <div class="panel panel-primary">
        <div class="panel-heading">Información del depósito </div>
  <div class="panel-body">
          <label for="totaldep">Cantidad de depósito: <span style="color: red" class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="totaldep" value="<?php echo set_value('totaldep');?>" id="totaldep" placeholder="$">
      <?php echo form_error('totaldep');?>
      <br>

      <label for="fecha">Fecha de deposito: <span style="color: red" class="asterisco">(día-mes-año) *</span></label> 
              <div class=input-group> <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="text" class="form-control" name="fecha" value="<?php if(set_value('fecha')) echo set_value('fecha'); ?>" id="dp1" >
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
          <?php echo form_error('fecha'); ?>
        <br>
     
      </div><!--panel body--></div><!--panel body-->
    
<button class="btn btn-warning" type="submit">Guardar</button>
</div>
   </div><!--row-->



</div>