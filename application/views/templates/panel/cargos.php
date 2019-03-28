	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li class="active">Cargos</li>
		</ol>

        <h1 class="page-header">Cargos</h1>
        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_cargo" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar cargo</a>
        <table class="table">
		    <thead>
		      <tr>
		        <th>Cargo</th>
		        <th>Descripción</th>
		        <th>Edición</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($cargos as $c) {
		    ?>
		      <tr>
		        <td><?php echo $c->nombre; ?></td>
		        <td><?php echo $c->descripcion_c; ?></td>
		        <td><a class="btn btn-primary btn-sm" href="" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
		      </tr>
		        <?php
		 		}
		     ?>
		    </tbody>
		  </table>
 	</div>
  </div>
</div>