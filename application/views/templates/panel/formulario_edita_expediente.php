	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/vista_expediente_nino">Lista de Expedientes</a></li>
		  <li class="active">Asignación a Expediente</li>
		</ol>

        <center><h1 class="page-header">ASIGNACIÓN A EXPEDIENTE</h1></center>
         
         <div class="panel panel-primary">
     <div class="panel-heading">Información del expediente </div>
     <div class="panel-body">

         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_expediente/'.$expediente['id_expediente'],$atributos);
        //var_dump($privilegio);
       ?>
       <label for="Nombres">No. Expediente <span style="color: red" class="asterisco">*</span></label>
        <input type="text" class="form-control" name="expediente" value="<?php if(set_value('no_expediente')) echo set_value('no_expediente'); else {if($expediente) echo $expediente['no_expediente'];}?>" id="Nombres" placeholder="seccion">
      <?php echo form_error('no_expediente');?>
     <br>
     <!--<label for="Nombres">Nombre de la sección <span class="asterisco">*</span> </label>
			<input readonly="readonly" type="text" class="form-control" name="expediente" value="<?php if(set_value('no_expediente')) echo set_value('no_expediente'); else {if($expediente) echo $expediente['no_expediente'];}?>" id="Nombres" placeholder="seccion">
			<?php echo form_error('no_expediente');?>
 			</br>-->
 			<label for="requis"><span style="color: orange" class="asterisco">Trabajadores que atenderan el expediente del niño</span> </label>
      <br>
       <label for="requis">Abogado: <span style="color: red" class="asterisco">*</span> </label>
  <select name="id_persona1" class="form-control">
<?php foreach ($inte1 as $e) {
?>
    <option value="<?=$e->id_persona;?>" class="col-sm-2 control-label"><?=$e->nombres;?> <?=$e->apellido_p;?> <?=$e->apellido_m;?></option>
<?php 
}   
?>
    </select>
    <br>
       <label for="requis">Trabajador(a) social: <span style="color: red" class="asterisco">*</span> </label>
  <select name="id_persona2" class="form-control">
<?php foreach ($inte2 as $e) {
?>
    <option value="<?=$e->id_persona;?>" class="col-sm-2 control-label"><?=$e->nombres;?> <?=$e->apellido_p;?> <?=$e->apellido_m;?></option>
<?php 
}   
?>
    </select>
    <br>
       <label for="requis">Psicologa: <span style="color: red" class="asterisco">*</span> </label>
  <select name="id_persona3" class="form-control">
<?php foreach ($inte3 as $e) {
?>
    <option value="<?=$e->id_persona;?>" class="col-sm-2 control-label"><?=$e->nombres;?> <?=$e->apellido_p;?> <?=$e->apellido_m;?></option>
<?php 
}   
?>
    </select>
    
 			</br>
 			<input type="hidden" name="id_expediente" value="<?php echo $expediente['id_expediente']; ?>">
 			<?php echo form_error('id_expediente');?>
      </div>
      </div>
 			<button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
   	   </form>
 	</div>
  </div>
</div>
