<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/usuarios">Usuarios</a></li>
		  <li class="active">Asigna privilegio</li>
		</ol>

	<div class="panel panel-primary">
    <div class="panel-heading">Asigna privilegio</div>
    <div class="panel-body">

		    <?php
		        $atributos = array('class'=>'form-horizontal');
		        echo form_open('proyecto/asigna_privilegio/'.$usuarios['id_usuario'],$atributos); 
		     ?>

			<label for="Nombres">Usuario <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="usuario" value="<?php if(set_value('usuario')) echo set_value('usuario'); else {if($usuarios) echo $usuarios['usuario'];}?>" id="usuario" readonly="">
			<?php echo form_error('usuario');?>
 			</br>
 			<label for="password">Contraseña <span class="asterisco">*</span></label>
		    <input type="password" class="form-control" name="contraseña" value="<?php if(set_value('contrasena')) echo set_value('contrasena'); else {if($usuarios) echo $usuarios['contrasena'];}?>" id="contrasena" readonly="">
            <?php echo form_error('contrasena');?>
		 	</br>
		 	<label for="text">Activo <span class="asterisco">*</span></label>
		    <input type="text" class="form-control" name="activo" value="<?php if(set_value('activo')) echo set_value('activo'); else {if($usuarios){if($usuarios['activo'] == '1') echo "Si"; else{echo "No";}}}?>" id="activo" readonly="">
		  	 <?php echo form_error('activo');?>
		  	</br>
		   	<label for="Nombres">Privilegio <span class="asterisco">*</span> </label></<br><select type="text" name="id_privilegio" class="form-control">
				<?php 
					foreach ($privilegios as $p){ 
				?>
					<option value="<?=$p->id_privilegio;?>"><?=$p->nombre_privilegio;?>
						<?php 
							} 
						?>
					</option>
			</select>
         	</br>
         	<input type="hidden" name="id_usuario" value="<?php echo $usuarios['id_usuario']; ?>">
 			<?php echo form_error('id_usuario');?>

          <button type="submit" class="btn btn-primary" name="formulario">Asignar</button>
   	   </form>

 	          </div><!--panel body-->
    </div><!--panel primary-->
			

 			
 	</div>
  </div>
</div>