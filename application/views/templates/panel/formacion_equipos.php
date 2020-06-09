<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
    <li><a href="<?php echo base_url();?>index.php/proyecto/vista_equipos">Equipos</a></li>
    <li class="active">Formación equipos</li>
  </ol>

 <div class="panel panel-primary">
      <div class="panel-heading">Información personal</div>
    <div class="panel-body">

    <?php
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/formacion_equipos',$atributos); 
     ?>

			<label for="no_equipo">No. Equipo <span class="asterisco"></span> </label>
			<input type="text" class="form-control" name="no_equipo" value="<?php echo set_value('no_equipo');?>" id="no_equipo" placeholder="Equipo">
			<?php echo form_error('no_equipo');?>
 			<br>
       <label for="requis">Abogado: <span style="color: red" class="asterisco">*</span> </label>
  <select name="per1" class="form-control">
<?php foreach ($inte1 as $e) {
?>
    <option value="<?=$e->id_persona;?>" class="col-sm-2 control-label"><?=$e->nombres;?> <?=$e->apellido_p;?> <?=$e->apellido_m;?></option>
<?php 
}   
?>
    </select>
    <br>
       <label for="requis">Trabajador(a) social: <span style="color: red" class="asterisco">*</span> </label>
  <select name="per2" class="form-control">
<?php foreach ($inte2 as $e) {
?>
    <option value="<?=$e->id_persona;?>" class="col-sm-2 control-label"><?=$e->nombres;?> <?=$e->apellido_p;?> <?=$e->apellido_m;?></option>
<?php 
}   
?>
    </select>
    <br>
       <label for="requis">Psicologa: <span style="color: red" class="asterisco">*</span> </label>
  <select name="per3" class="form-control">
<?php foreach ($inte3 as $e) {
?>
    <option value="<?=$e->id_persona;?>" class="col-sm-2 control-label"><?=$e->nombres;?> <?=$e->apellido_p;?> <?=$e->apellido_m;?></option>
<?php 
}   
?>
    </select>
    


    </div><!--panel body-->
 </div>
 <button class="btn btn-warning" type="submit">Guardar</button>
</div>
   </div><!--row-->
</div>