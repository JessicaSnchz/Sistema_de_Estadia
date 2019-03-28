<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <ol class="breadcrumb">
		 <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li class="active">Privilegio Sección</li>
	 	</ol>
          <h1 class="page-header">Privilegios y secciones</h1>

          <table class="table">
		    <thead>
		      <tr>
		        <th>Privilegio</th>
		        <th>Secciones</th>
		        <th>Edición</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($privilegios as $p){
		    ?>
		      <tr>
		        <td><?php echo $p->nombre_privilegio; ?></td>
		        <td><?php echo $p->total; ?></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/agrega_seccion/<?php echo $p->id_privilegio;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> Agregar / Eliminar</a></td>
		      </tr>
		     <?php
		 		}
		     ?>
		    </tbody>
		  </table>
		         
    </div>
  </div>
</div>

