     <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     	<ol class="breadcrumb">
 			 <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  			<li class="active">Búsqueda por estado penal</li>
			</ol>

          <h1 class="page-header"><center>BÚSQUEDA DE NIÑOS POR ESTADO PENAL</center></h1>
          <!--<a href="<?php echo base_url();?>index.php/proyecto/alta_actividades/" role="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar actividad</a>-->
          <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Búsqueda por 
          <span class="caret"> </span>
         </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="http://localhost/proyecto_prueba/index.php/proyecto/estado_juicio">En Juicio</a></li>
          <li><a href="http://localhost/proyecto_prueba/index.php/proyecto/estado_resuelto">Situación Jurídica Resuelta</a></li>
          <li role="separator" class="divider"></li>
         
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
	foreach ($busqueda as $g) {
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

  
