	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/expediente_incidencia">Expedientes</a></li>
		  <li class="active">Edición de estatado de la carpeta</li>
		</ol>

        <center><h1 class="page-header">EDICIÓN DE ESTADO PROCESAL DE LA CARPETA</h1></center>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_estado_procesal/'.$expediente_nino['id_expediente'],$atributos);
        ?>
			<label for="Nombres">Nombre del menor <span class="asterisco">*</span> </label>
    <input type="text" readonly="readonly" class="form-control" name="nombre_menor" value="<?php if(set_value('nombre_menor')) echo set_value('nombre_menor'); else {if($expediente_nino) echo $expediente_nino['nombres_nino'];}?> <?php if(set_value('apellido_pnino')) echo set_value('apellido_pnino'); else {if($expediente_nino) echo $expediente_nino['apellido_pnino'];}?> <?php if(set_value('apellido_mnino')) echo set_value('apellido_mnino'); else {if($expediente_nino) echo $expediente_nino['apellido_mnino'];}?>" id="Nombres" placeholder="Nombres">
      <?php echo form_error('nombre_menor');?>
      </br>
      <label for="Nombres">No. Expediente <span class="asterisco">*</span> </label>
    <input type="text" readonly="readonly" class="form-control" name="no_expediente" value="<?php if(set_value('no_expediente')) echo set_value('no_expediente'); else {if($expediente_nino) echo $expediente_nino['no_expediente'];}?>" id="Nombres" placeholder="Nombres">
      <?php echo form_error('no_expediente');?>
      <br>
      <label for="Nombres">No. Carpeta<span class="asterisco">*</span> </label>
    <input type="text" readonly="readonly" class="form-control" name="no_carpeta" value="<?php if(set_value('no_carpeta')) echo set_value('no_carpeta'); else {if($expediente_nino) echo $expediente_nino['no_carpeta'];}?>" id="Nombres" placeholder="Nombres">
      <?php echo form_error('no_carpeta');?>
      <br>
       <label for="requis">Estado procesal<span style="color: red" class="asterisco">*</span></label>
       </br>
      <select class="form-control" name="procesal">
      <?php foreach ($estado_procesal as $a){ ?>
        <option value="<?php echo $a->id_estadop;?>"
            <?php 
        if($expediente_nino['id_estadop'] == $a->id_estadop)
        echo "selected";?>
      ><?=$a->nombre_estado;?>
      <?php } ?>
        </option>
      </select>
    </br>

    <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label"></label>
       <div class="col-sm-10">
         <input type="hidden" name="usuario" class="form-control" value="<?php echo $sesion['id_usuario'];?>">
         <?php echo form_error('usuario');?>
       </div>
         
       </div>

       <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label"></label>
       <div class="col-sm-10">
         <input type="hidden" name="expediente" class="form-control" value="<?php echo $expediente_nino['id_expediente'];?>">
         <?php echo form_error('expediente');?>
       </div>

       <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label"></label>
       <div class="col-sm-10">
         <input type="hidden" name="estado_pro" class="form-control" value="<?php echo $expediente_nino['id_estadop'];?>">
         <?php echo form_error('estado_pro');?>
       </div>
         
       </div>

 			<button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
   	   </form>
 	</div>
  </div>
</div>
