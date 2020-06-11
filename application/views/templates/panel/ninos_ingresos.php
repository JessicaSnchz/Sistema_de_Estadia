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

<h3><center>RESULTADOS DE NIÑOS INGRESADOS</center></h3>
<br>
          <table class="table table-bordered">
	<thead>
		<tr>
		    <th>No. Expediente</th>
		    <th>No. Carpeta</th>
			<th>Nombre del niño</th>
			<th>Edad</th>
            <th>Genéro</th>
            <th>Fecha ingreso</th>
            <th>Centro de Asistencia</th>
            <th>Motivos ingreso</th>
            <th>Municipio de origen</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($calificaciones as $g) {
	?>
		<tr>
		    <td><?php echo $g->no_expediente;?></td>
		    <td><?php echo $g->no_carpeta;?></td>
			<td><?php echo $g->nombres_nino;?> <?php echo $g->apellido_pnino;?> <?php echo $g->apellido_mnino;?></td>
			<td></td>
              <td><?php echo $g->genero_nino;?></td>
               
                <td><?php echo $g->fecha_ingreso;?></td>
                <td><?php echo $g->nombre_centro;?></td>
                <td><?php echo $g->motivos_ingreso;?></td>	
                <td><?php echo $g->municipio_origen;?></td>
		
		</tr>
		<?php
	}
		?>
	</tbody>
</table>
          
             </div>
        </div>
  </div>

  
