	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li class="active">Dependencias</li>
		</ol>

        <h1 class="page-header">Dependencias</h1>
        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_dependencia" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar dependencia</a>
        <table class="table">
		    <thead>
		      <tr>
		        <th>Dependencia</th>
		        <th>Descripción</th>
		        <th>Teléfono</th>
		        <th>Extensión</th>
		        <th>Siglas</th>
		        <th>Dirección</th>
		        <th>Código postal</th>
		        <th>Edición</th>
		         <th>Eliminar</th>

		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    //die(var_dump($dependencias));
		    foreach ($dependencias as $d) {
		    ?>
		    
		      <tr>
		        <td><?php echo $d->nombre; ?></td>
		        <td><?php echo $d->descrip; ?></td>
                <td><?php echo $d->telefono;?></td>
                <td><?php echo $d->extension;?></td>
		        <td><?php echo $d->siglas; ?></td>
		        <td><?php echo $d->municipio.", ".$d->colonia.", calle ".$d->calle.", número int. ".$d->num_int.", número ext.".$d->num_ext.", ".$d->estado ; ?></td>
		        <td><?php echo $d->c_p?></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/edita_dependencia/<?php echo $d->id_depe;?>/<?php echo $d->id_dom;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/elimina_dep_dom/<?php echo $d->id_depe;?>/<?php echo $d->id_dom;?>" role="button"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
		      </tr> 
		      	 		     
		         <?php
		     }
		 		 ?>

		    </tbody
		  </table>
 	</div>
  </div>
</div>