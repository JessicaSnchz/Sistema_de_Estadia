<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>index.php/proyecto/vista_equipos">Equipos</a></li>
  </ol>
           <center><h1 style="background-color: white" border="2" class="page-header"> REGISTROS DE LOS EQUIPOS </h1></center>


<br>
<br>
 <a class="btn btn-primary" href="<?php echo base_url();?>index.php/proyecto/formacion_equipos" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo equipo</a>
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
                <th>Nombre del equipo</th>
                <th>Abogado</th>
                <th>Trabajador(ra) social</th>
                <th>Psicologo</th>
              
                <th>Editar</th>
                
                
                </center>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($equiposdif as $eq){
              ?>
              <tr bgcolor="#FEF5E7">
                <td><?php echo $eq->no_equipo;?></td>
                <td><?php echo $eq->nombres;?> <?php echo $eq->apellido_p;?> <?php echo $eq->apellido_m;?></td>
                 <td><?php echo $eq->nombres;?> <?php echo $eq->apellido_p;?> <?php echo $eq->apellido_m;?></td>
                <td><?php echo $eq->nombres;?> <?php echo $eq->apellido_p;?> <?php echo $eq->apellido_m;?></td>
               <td> </td>
                
                  <?php 

                }?>

            
              </tr>
              
            </tbody>
          </table>



        </div>
      </div>
    </div>


   