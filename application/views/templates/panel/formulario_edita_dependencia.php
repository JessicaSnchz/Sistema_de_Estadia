	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogo</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/dependencias">Dependencias</a></li>
		  <li class="active">Edición de Dependencia</li>
		</ol>

        <h1 class="page-header">Edición de Dependencia</h1>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_dependencia/'.$dependencia['id_depe'].'/'.$domicilio['id_dom'],$atributos);
      	       ?>

       		<label for="Nombres">Dependencia <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php if(set_value('nombre')) echo set_value('nombre'); else {if($dependencia) echo $dependencia['nombre'];}?>" id="Nombres" placeholder="Dependencia">
			<?php echo form_error('nombre');?>
 			</br>
 			<label for="Nombres">Descripción <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="descrip" value="<?php if(set_value('descrip')) echo set_value('descrip'); else {if($dependencia) echo $dependencia['descrip'];}?>" placeholder="Descripción">
			<?php echo form_error('descrip');?>
 			</br>
 			<label for="Nombres">Teléfono <span class="asterisco">*</span> </label>
			<input type="tel" class="form-control" name="telefono" value="<?php if(set_value('telefono')) echo set_value('telefono'); else {if($dependencia) echo $dependencia['telefono'];}?>" placeholder="Télefono">
			<?php echo form_error('telefono');?>
 			</br>
 			<label for="Nombres">Extensiones <span class="asterisco">*</span> </label></br> 
 			<select type="text"  class="form-control" name="id_extensión">
			<?php foreach ($extensiones as $exte){ ?>
				<option value="<?php echo $exte->id_extensión;?>"
						<?php 
				if($dependencia['id_extensión'] == $exte->id_extensión)
				echo "selected";?>
			><?=$exte->extensión;?>
			<?php } ?>
				</option>
			</select>
			<br>
  			<label for="Nombres">Siglas <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="siglas" value="<?php if(set_value('siglas')) echo set_value('siglas'); else {if($dependencia) echo $dependencia['siglas'];}?>" placeholder="Siglas">
			<?php echo form_error('siglas');?>
 		    </br>
 			<input type="hidden" name="id_dep" value="<?php echo $dependencia['id_depe']; ?>">
 			<?php echo form_error('id_dep');?>
 			<br>
 			<label for="Nombres">Estado <span class="asterisco">*</span> </label>
 			<input type="text" class="form-control" name="estado" value="<?php if(set_value('etado')) echo set_value('estado'); else {if($domicilio) echo $domicilio['estado'];}?>" placeholder="Estado">
			<?php echo form_error('estado');?>
			<br>
			<label for="Nombres">Municipio <span class="asterisco">*</span> </label>
 			<input type="text" class="form-control" name="municipio" value="<?php if(set_value('municipio')) echo set_value('municipio'); else {if($domicilio) echo $domicilio['municipio'];}?>" placeholder="Municipio">
			<?php echo form_error('municipio');?>
			<br>
			<label for="Nombres">Colonia <span class="asterisco">*</span> </label>
 			<input type="text" class="form-control" name="colonia" value="<?php if(set_value('colonia')) echo set_value('colonia'); else {if($domicilio) echo $domicilio['colonia'];}?>" placeholder="Colonia">
			<?php echo form_error('colonia');?>
			<br>
			<label for="Nombres">Calle<span class="asterisco">*</span> </label>
 			<input type="text" class="form-control" name="calle" value="<?php if(set_value('calle')) echo set_value(calle); else {if($domicilio) echo $domicilio['calle'];}?>" placeholder="Calle">
			<?php echo form_error('calle');?>
			<br>
			<label for="Nombres">Num_int <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="num_int" value="<?php if(set_value('num_int')) echo set_value(num_int); else {if($domicilio) echo $domicilio['num_int'];}?>" placeholder="Num_int">
			<?php echo form_error('num_int');?>
 			<br>
 			<label for="Nombres">Num_ext <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="num_ext" value="<?php if(set_value('num_ext')) echo set_value(num_ext); else {if($domicilio) echo $domicilio['num_ext'];}?>" placeholder="Num_ext">
			<?php echo form_error('num_ext');?>
 			<br>
			<label for="Nombres">C_P <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="c_p" value="<?php if(set_value('c_p')) echo set_value(num_int); else {if($domicilio) echo $domicilio['c_p'];}?>" placeholder="C_P">
			<?php echo form_error('c_p');?>
 			</br>
 			<input type="hidden" name="id_dom" value="<?php echo $domicilio['id_dom']; ?>">
 			<?php echo form_error('id_dom');?>
 			
 			
			
 		</br>


 		
 			<button type="submit" class="btn btn-primary" name="formulario">Guardar cambios</button>
   	   </form>
 	</div>
  </div>
</div>

