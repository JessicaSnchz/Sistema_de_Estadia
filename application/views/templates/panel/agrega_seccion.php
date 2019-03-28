<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <ol class="breadcrumb">
		 <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/privilegio_seccion">Privilegio Sección</a></li>
		  <li class="active">Agregar secciones</li>
	 	</ol>

          <p><< <a href="<?php echo base_url();?>index.php/proyecto/privilegio_seccion">Elegir otro privilegio</a></p>
          <h1 class="page-header"><?php echo $datos_privilegio['nombre_privilegio'];?></h1>

          <form class="form-inline" method="POST" action="<?php echo base_url()?>index.php/proyecto/agrega_seccion/<?php echo $id_privilegio; ?>">
          	 <div class="form-group">
			    <select name="campo_seccion">
			    	<option value="">Elija una sección</option>
			    	<?php
			    	foreach($secciones_faltan as $sf){
			    	?>
			    		<option value="<?php echo $sf->id_seccion;?>"><?php echo $sf->nombre_seccion;?></option>
			    	<?php
			    	}
			    	?>
			    </select>
			  	<input type="hidden" name="id_privilegio" value="<?php echo $id_privilegio;?>">
			  </div>
			  <button type="submit" class="btn btn-primary">Agregar privilegio</button>
			    <?php echo form_error('campo_seccion');?>
          </form>

          <hr>
          <table class="table">
		    <thead>
		      <tr>
		        <th>Sección</th>
		        <th>Eliminar</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($secciones as $s){
		    ?>
		      <tr>
		        <td><?php echo $s->nombre_seccion; ?></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/elimina_seccion/<?php echo $s->id_privilegio?>/<?php echo $s->id_seccion;?>" role="button"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
		      </tr>
		     <?php
		 		}
		     ?>
		    </tbody>
		  </table>

    </div>
  </div>
</div>
