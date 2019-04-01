<div class="col-sm-2 col-sm-offset-9 col-md-10 col-md-offset-2 main">
     <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_1">Paso 1: Sobre el Trámite/Servicio</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_2">Paso 2: Sobre los pasos del Trámite/Servicio</a></li>
          <li class="active">Paso 3: Sobre los requisitos</li>
        </ol>

        <h1 class="page-header">Nueva ficha técnica</h1>
        <div class="col-md-9">

 <div class="panel panel-primary">
      <div class="panel-heading">Sobre los requisitos del Trámite/Servicio</div>
    <div class="panel-body">

    <form  name="formulario" enctype="multipart/form-data" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/alta_fichat_3_1/<?php echo $ts['id_ts']; ?>">
  		
  		<div class="form-group" id="f">
  			
  			<label for="paso">N° paso<span class="asterisco">*</span> </label>
  			<input type="number" id="t1" class="form-control" name="orden" value="<?php echo set_value('orden');?>">
  			<?php echo form_error('orden');?> 
        </br>
      <label for="requis">Requisitos<span class="asterisco">*</span> </label>
      <select type="text" name="fk_req" class="form-control">
                <?php 
                    foreach ($requisitos as $r){ 
                ?>
                    <option value="<?=$r->id_requisito;?>"><?=$r->descripcion_req;?>
                        <?php 
                            } 
                        ?>
                    </option>
      </select>
      </br>
      <div class="panel panel-warning">
        <div class="panel-heading" >En caso de ser un nuevo requisito llene el siguiente campo</div>
    <div class="panel-body">
			<label for="nuevo_paso">Descripción<span class="asterisco"></span> </label>
			<input type="text" class="form-control" id="uno" name="nuevo_requisito" placeholder="Ingresa el nuevo requisito" value="">
		  </br>
      <label for="paso">¿Es un trámite?<span class="asterisco">*</span> </label>
        <select type="text" name="id_tramite" class="form-control">
                <?php 
                    foreach ($tramites as $tr){ 
                ?>
                    <option value="<?=$tr->id_ts;?>"><?=$tr->nombre_ts;?>
                        <?php 
                            } 
                        ?>
                    </option>
                </select>
      </br>
     </div>
      </div>
      <!--<label for="nuevo_paso">Anexar archivo<span class="asterisco"></span> </label>
      <input type="file" class="file" id="file" name="mi_archivo">-->
      </br>
      <div class="form-inline">
      <label for="original">Original<span class="asterisco"></span> </label>
      <div class="radio">
            <label><input type="radio" name="original" value="NO" <?php if(set_value('original')=='NO') echo "checked";?>>Trámite</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="original" value="SI" <?php if(set_value('tipo')=='SI') echo "checked";?>>Servicio</label>
        </div>
        <?php echo form_error('original');?>
      </br>
      <label for="nuevo_paso">N° de copias<span class="asterisco"></span> </label>
      <input type="number" class="form-control" name="copias">
      </br>
      </div>
		  <input type="hidden" name="id_ts" value="<?php echo $ts['id_ts']; ?>">
            <?php echo form_error('id_ts');?>
		</br>
	    </div>

      <div class="panel panel-primary">
    <div class="panel-body">
      <label for="req_externo"><b>En caso de que el requisito sea externo llenar los siguientes campos</b></label>
    </br>
  </br>
     <label for="nuevo_paso">Institución que realiza el trámite<span class="asterisco"></span> </label>
     <input type="text" class="form-control" name="institucion" placeholder="Ingresa el nombre de la institución responsable" value="">
   </br>
      <label for="direccion">Dirección<span class="asterisco"></span> </label>
     <input type="text" class="form-control" name="direccion" placeholder="Formato: ciudad, colonia, calle, número" value="">


    </div>
  </div>
		
<button type="submit" name="" value="enviar" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Agregar</button>
		</form>                   
                 
    </div><!--panel body-->
</div><!--panel primary-->

<div class="panel panel-primary">
    <div class="panel-body">

    	<table class="table table-hover" >

    
        <thead>
            <tr> 
                <th>Número</th>
                <th>Requisito</th>
                <th>Copias</th>
                <th>Original</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 
        foreach ($req as $r) {
        ?>
                <td><?php echo $r->orden; ?></td>
                <td><?php echo $r->descripcion_req; ?></td>
                 <td><?php echo $r->copias; ?></td>
                  <td><?php echo $r->original; ?></td>
                <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/edita_requisito/<?php echo $r->fk_ts;?>/<?php echo $r->id_req_ts;?>" role="button"><span class="glyphicon glyphicon-trash"></span> Editar</a></td>
                 <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/elimina_ts_requisito/<?php echo $r->fk_ts;?>/<?php echo $r->id_req_ts;?>" role="button"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
                
                
            </tr>
        </tbody>
    <?php }?>                                                       
        </table>
    </br>
    <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/alta_fichat_4/<?php echo $ts['id_ts'];?>" role="button"><span class="glyphicon glyphicon-arrow-right"></span> Paso 4</a>
   	</div><!--panel body-->
</div><!--panel primary-->


</div>
</div>

