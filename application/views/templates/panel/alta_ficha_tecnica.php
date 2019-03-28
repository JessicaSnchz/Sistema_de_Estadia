<div class="col-sm-2 col-sm-offset-9 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li class="active">Paso 1: Sobre el Trámite/Servicio</li>
		</ol>


        <h1 class="page-header">Nueva ficha técnica</h1>
        <div class="col-md-9">

 <div class="panel panel-primary">
      <div class="panel-heading">Paso 1: Sobre el Trámite/Servicio</div>
    <div class="panel-body">

    <?php
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/alta_ficha_tec',$atributos); 
     ?>

			<label for="nombre">Nombre <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre');?>" id="nombre" placeholder="Nombre del trámite/servicio">
			<?php echo form_error('nombre');?>
		</br>
		  	<label for="tipo">Tipo <span class="asterisco">*</span></label>
		  		<div class="radio">
			  		<label><input type="radio" name="tipo" value="T" <?php if(set_value('tipo')=='t') echo "checked";?>>Trámite</label>
				</div>
				<div class="radio">
			  		<label><input type="radio" name="tipo" value="S" <?php if(set_value('tipo')=='f') echo "checked";?>>Servicio</label>
				</div>
			<?php echo form_error('tipo'); ?>
		</br>
			<label for="Nombres">Registro Público Municipal <span class="asterisco">*</span> </label>
		</br>
			<select type="text" name="id_clasificacion" class="form-control">
				<?php 
					foreach ($clasificacion as $cl){ 
				?>
					<option value="<?=$cl->id_clasificacion;?>"><?=$cl->nombre_clasificacion;?>
						<?php 
							} 
						?>
					</option>
			</select>
		</br>
	      	<label for="Nombre">Descripción <span class="asterisco">*</span> </label>
	      		<textarea  type="text" class="form-control" name="descripcion_ft" value="<?php echo set_value('descripcion_ft');?>" id="descripcion_ft" placeholder="Describa el objetivo del trámite/servicio"></textarea>
	    </br>
	      	<label for="Nombre">Producto final <span class="asterisco">*</span> </label>
	      		<input type="text" class="form-control" name="descripcion_ft" value="<?php echo set_value('descripcion_ft');?>" id="descripcion_ft" placeholder="Describa el documento que se emitirá, producto del trámite/servicio">
	    </br>
	    		<label for="nombre">Presentar en caso de <span class="asterisco">*</span> </label>
				<input type="text" class="form-control" name="en_caso_de" value="<?php echo set_value('en_caso_de');?>" id="en_caso_de" placeholder="Describa brevemente la necesidad a cubrir con el presente trámite/servicio">
			    <?php echo form_error('en_caso_de');?>
		</br> 
		 	<label for="nombre">Ámbito de aplicación <span class="asterisco">*</span> </label>
		</br>
			<?php 
				foreach ($ambito as $ap) {
			?>
		 <div>
			    <input type="radio" class="form-control.radio " id="id_ambito_de_a" name="id_ambito_de_a" value="<?=$ap->id_ambito_de_a;?>" > <?=$ap->nombre;?>
		 </div>
			<?php }?>	
		</br>
		    <label for="nombre">Puede realizar el trámite <span class="asterisco">*</span> </label>
		</br>
			<?php 
				foreach ($quien as $qp) {
			?>
		 <div>
			    <input type="checkbox" class="form-control.checkbox " id="id_ambito_de_a" name="id_quien_p[]" value="<?=$qp->id_quien_p;?>" > <?=$qp->nombre_q;?>
		 </div>
			<?php }?>	
		</br>
			<label for="Nombres">Modalidad <span class="asterisco">*</span> </label>
		</br>
			<select type="text" name="id_modalidad" class="form-control">
				<?php 
					foreach ($modalidad as $m){ 
				?>
					<option value="<?=$m->id_modalidad;?>"><?=$m->nombre_modalidad;?>
						<?php 
							} 
						?>
					</option>
			</select>
		</br>
			<label for="vigencia">Vigencia <span class="asterisco">*</span> </label>
			<input type="text" class="form-control" name="vigencia" value="<?php echo set_value('vigencia');?>" id="vigencia" placeholder="Vigencia que tiene el trámite/servicio">
			<?php echo form_error('vigencia');?>
		</br>

		  <button type="submit" class="btn btn-primary" name="formulario">Registrar usuario</button>
		</form>

	
   </div><!--row-->
</div>