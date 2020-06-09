	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/vista_familiares">Familiares</a></li>
		  <li class="active">Edición de familiar</li>
		</ol>

        <center><h1 class="page-header">EDICIÓN DE FAMILIAR</h1></center>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_fam/'.$familiar['id_familiar'],$atributos);
        //var_dump($privilegio);
       ?>
       		<label for="Nombres">Nombres <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombref" value="<?php if(set_value('nombref')) echo set_value('nombref'); else {if($familiar) echo $familiar['nombre_f'];}?>" id="Nombres" placeholder="Nombres">
			<?php echo form_error('nombref');?>
 			</br>
           <label for="Nombres">Apellido paterno <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="apellido_pf" value="<?php if(set_value('apellido_pf')) echo set_value('apellido_pf'); else {if($familiar) echo $familiar['apellido_pf'];}?>" placeholder="Apellido paterno">
			<?php echo form_error('apellido_pf');?>
            <br>
 			<label for="Nombres">Apellido materno <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="apellido_mf" value="<?php if(set_value('apellido_mf')) echo set_value('apellido_mf'); else {if($familiar) echo $familiar['apellido_mf'];}?>" id="Nombres" placeholder="Apellido materno">
			<?php echo form_error('apellido_mf');?>
 			</br>
 			<label for="Nombres">Género <span class="asterisco">*</span> </label>
			<div class="radio">
			  		<label><input type="radio" name="generof" value="Masculino" <?php if(set_value('generof')=='Masculino') echo "selected";?>>Masculino</label>
				</div>
				<div class="radio">
			  		<label><input type="radio" name="generof" value="Femenino" <?php if(set_value('generof')=='Femenino') echo "selected";?>>Femenino</label>
				</div>
			<?php echo form_error('generof');?>
			<br>
 			<label for="Nombres">Fecha de nacimiento <span class="asterisco">*</span> </label>
			<input type="date" class="form-control" name="fechaf" value="<?php if(set_value('fechaf')) echo set_value('fechaf'); else {if($familiar) echo $familiar['fecha_naf'];}?>" id="Nombres" placeholder="Correo eléctronico">
			<?php echo form_error('fechaf');?>
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
 			<br>
 			<input type="hidden" name="id_familiar" value="<?php echo $familiar['id_familiar']; ?>">
 			<?php echo form_error('id_familiar');?>
 			<button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
   	   </form>
 	</div>
  </div>
</div>
