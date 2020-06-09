<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
    <li class="active">Registros de niños</li>
  </ol>

  <center><h1 style="background-color: white" border="2" class="page-header"> REGISTROS DE TODOS LOS NIÑOS </h1></center>

<br>
 <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_ninos" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo niño</a>
<br>
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
 <input type="text" class="form-control" placeholder="Buscar niños..." name="busqueda">
  
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
                <th><center>Foto</th>
                <th><center>Nombre del niño</th>
                <th><center>Genéro</th>
                <th><center>Edad</th>
                <th><center>Lugar de Nacimiento</th>
                <th><center>Municipio Origen</th>
                <th><center>Fecha ingreso</th>
                <th><center>Motivos ingreso</th>
                <th><center>No. Carpeta</th>
                <th><center>Centro de Asistencia</th>
                <th><center>Editar</th>
                <th><center></th>
                </center>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($ninosdif as $dif){
              ?>
              <tr bgcolor="#FEF5E7">
                <td><img src="<?=base_url();?>/uploadt/<?=$dif->foto_nino;?>" width='60' height='60'></td>
                <td><?php echo $dif->nombres_nino;?> <?php echo $dif->apellido_pnino;?> <?php echo $dif->apellido_mnino;?></td>
                <td><?php echo $dif->genero_nino;?></td>
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
                <td><?php echo $dif->lugar_nnino;?></td>
                <td><?php echo $dif->municipio_origen;?></td>
                <td><?php echo $dif->fecha_ingreso;?></td>
                <td><?php echo $dif->motivos_ingreso;?></td>
                <td><?php echo $dif->no_carpeta;?></td>
                <td><?php echo $dif->nombre_centro;?></td>

        <td><a class="btn btn-info"  href="<?php echo base_url('index.php/proyecto/edita_ingreso');?>/<?php echo $dif->id_ingreso;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> <span class="glyphicon glyphicon-user"></span></a></td>
        <td><a class="btn btn-primary"  href="<?php echo base_url('index.php/proyecto/visita_domiciliaria');?>/<?php echo $dif->id_expediente;?>" role="button"><span  class="glyphicon glyphicon-home"></span> <span  class="glyphicon glyphicon-file"></span></a></td>
            
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>

<!--<input type="hidden" name="usuario" class="form-control" value="<?php echo $sesion['id_persona'];?>">-->


        </div>
      </div>
    </div>


   