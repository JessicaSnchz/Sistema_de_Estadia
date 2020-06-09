<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
    <li class="active">Centros Asistenciales</li>
  </ol>
          <center><h1 style="background-color: white" border="2" class="page-header">CENTROS ASISTENCIALES</h1></center>


 <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/alta_centro" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo centro</a>
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
 <input type="text" class="form-control" placeholder="Buscar centro..." name="busqueda">
  
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
                <th>Nombre del centro</th>
                <th>Ubicación</th>
                <th></th>
                </center>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($centros as $c){
              ?>
              <tr bgcolor="#FEF5E7">
              <!--<td><center><a href="<?php echo base_url('index.php/proyecto/registros_por_casa');?>/<?php echo $c->id_centro;?>" role="button"><span class="glyphicon glyphicon-user"></span></a></td>-->
                <td><a href="<?php echo base_url('index.php/proyecto/registros_por_casa');?>/<?php echo $c->id_centro;?>"><?php echo $c->nombre_centro;?></a></td>
                <td><?php echo $c->ubicacion;?></td>
                <td><center><a class="btn btn-success"  href="<?php echo base_url('index.php/proyecto/edita_centro');?>/<?php echo $c->id_centro;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>


        </div>
      </div>
    </div>


   