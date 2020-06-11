	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/vista_ninos_ts">Registros de niños</a></li>
		  <li class="active">Edición de ingreso</li>
		</ol>

        <center><h1 class="page-header">EDICIÓN DE INGRESO</h1></center>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_ingreso/'.$ingreso['id_ingreso'],$atributos);
        //var_dump($privilegio);
       ?>
       		<label for="Nombres">Nombres <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombren" value="<?php if(set_value('nombren')) echo set_value('nombren'); else {if($ingreso) echo $ingreso['nombres_nino'];}?>" id="Nombres" placeholder="Nombres">
			<?php echo form_error('nombren');?>
 			</br>
           <label for="Nombres">Apellido paterno <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="apellido_pn" value="<?php if(set_value('apellido_pn')) echo set_value('apellido_pn'); else {if($ingreso) echo $ingreso['apellido_pnino'];}?>" placeholder="Apellido paterno">
			<?php echo form_error('apellido_pn');?>
            <br>
 			<label for="Nombres">Apellido materno <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="apellido_mn" value="<?php if(set_value('apellido_mn')) echo set_value('apellido_mn'); else {if($ingreso) echo $ingreso['apellido_mnino'];}?>" id="Nombres" placeholder="Apellido materno">
			<?php echo form_error('apellido_mn');?>
 			</br>
 			<label for="Nombres">Fecha de nacimiento <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="fechann" value="<?php if(set_value('fechann')) echo set_value('fechann'); else {if($ingreso) echo $ingreso['fecha_nnino'];}?>" id="Nombres" placeholder="Apellido materno">
			<?php echo form_error('fechann');?>
 			</br>
 			<label for="Nombres">Género <span class="asterisco">*</span> </label>
			<div class="radio">
			  		<label><input type="radio" name="generon" value="Masculino" <?php if(set_value('generon')=='Masculino') echo "selected";?>>Masculino</label>
				</div>
				<div class="radio">
			  		<label><input type="radio" name="generon" value="Femenino" <?php if(set_value('generon')=='Femenino') echo "selected";?>>Femenino</label>
				</div>
			<?php echo form_error('generon');?>
			<br>
 			<label for="Nombres">Lugar de origen <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="origen" value="<?php if(set_value('origen')) echo set_value('origen'); else {if($ingreso) echo $ingreso['lugar_nnino'];}?>" id="Nombres" placeholder="Correo eléctronico">
			<?php echo form_error('origen');?>
 			<br>
 			<label for="Nombres">Municipio de origen <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="municipio" value="<?php if(set_value('municipio')) echo set_value('municipio'); else {if($ingreso) echo $ingreso['municipio_origen'];}?>" id="Nombres" placeholder="Correo eléctronico">
			<?php echo form_error('municipio');?>
 			<br>
 			<label for="Nombres">Número de Carpeta <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="carpeta" value="<?php if(set_value('carpeta')) echo set_value('carpeta'); else {if($ingreso) echo $ingreso['no_carpeta'];}?>" id="Nombres" placeholder="Correo eléctronico">
			<?php echo form_error('carpeta');?>
 			<br>
 			<label for="Nombres">Fecha de ingreso <span class="asterisco">*</span> </label>
			<input type="date" class="form-control" name="fechain" value="<?php if(set_value('fechain')) echo set_value('fechain'); else {if($ingreso) echo $ingreso['fecha_ingreso'];}?>" id="Nombres" placeholder="Correo eléctronico">
			<?php echo form_error('fechain');?>
 			<br>
 			<label for="Nombres">Hora de ingreso <span class="asterisco">*</span> </label>
			<input type="time" class="form-control" name="horain" value="<?php if(set_value('horain')) echo set_value('horain'); else {if($ingreso) echo $ingreso['hora_ingreso'];}?>" id="Nombres" placeholder="Correo eléctronico">
			<?php echo form_error('horain');?>
 			<br>
 			<label for="Nombres">Motivos de ingreso <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="motivos" value="<?php if(set_value('motivos')) echo set_value('motivos'); else {if($ingreso) echo $ingreso['motivos_ingreso'];}?>" id="Nombres" placeholder="Correo eléctronico">
			<?php echo form_error('motivos');?>
 			<br>
 			<label for="Nombres">Observaciones del ingreso <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="observaciones" value="<?php if(set_value('observaciones')) echo set_value('observaciones'); else {if($ingreso) echo $ingreso['observaciones_ingreso'];}?>" id="Nombres" placeholder="Correo eléctronico">
			<?php echo form_error('observaciones');?>
 			
 			<!--<br>
           <label for="Nombres">Area <span class="asterisco">*</span> </label></br> 
			<select class="form-control" name="id_centro">
			<?php foreach ($casas as $a){ ?>
				<option value="<?php echo $a->id_centro;?>"
						<?php 
				if($ingreso['id_centro'] == $a->id_centro)
				echo "selected";?>
			><?=$a->nombre_centro;?>
			<?php } ?>
				</option>
			</select>-->
 			<br>
 			<input type="hidden" name="id_ingreso" value="<?php echo $ingreso['id_ingreso']; ?>">
 			<?php echo form_error('id_ingreso');?>
 			<button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
   	   </form>
 	</div>
  </div>
</div>
