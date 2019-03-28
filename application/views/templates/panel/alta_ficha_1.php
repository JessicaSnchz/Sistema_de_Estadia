<div class="col-sm-2 col-sm-offset-9 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li class="active">Paso 1: Sobre el Trámite/Servicio</li>
		</ol>


        <h1 class="page-header">Nueva ficha técnica</h1>
        <div class="col-md-12">

 <div class="panel panel-primary">
      <div class="panel-heading">Paso 1: Sobre el Trámite/Servicio</div>
    <div class="panel-body">

    <?php
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/alta_fichat_1',$atributos); 
     ?>

			<label for="Nombree">Nombre <span class="asterisco">*</span> </label>
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
			<label for="rpm">Registro Público Municipal <span class="asterisco">*</span> </label>
		</br>
			<select type="text" name="fk_rpm" class="form-control">
				<?php 
					foreach ($clasificacion as $cl){ 
				?>
					<option value="<?=$cl->id_clasificacion;?>"><?=$cl->nombre_clasificacion;?>
						<?php 
							} 
						?>
					</option>
			</select>
			<?php echo form_error('fk_rpm');?>
		</br>
	      	<label for="Nombre">Descripción <span class="asterisco">*</span> </label>
	      		<textarea  type="text" class="form-control" name="descripcion_ft" value="<?php echo set_value('descripcion_ft');?>" id="descripcion_ft" placeholder="Describa el objetivo del trámite/servicio"></textarea>
	      		<?php echo form_error('descripcion_ft');?>
	    </br>
	      	<label for="Nombre">Producto final <span class="asterisco">*</span> </label>
	      		<input type="text" class="form-control" name="producto_final" value="<?php echo set_value('producto_final');?>" id="producto_final" placeholder="Describa el documento que se emitirá, producto del trámite/servicio">
	      		<?php echo form_error('producto_final');?>
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
			    <input type="radio" class="form-control.radio " id="id_ambito_de_a" name="ambito_de_a" value="<?=$ap->id_ambito_de_a;?>" > <?=$ap->nombre;?>
		 </div>
			<?php }?>
			<?php echo form_error('ambito_de_a');?>	
		</br>
		    <label for="nombre">Puede realizar el trámite <span class="asterisco">*</span> </label>
		</br>
			<?php 
				foreach ($quien as $qp) {
			?>
		 <div>
			    <input type="checkbox" class="form-control.checkbox " id="id_quien_p" name="quien_p[]" value="<?=$qp->id_quien_p;?>" > <?=$qp->nombre_q;?>
		 </div>
			<?php }?>	
			<?php echo form_error('quien_p[]');?>
		</br>
			<label for="Nombres">Modalidad <span class="asterisco">*</span> </label>
		</br>
			<select type="text" name="modalidad" class="form-control">
				<?php 
					foreach ($modalidad as $m){ 
				?>
					<option value="<?=$m->id_modalidad;?>"><?=$m->nombre_modalidad;?>
						<?php 
							} 
						?>
					</option>
			</select>
			<?php echo form_error('modalidad');?>
		    </br>
			<label for="genero">Ficta <span class="asterisco">*</span></label>
		  		<div class="radio">
			  		<label><input type="radio" name="ficta" value="P" <?php if(set_value('ficta')=='p') echo "checked";?>>Positiva</label>
				</div>
				<div class="radio">
			  		<label><input type="radio" name="ficta" value="N" <?php if(set_value('ficta')=='n') echo "checked";?>>Negativa</label>
				</div>
			<?php echo form_error('ficta'); ?>
		</br>
			<label for="vigencia">Vigencia <span class="asterisco"></span> </label>
			<input type="text" class="form-control" name="vigencia" value="<?php echo set_value('vigencia');?>" id="vigencia" placeholder="Vigencia que tiene el trámite/servicio, dejar vacío si no existe vigencia">
			<?php echo form_error('vigencia');?>
		</br>
		<label for="costo">Costo <span class="asterisco"></span> </label>
			<input type="text" class="form-control" name="costo" value="<?php echo set_value('costo');?>" id="costo" placeholder="Ingrese el costo del trámite/servicio, si no existe, costo dejar vacío">
			<?php echo form_error('costo');?>
		</br>
		<label for="concepto_pago">Concepto de pago <span class="asterisco"></span> </label>
			<input type="text" class="form-control" name="concepto_pago" value="<?php echo set_value('concepto_pago');?>" id="concepto_pago" placeholder="Ingrese el concepto de pago del trámite/servicio, si no existe tal concepto, dejar vacío">
			<?php echo form_error('concepto_pago');?>
		</br>

		 <input type="submit" class="btn btn-primary" name="formulario" value="Enviar">
		</form></br>
    </div>
</div>                      
                 
    </div><!--panel body-->
</div><!--panel primary-->
</div>
</div>
