<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  <li><a href="<?php echo base_url();?>index.php/proyecto/vista_centro">Centros Asistenciales</a></li>
    <li class="active">Expedientes por Centro</li>
  </ol>
          <center><h1 style="background-color: white" border="2" class="page-header">EXPEDIENTES DE NIÑOS</h1></center>
<br>
 <!--<label for="requis">Búqueda por estado penal <span style="color: red" class="asterisco"></span> </label><br>
  <select>
<?php foreach ($estado_p as $ep) {
?>
    <option value="<?=$ep->id_estadop;?>" class="col-sm-2 control-label"><?=$ep->nombre_estado;?></option>
<?php 
}   
?>
    </select>
-->
          <table class="table table-bordered">
            
            <thead>
              <tr bgcolor="#FEF5E7" align="center">
                  <center>
                <th> <center>No. Expediente</th>
                <th> <center>No. Carpeta</th>
                <th> <center>Estado Procesal</th>
                <th> <center>Centro asistencial</th>
                <th> <center>Nombre del niño</th>
                <th> <center>Fecha nacimiento</th>
                <th> <center>Edad</th>
                <th> <center>Género</th>
                <th> <center>Fecha de ingreso del menor</th>
                <th> <center>Motivos de ingreso</th>
                <!--<th> <center>Estatus</th>-->
                </center>
              </tr>
            </thead>
            <tbody>
              <?php
              //die(var_dump($expedientes)); 
              foreach ($expedientes_por_casa as $ec){
              ?>
              <tr>
              <td><?php echo $ec->no_expediente;?></td>
              <td><?php echo $ec->no_carpeta;?></td>
              <td><?php echo $ec->nombre_estado;?></td>
              <td><?php echo $ec->nombre_centro;?></td>
                <!--<td class="<?php echo $etiqueta;?>"><?php echo $this->Modelo_proyecto->ver_centro($e->id_centro);?></td>-->
                <td><?php echo $ec->nombres_nino;?> <?php echo $ec->apellido_pnino;?> <?php echo $ec->apellido_mnino;?></td>
                <td><?php echo $ec->fecha_nnino;?></td>
                <td>
                <?php 
                $fecha_naci = $this->Modelo_proyecto->ver_edad($ec->id_ingreso);
                $fecha_nacinino = $fecha_naci;
                $fecha_actual = date("Y/m/d/");
                $edad = $fecha_actual - $fecha_nacinino;
                if($edad > 100) echo "0"; 
                else echo $edad;
                ?>
                </td>
                <td><?php echo $ec->genero_nino;?></td>
                <td><?php echo $ec->fecha_ingreso;?></td>
                <td><?php echo $ec->motivos_ingreso;?></td>
                <!--<td><?php echo $ec->nombre_incidencia;?></td>-->
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>


        </div>
      </div>
    </div>


   