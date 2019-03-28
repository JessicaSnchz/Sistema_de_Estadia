	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li class="active">Áreas</li>
		</ol>

        <h1 class="page-header">Áreas</h1>
        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_areas" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar área</a>
        <table class="table">
		    <thead>
		      <tr> 
		        <th>Área</th>
		        <th>Descripción</th>
		        <th>Dependencia</th>
		        <th>Ubicación</th>
		        <th>Horario</th>
		        <th>Edición</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($areas as $a) {

		    ?>
		      <tr>
		        <td><?php echo $a->nombre_a; ?></td>
		        <td><?php echo $a->descripcion; ?></td>
		        <td><?php echo $a->nombre; ?></td>
		        <td><?php echo $a->ubicacion; ?></td>
		       <td><?php echo $a->dias;?><br/><?php echo $a->horas;?> </td>

		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/edita_area/<?php echo $a->id_area;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
		      </tr>
		        <?php
		 		}
		     ?>
		    </tbody>
		  </table>
 	</div>
  </div>
</div>