<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
    <li class="active">Personal</a></li>
  </ol>

 <center><h1 style="background-color: white" border="2" class="page-header">PERSONAL</h1></center>
<br>

 <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_empleados" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo trabajador</a>
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
 <input type="text" class="form-control" placeholder="Buscar trabajdores..." name="busqueda">
  
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
                <th>Nombre del trabajador</th>
                <th>Género</th>
                <th>Correo</th>
                <th>Área</th>
                <th>Centro de Asistencia</th>

                <th>Activo</th>
                
        <th></th>
        <th></th>
                </center>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($residentes as $res){
              ?>
              <?php 
                              if($res->activop=="Activo"){
                                $texto = "Activo";
                                $etiqueta = "success";
                              }else{
                                $texto = "Inactivo";
                                $etiqueta = "warning";
                              }
                            ?>
              <tr>
                <td class="<?php echo $etiqueta;?>"><?php echo $res->nombres;?> <?php echo $res->apellido_p;?> <?php echo $res->apellido_m;?></td>
                <td class="<?php echo $etiqueta;?>"><?php echo $res->genero;?></td>
                <td class="<?php echo $etiqueta;?>"><?php echo $res->correo;?></td>
                <td class="<?php echo $etiqueta;?>"><?php echo $res->nombre_privilegio;?></td>
                <td class="<?php echo $etiqueta;?>"><?php echo $res->nombre_centro;?></td>
                <td class="<?php echo $etiqueta;?>"><?php echo $res->activop;?></td>
                <td class="<?php echo $etiqueta;?>"><a href="<?php echo base_url('index.php/proyecto/edita_estatus_personal');?>/<?php echo $res->id_persona;?>" role="button"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <!--<td class="<?php echo $etiqueta;?>"><a data-toggle="modal" data-target="#popup<?php echo $res->id_persona;?>"><span class="glyphicon glyphicon-pencil"></span></a>
  
  <div class="modal  fade" id="popup<?php echo $res->id_persona;?>" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Cerrar</span></button>
          <h3 style="text-align: center" class="modal-title" id="label"><strong>CAMBIO DE ESTATUS</strong></h3>
        </div>
        <div class="modal-body">
          <p style="text-align: center">
          <center>  
            <?php 
             foreach ($estatus as $e) {
            ?>
            <div>
            <input type="radio" class="form-control.radio" id="id_estatus" name="estatus" value="<?=$e->id_estatus;?>" > <?=$e->nombre_estatus;?>
            </div>
            <?php }?>
            </center>
            <br>
            <center><a class="btn btn-warning" href="<?php echo base_url('index.php/proyecto/cambio_estatust');?>/<?php echo $res->id_persona;?>" >Cambiar</a></center>

          </p>
        </div>
      </div>
    </div>
  </div></td>-->
               
        <td class="<?php echo $etiqueta;?>"><a class="btn btn-success"  href="<?php echo base_url('index.php/proyecto/edita_personal');?>/<?php echo $res->id_persona;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
            
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>


        </div>
      </div>
    </div>


   