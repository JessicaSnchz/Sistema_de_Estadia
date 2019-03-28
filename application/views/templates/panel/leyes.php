<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
		  <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogos</a></li>
		  <li class="active">Leyes</li>
		</ol>

        <h1 class="page-header">Leyes</h1>
        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_leyes" role="button"><span class="glyphicon glyphicon-plus"></span> Nueva Ley</a>

     
        <table class="table">
		    <thead>
		      <tr>
		        <th>Disposición</th>
		        
		      </tr>
		    </thead>
		    <tbody>

		        <?php
		    foreach ($leyes as $le) {
		    ?>
		    
		      <tr>
		        <td><?php echo $le->titulo; ?></td>
		        
		        <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/elimina_ley/<?php echo $le->id_ley;?>" role="button"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
		      </tr> 
		      	 		     
		         <?php
		     }
		 		 ?>

		    </tbody>
		  </table>
 	</div>
  </div>
</div>
