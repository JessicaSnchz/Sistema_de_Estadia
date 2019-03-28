	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li class="active">Privilegios</li>
		</ol>

        <h1 class="page-header">Privilegios</h1>
        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_privilegio" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar privilegio</a>
        <table class="table">
		    <thead>
		      <tr>
		        <th>Privilegio</th>
		        <th>Descripción</th>
		        <th>Edición</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($privilegios as $p) {
		    ?>
		      <tr>
		        <td><?php echo $p->nombre_privilegio; ?></td>
		        <td><?php echo $p->descripcion; ?></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/edita_privilegio/<?php echo $p->id_privilegio;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
		      </tr>
		     <?php
		 		}
		     ?>
		    </tbody>
		  </table>
 	</div>
  </div>
</div>