<div class="container">

    <div class="col-md-8">

<h2>Formulario de registro</h2>

 <div class="panel panel-primary">
      <div class="panel-heading">Información personal</div>
    <div class="panel-body">

    <?php
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/formulario_usuario',$atributos); 
     ?>

      <label for="Nombres">Nombres <span class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="nombres" value="<?php echo set_value('nombres');?>" id="Nombres" placeholder="Nombres">
      <?php echo form_error('nombres');?>
      </br>
      <label for="Apellido_p">Apellido paterno <span class="asterisco">*</span></label>
        <input type="text" class="form-control" name="apellido_p" value="<?php echo set_value('apellido_p');?>" id="Apellido_p" placeholder="Apellido paterno">
            <?php echo form_error('apellido_p');?>
      </br>
      <label for="Apellido_m">Apellido materno <span class="asterisco">*</span></label>
        <input type="text" class="form-control" name="apellido_m" value="<?php echo set_value('apellido_m');?>" id="Apellido_m" placeholder="Apellido materno">
         <?php echo form_error('apellido_m');?>
        </br>
        <label for="genero">Género <span class="asterisco">*</span></label>
          <div class="radio">
            <label><input type="radio" name="genero" value="M" <?php if(set_value('genero')=='m') echo "checked";?>>Masculino</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="genero" value="F" <?php if(set_value('genero')=='f') echo "checked";?>>Femenino</label>
        </div>
      <?php echo form_error('genero'); ?>
      <?php echo form_error('genero'); ?>
      </br>
      <label for="fecha">Fecha de nacimiento <span class="asterisco">*</span></label> (día-mes-año)
              <div class=input-group> <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="text" class="form-control" name="fecha" value="<?php if(set_value('fecha')) echo set_value('fecha'); ?>" id="dp1" >
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
          <?php echo form_error('fecha'); ?>
    </div><!--panel body-->
 </div>

 <div class="panel panel-primary">
      <div class="panel-heading">Información de la cuenta</div>
    <div class="panel-body">
        <label for="Correo">Correo electrónico <span class="asterisco">*</span></label>
        <input type="email" class="form-control" id="Correo" name="correo" value="<?php echo set_value('correo'); ?>" placeholder="Correo electrónico">
            <?php echo form_error('correo'); ?>
      </br>
          <label for="exampleInputPassword1">Contraseña <span class="asterisco">*</span></label>
          <input type="password" class="form-control" name="contrasena" id="exampleInputPassword1" placeholder="Contraseña">
          <?php echo form_error('contrasena'); ?>
          </br>
           <label for="exampleInputPassword2">Confirmar contraseña <span class="asterisco">*</span></label>
          <input type="password" class="form-control" name="contrasena_conf" id="exampleInputPassword2" placeholder="Confirmar contraseña">
           <?php echo form_error('contrasena_conf'); ?>
    </div><!--panel body-->
  </div><!--panel primary-->

 <div class="panel panel-primary">
    <div class="panel-heading">Aviso de privacidad</div>
  <div class="panel-body">
          <a href="#" data-toggle="modal" data-target="#myModal">Ver aviso de privacidad</a>
            </br>
          <input type="checkbox" name="aviso" <?php if(set_value('aviso')) echo "checked"; ?>> He leído y acepto el aviso de privacidad. <span class="asterisco">*</span>
          <?php echo form_error('aviso'); ?>

    </div><!--panel body-->
 </div><!--panel primary-->

        <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Aviso de privacidad</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

      <button class="btn btn-primary" data-toggle="modal" data-target="#myModal1" type="submit"  name="formulario">Registrar usuario</button>
       <div id="myModal1" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <!--<button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Reasignar caso</h4>-->
                              </div>
                              <div class="modal-body">
                                <h4>¡El usuario ha sido registrado exitosamente!</h4>
                              </div>
                              <div class="modal-footer">
                                <a href="<?php echo base_url();?>index.php/proyecto?>" type="button" class="btn btn-primary btn-sm" data-dismiss="modal" rol="button"><span class="glyphicon glyphicon-remove"></span> Cerrar></a>

                              </div>
                            </div>
                          </div>
                        </div>
    </form>


  </div>
   </div><!--row-->
</div>