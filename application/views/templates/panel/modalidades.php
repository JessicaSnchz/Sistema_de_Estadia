	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li class="active">Modalidades</li>
		</ol>

        <h1 class="page-header">Modalidades</h1>
        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_modalidad" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar modalidad</a>
        <table class="table">
		    <thead>
		      <tr>
		        <th>Modalidad</th>
		        <th>Descripción</th>
		        <th>Identificador</th>
		        <th>Edición</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($modalidades as $m) {
		    ?>
		      <tr>
		        <td><?php echo $m->nombre_modalidad; ?></td>
		        <td><?php echo $m->descripcion; ?></td>
		        <td><?php echo $m->identificador; ?></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/edita_modalidad/<?php echo $m->id_modalidad;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
		      </tr>
		        <?php
		 		}
		     ?>
		    </tbody>
		  </table>
 	</div>
  </div>
</div>