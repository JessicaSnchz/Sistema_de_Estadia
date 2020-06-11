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
          <li><a href="http://localhost/proyecto_prueba/index.php/proyecto/hermanos1">Tienen hermanos</a></li>
          <li><a href="http://localhost/proyecto_prueba/index.php/proyecto/hermanos2">No tienen hermanos</a></li>
          <li><a href="http://localhost/proyecto_prueba/index.php/proyecto/discapacidad1">Tienen discapacidad</a></li>
          <li><a href="http://localhost/proyecto_prueba/index.php/proyecto/discapacidad2">No tienen discapacidad</a></li>
          <li role="separator" class="divider"></li>
         
           </ul>
          </div>

         <br>
          <table class="table table-bordered">
	<thead>
		<tr>
		    <th>No. Expediente</th>
		    <th>No. Carpeta</th>
			<th>Nombre del niño</th>
		
            <th>Genéro</th>
            <th>Hermanos</th>
            <th>Discapacidad</th>
            <th>Fecha ingreso</th>
            <th>Centro de Asistencia</th>
            <th>Motivos ingreso</th>
            <th>Estado penal</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($busqueda as $g) {
	?>
		<tr>
		    <td><?php echo $g->no_expediente;?></td>
		    <td><?php echo $g->no_carpeta;?></td>
			<td><?php echo $g->nombres_nino;?> <?php echo $g->apellido_pnino;?> <?php echo $g->apellido_mnino;?></td>
			<td><?php echo $g->genero_nino;?></td>
               
                <td><?php echo $g->hermanos;?></td>
                <td><?php echo $g->discapacidad;?></td>
                <td><?php echo $g->fecha_ingreso;?></td>
                <td><?php echo $g->nombre_centro;?></td>
                <td><?php echo $g->motivos_ingreso;?></td>	
                <td><?php echo $g->nombre_estado;?></td>
		
		</tr>
		<?php
	}
		?>
	</tbody>
</table>
          
             </div>
        </div>
  </div>

  
