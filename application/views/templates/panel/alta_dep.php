
		<?php
	//var_dump(form_error());
	//die();
	?>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/dependencias">Dependencias</a></li>
		  <li class="active">Alta de sección</li>
		</ol>

        <h1 class="page-header">Alta de dependencias</h1>
         <?php
        	$atributos = array('class'=>'form-horizontal');
        	echo form_open('proyecto/alta_dependencia',$atributos);
        	
       	?>
       		<label for="Nombres">Nombre de la dependencia <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre');?>" id="Nombres" placeholder="Nombre de la dependencia">
			<?php echo form_error('nombre');?>
 			</br>
 			<label for="Nombres">Descripción <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="descrip" value="<?php echo set_value('descrip');?>" placeholder="Descripción">
			<?php echo form_error('descrip');?>
 			</br>
 			<label for="Nombres">Teléfono <span class="asterisco">*</span> </label>
			<input type="tel" class="form-control" name="telefono" value="<?php echo set_value('telefono');?>" placeholder="Teléfono">
			<?php echo form_error('telefono');?>
 			</br>
 			<label for="Nombres">Extensión <span class="asterisco">*</span> </label>
			<br><select type="text" name="id_extensión" class="form-control">
				<?php 
					foreach ($extensiones as $exte){ 
				?>
					<option value="<?=$exte->id_extensión;?>"><?=$exte->extensión;?>
						<?php 
							} 
						?>
					</option>
			</select>
			
 			<br>
 			<label for="Nombres">Siglas <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="siglas" value="<?php echo set_value('siglas');?>" placeholder="Siglas">
			<?php echo form_error('siglas');?>
			<h2>Domicilio de la Dependencia</h2>
			<label for="Nombres">Estado <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="estado" value="<?php echo set_value('estado');?>" placeholder="Estado">
			<?php echo form_error('Estado');?>
			<label for="Nombres">Municipio <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="municipio" value="<?php echo set_value('municipio');?>" placeholder="Municipio">
			<?php echo form_error('Municipio');?>
			<label for="Nombres">Colonia <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="colonia" value="<?php echo set_value('colonia');?>" placeholder="Colonia">
			<?php echo form_error('Colonia');?>
			<label for="Nombres">Calle <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="calle" value="<?php echo set_value('calle');?>" placeholder="Calle">
			<?php echo form_error('Calle');?>
			<label for="Nombres">Num_int <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="num_int" value="<?php echo set_value('num_int');?>" placeholder="Num. int">
			<?php echo form_error('Num_int');?>
			<label for="Nombres">Num_ext <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="num_ext" value="<?php echo set_value('num_ext');?>" placeholder="Num. Ext">
			<?php echo form_error('Num_ext');?>
			<label for="Nombres">CP <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="c_p" value="<?php echo set_value('c_p');?>" placeholder="CP">
			<?php echo form_error('CP');?>

 			</br>
 			<button type="submit" class="btn btn-primary" name="formulario">Alta de Dependencia</button>
   	   </form>
 	</div>
  </div>
</div>