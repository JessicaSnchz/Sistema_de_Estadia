<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header"><center>FORMULARIO DE PERTENENCIAS</h2>
          <br>
<a class="btn btn-info" href="<?php echo base_url();?>index.php/proyecto/vista_ninos_ts" role="button">Omitir pertenencias</a><br><br>
     <div class="panel panel-primary">
        <div class="panel-heading">Información de la pertenencia del ingresado </div>
  <div class="panel-body">

    <?php
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/prueba_pertenencias/'.$ingreso['id_ingreso'],$atributos);
     ?>

<form  name="formulario"  class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/prueba_pertenencias/<?php echo $ingreso['id_ingreso']; ?>">

			<label for="cantidad">Cantidad: <span style="color: red" class="asterisco">*</span> </label>
			<input type="number" class="form-control" name="cantidad" value="<?php echo set_value('cantidad');?>" id="cantidad" placeholder="Cantidad">
			<?php echo form_error('cantidad');?>
 			<br>
      <label for="descripcion">Descripción del artículo: <span style="color: red" class="asterisco">*</span> </label> 
      <input type="text" class="form-control" name="descripcion" value="<?php echo set_value('descripcion');?>" id="descripcion" placeholder="Descripción">
      <?php echo form_error('descripcion');?>
      <br>
      <input type="hidden" name="id_ingreso" value="<?php echo $ingreso['id_ingreso']; ?>">
      <?php echo form_error('id_ingreso');?>


<button class="btn btn-warning" type="submit">Agregar</button>

    </div><!--panel body-->
 </div>

<br>

<div class="panel panel-primary">
    <div class="panel-heading">Lista de Pertenencias</div>
    <div class="panel-body">

      <table class="table table-bordered">
            
            <thead>
              <tr align="center" >
                  <center>
                <th class="col-sm-1 col-sm-offset-1 col-md-3 col-md-offset-1"><center>Cantidad</th>
                <th class="col-sm-6 col-sm-offset-4 col-md-10 col-md-offset-2"><center>Descripción</th>
                <th class="col-sm-1 col-sm-offset-1 col-md-3 col-md-offset-1"><center>
                </th>
                </center>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($pert as $c){
              ?>
              <tr bgcolor="#FEF5E7">
                <td><center><?php echo $c->cantidad;?></td>
                <td><center><?php echo $c->descripcion;?></td>
                <td><center><a class="btn btn-danger" data-toggle="modal" data-target="#popup<?php echo $c->id_pertenencia;?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
  
  <div class="modal  fade" id="popup<?php echo $c->id_pertenencia;?>" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">cerrar</span></button>
          <h3 style="text-align: center" class="modal-title" id="label"><strong>IMPORTANTE</strong></h3>
        </div>
        <div class="modal-body">
          <p style="text-align: center">
            Está seguro que desea borrar este registro.
            <br>
            <br>
            <a class="btn btn-warning" href="<?php echo base_url();?>index.php/proyecto/eliminar_pertenencia/<?php echo $c->id_pertenencia;?>" role="button"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>

          </p>
        </div>
      </div>
    </div>
  </div></td>
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>

    </br>
   <a class="btn btn-warning" href="<?php echo base_url();?>index.php/proyecto/vista_ninos_ts" role="button">Guardar</a>
 </div>
</div>

    </div>
</div>
</div>