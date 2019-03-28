	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li class="active">Secciones</li>
		</ol>

        <h1 class="page-header">Secciones</h1>
        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_seccion" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar sección</a>
        <table class="table">
		    <thead>
		      <tr>
		        <th>Sección</th>
		        <th>Descripción</th>
		        <th>URL</th>
		        <th>Aparece en menú</th>
		        <th>Edición</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($secciones as $s) {
		    ?>
		      <tr>
		        <td><?php echo $s->nombre_seccion; ?></td>
		        <td><?php echo $s->descripcion; ?></td>
		        <td><?php echo $s->url; ?></td>
		        <td><?php 
		        		if($s->activo){
		        			$texto = "Si";
		        			$etiqueta = "success";
		        		}else{
		        			$texto = "No";
		        			$etiqueta = "warning";
		        		}
		        	?>
		        	<span class="label label-<?php echo $etiqueta;?>"><?php echo $texto;?></span>
		        </td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/edita_seccion/<?php echo $s->id_seccion;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
		      </tr>
		     <?php
		 		}
		     ?>
		    </tbody>
		  </table>
 	</div>
  </div>
</div>