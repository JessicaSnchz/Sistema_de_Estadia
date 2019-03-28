	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li class="active">Medios</li>
		</ol>

        <h1 class="page-header">Medios</h1>
        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_medio" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar medio</a>
        <table class="table">
		    <thead>
		      <tr>
		        <th>Nombre</th>
				<th>Eliminar</th>

		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($medios as $m) {
		    ?>
		      <tr>
		        <td><?php echo $m->nombre; ?></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/elimina_medio/<?php echo $m->id_medio;?>" role="button"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
		      </tr>
		     <?php
		 		}
		     ?>
		    </tbody>
		  </table>
 	</div>
  </div>
</div>
