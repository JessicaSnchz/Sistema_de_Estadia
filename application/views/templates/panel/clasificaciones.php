
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li class="active">Clasificaciones</li>
		</ol>

        <h1 class="page-header">Clasificaciones (RPM)</h1>
        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_clasificacion" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar clasificación</a>
        <table class="table">
		    <thead>
		      <tr>
		        <th>Clasificación</th>
		        <th>Descripción</th>
		        <th>Identificador</th>
		        <th>Edición</th>
		        <th>Eliminar</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($clasificacion as $c) {
		    ?>
		      <tr>
		        <td><?php echo $c->nombre_clasificacion; ?></td>
		        <td><?php echo $c->descripcion; ?></td>
		        <td><?php echo $c->identificador_c; ?></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/edita_clasificacion/<?php echo $c->id_clasificacion;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/eliminar_clasificacion/<?php echo $c->id_clasificacion;?>" role="button"><span class="glyphicon glyphicon-eliminar"></span> Eliminar</a></td>
		      </tr>
		        <?php
		 		}
		     ?>
		    </tbody>
		  </table>
 	</div>
  </div>
</div>