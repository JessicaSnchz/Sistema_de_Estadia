<div class="col-sm-2 col-sm-offset-9 col-md-10 col-md-offset-2 main">

	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	

        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_1">Paso 1: Sobre el Trámite/Servicio</a></li>
          <li class="active">Paso 2: Sobre los pasos</li>
        </ol>


        <h1 class="page-header">Nueva ficha técnica</h1> 
        <div class="col-md-6">

 <div class="panel panel-primary">
      <div class="panel-heading">Sobre los pasos del Trámite/Servicio</div>
    <div class="panel-body">

<form  name="formulario"  class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/alta_fichat_2_1/<?php echo $ts['id_ts']; ?>">
  		
  		<div class="form-group">
  			
  			<label for="paso">Ingrese los pasos del trámite/servicio en orden<span class="asterisco"></span></label><br/><br/>
        <label for="orden">Número<span class="asterisco">*</span> </label>
  			<input type="number" id="t1" class="form-control" name="orden" value="<?php echo set_value('orden');?>">
  			<?php echo form_error('orden');?> 
			<label for="nuevo_paso">Descripción del paso<span class="asterisco">*</span> </label>
			<input type="text"   class="form-control" id="t2"  name="nuevo_paso"value="<?php echo set_value('nuevo_paso');?>" placeholder="Describa el nuevo paso">
			<?php echo form_error('nuevo_paso');?>
		</br>
		  <input type="hidden" name="id_ts" value="<?php echo $ts['id_ts']; ?>">
            <?php echo form_error('id_ts');?>
		</br>
	    </div>
		
    <input type="submit" name="" value="enviar" class="btn-primary" onclick=""> 
</form>                   
                 
    </div><!--panel body-->
    </div><!--panel primary-->

  <div class="panel panel-primary">
    <div class="panel-heading">Mis pasos</div>
    <div class="panel-body">

    	<table class="table table-hover" >

    
        <thead>
            <tr> 
                <th>Número</th>
                <th>Paso</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 
        foreach ($pasitos as $p) {
        ?>
                <td><?php echo $p->orden; ?></td>
                <td><?php echo $p->descripcion_paso; ?></td>
                <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/elimina_ts_paso/<?php echo $p->fk_ts;?>/<?php echo $p->id_ts_pasos;?>" role="button"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
                
                
            </tr>
        </tbody>
    <?php }?>                                                       
        </table>
    </br>
    <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/alta_fichat_3_1/<?php echo $ts['id_ts'];?>" role="button"><span class="glyphicon glyphicon-arrow-right"></span> Paso 3</a>
   	</div><!--panel body-->
</div><!--panel primary-->


</div>
</div>

