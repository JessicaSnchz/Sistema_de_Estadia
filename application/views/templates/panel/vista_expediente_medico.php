<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Expedientes Niños</a></li>
  </ol>
          <center><h1 style="background-color: white" border="2" class="page-header">ASIGNAR VALORACIÓN A EXPEDIENTES </h1></center>


<br>


          <style>

        .round {
 background-color: #fff;
 width: auto;
 height: auto;
 margin: 0 auto 15px auto;
 padding: 5px;
 border: 1px solid #ccc;


 -moz-border-radius: 11px;
 -webkit-border-radius: 11px;
 border-radius: 11px;
 behavior: url(border-radius.htc);
    }
</style>

<html>

<head>
<TITLE>objetos redondeados</TITLE>

    <style>

        .round {
          background-color: #fff;
 width: auto;
 height: auto;
 margin: 0 auto 18px auto;
 padding: 7px;
 border: 2px solid #ccc;

 -moz-border-radius: 15px;
 -webkit-border-radius: 15px;
 border-radius: 15px;


 behavior: url(border-radius.htc);

    }


    .ph-center {
  height: 100px;
}
.ph-center::-webkit-input-placeholder {
  text-align: center;
}

    </style>

</head>

<body>

 <div id="formulario" >

    <table style="background-color:#F5F6CE;">

        <tr>
           
<div class="col-lg-6">
    <div class="input-group">
<form  class="form" method="post" action=""> 
 <input type="text" class="form-control" placeholder="Buscar expediente de niño..." name="busqueda">
  
     <span class="input-group-btn">
       <button class=class="btn btn-ttc-circle" type="button"> <input type="image"  value="Guardar" src="<?php echo base_url();?>assets/imagenes/bucar2.png" height="27" width="27" /></button>
      </span>

 </form>
 </div>
</div>

        </tr>

<br>  


    </table>

 </div>

</body>

</html>



<br>  
<br>
          <table class="table table-bordered">
            
            <thead>
              <tr bgcolor="#F9E79F" align="center">
                  <center>
                <th>Nombre del niño</th>
                <th>Fecha nacimiento</th>
                <th>Género</th>
                <th>Motivos de ingreso</th>
                <th>No. Expediente</th>
                <th>No. Carpeta</th>
               
            
                <th></th>
                <th></th>
                </center>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($expedientes_m as $e){
              ?>
              <tr bgcolor="#FEF5E7">
                <td><?php echo $e->nombres_nino;?> <?php echo $e->apellido_pnino;?> <?php echo $e->apellido_mnino;?></td>
                <td><?php echo $e->fecha_nnino;?></td>
                <td>
                <?php 
                $fecha_naci = $this->Modelo_proyecto->ver_edad($dif->id_ingreso);
                $fecha_nacinino = $fecha_naci;
                $fecha_actual = date("Y/m/d/");
                $edad = $fecha_actual - $fecha_nacinino;
                if($edad > 100) echo "0"; 
                else echo $edad;
                ?>
                </td>
                <td><?php echo $g->genero_nino;?></td>
                <td>
                <?php 
                $fecha_naci = $this->Modelo_proyecto->ver_edad($dif->id_ingreso);
                $fecha_nacinino = $fecha_naci;
                $fecha_actual = date("Y/m/d/");
                $edad = $fecha_actual - $fecha_nacinino;
                if($edad > 100) echo "0"; 
                else echo $edad;
                ?>
                </td>
                <td><?php echo $e->motivos_ingreso;?></td>
                <td><?php echo $e->no_expediente;?></td>
                <td><?php echo $e->no_carpeta;?></td>
                
                <td><a href="<?php echo base_url('index.php/proyecto/evaluacion_medico');?>/<?php echo $e->id_expediente;?>" role="button"><span class="glyphicon glyphicon-list-alt"></span></a></td>
                

                <!--<td><a href="<?php echo base_url();?>index.php/proyecto/revisar_expedientes/<?php echo $e->id_expediente;?>/<?php echo $e->id_ingreso;?>" role="button"><span class="glyphicon glyphicon-eye-open"></span> Ver</a></td>-->
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>


        </div>
      </div>
    </div>


   