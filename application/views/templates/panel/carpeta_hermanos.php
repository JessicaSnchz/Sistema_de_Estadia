     <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
        <li class="active">Búsqueda por estado penal</li>
      </ol>

          <h1 class="page-header"><center>BÚSQUEDA DE HERMANOS</center></h1>
          <!--<a href="<?php echo base_url();?>index.php/proyecto/alta_actividades/" role="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar actividad</a>-->
        
          <li><a href="http://localhost/proyecto_prueba/index.php/proyecto/todos">
          
            <select type="text" name="centrot" class="form-control">
                <?php 
                    foreach ($busqueda1 as $c){ 
                ?>
                    <option value="<?=$c->id_ingreso;?>"><?=$c->no_carpeta;?>
                        <?php 
                            } 
                        ?>
      </select>
                    </option></a></li>
          
          
 <br>
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
			
                <td><?php if(($g->genero_nino)=="F"){
                  ?>
                  <span>Femenino</span>
                <?php
                }
                else{
                  ?>
                  <span>Masculino</span>
                  <?php 
                }?></td>
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

  
