	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li class="active">Horarios</li>
		</ol>

        <h1 class="page-header">Horarios</h1>
        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_horario" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar horario</a>
        <table class="table">
		    <thead>
		      <tr>
		        <th>N° de horario</th>
		        <th>Dias</th>
		        <th>Horas</th>
		        <th>Eliminar</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($horarios as $h) {
		    ?>
		      <tr>
		        <td><?php echo $h->id_horario; ?></td>
		        <td><?php echo $h->dias; ?></td>
		        <td><?php echo $h->horas; ?></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/elimina_horario/<?php echo $h->id_horario;?>" role="button"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
		      </tr>
		        <?php
		 		}
		     ?>
		    </tbody>
		  </table>
 	</div>
  </div>
</div>