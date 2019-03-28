	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li class="active">Usuarios</li>
		</ol>

        <h1 class="page-header">Usuarios</h1>
        
        <table class="table">
		    <thead>
		      <tr>
		        <th>Nombres</th>
		        <th>Apellido Paterno</th>
		        <th>Apellido Materno</th>
				<th>Género</th>
				<th>Correo</th>
				<th>Privilegio</th>
				<th>Activo</th>
				<th>Edita usuario</th>
				<th>Asigna privilegio</th>

		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($usuarios as $u) {
		    ?>
		      <tr>
		        <td><?php echo $u->nombres; ?></td>
		        <td><?php echo $u->ape_pat; ?></td>
						<td><?php echo $u->ape_mat; ?></td>
						<td><?php if($u->genero == "M") echo "Masculino"; else echo "Femenino"; ?></td>
						<td><?php echo $u->correo; ?></td>
						<td><?php echo $u->nombre_privilegio; ?></td>
						<td><?php if($u->activo == '1') echo "Si"; else echo "No"; ?></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/edita_usuario/<?php echo $u->id_usuario;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/asigna_privilegio/<?php echo $u->id_usuario;?>" role="button"><span class="glyphicon glyphicon-plus"></span> Asignar privilegio</a></td>
		      </tr>
		     <?php
		 		}
		     ?>
		    </tbody>
		  </table>
 	</div>
  </div>
</div>
