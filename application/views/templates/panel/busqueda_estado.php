     <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     	<ol class="breadcrumb">
 			 <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  			<li class="active">Búsqueda por estado</li>
			</ol>
          <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Búsqueda por
          <span class="caret"> </span>
         </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="http://localhost/proyecto_prueba/index.php/proyecto/ninos_ingresos">Ingresos de niños</a></li>
          <li><a href="http://localhost/proyecto_prueba/index.php/proyecto/ninos_traslados">Traslados de niños</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="http://localhost/proyecto_prueba/index.php/proyecto/ninos_egresos">Egresos de niños</a></li>
          <li><a href="http://localhost/proyecto_prueba/index.php/proyecto/ninos_fugas">Fugas de niños</a></li>
           </ul>
          </div>


          <table class="table">
	<thead>
		<tr>
			<!--<th>Equipo</th>
			<th>Calificaciones</th>
			-->
		    
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($calificaciones as $g) {
	?>
		<tr>
			<!--<td><?php echo $g->nombre_equipo;?></td>
			<td><?php echo $g->calificacion;?></td>-->
			
			<!--<td><a class="btn btn-success btn-sm" href="<?php echo base_url();?>index.php/proyecto/edita_actividades/<?php echo $g->id_actividad;?>" role="button"><spam class="glyphicon glyphicon-pencil"></spam> Editar</a></td>
			<td><a class="btn btn btn-danger btn-sm" href="<?php echo base_url();?>index.php/proyecto/elimina_actividades/<?php echo $g->id_actividad;?>" role="button"><spam class="glyphicon glyphicon-trash"></spam> Eliminar</a></td>
            -->	
		</tr>
		<?php
	}
		?>
	</tbody>
</table>
          
             </div>
        </div>
  </div>

  
