  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/vista_ninos">Registros de niños</a></li>
      <li class="active">Hermanos</li>
    </ol>

        <center><h1 class="page-header">Hermanos</h1></center>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/ver_hermanos/'.$ingreso['id_ingreso'],$atributos);
        //var_dump($privilegio);
       ?>
  <!--        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Búsqueda por su carpeta
          <span class="caret"> </span>
         </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href=""> <label for="Nombres">Número de Carpeta <span class="asterisco">*</span> </label>
      <input type="text" class="form-control" name="carpeta" value="<?php if(set_value('carpeta')) echo set_value('carpeta'); else {if($ingreso) echo $ingreso['no_carpeta'];}?>" id="Nombres"  readonly="readonly">
      <?php echo form_error('carpeta');?></a></li>

      <input type="hidden" name="id_ingreso" value="<?php echo $ingreso['id_ingreso']; ?>">
      <?php echo form_error('id_ingreso');?>

      </ul>
          </div>

         <br>
<br>
 <div id="formulario" >

    <table style="background-color:#F5F6CE;">

        <tr>
           

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
           

</div>

        </tr>

<br>  


    </table>

 </div>

</body>

</html>-->
<br>

          <table class="table table-bordered">
            
            <thead>
              <tr bgcolor="#F9E79F" align="center">
                  <center>
                <th>Fotográfia</th>
                <th>Nombre del niño</th>
                <th>Genéro</th>
                <th>Edad</th>
                <th>Lugar de Nacimiento</th>
              
                <th>Municipio Origen</th>
               <th>No. Carpeta</th>
                <th>Centro de Asistencia</th>
                
            
                
                
                </center>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($hermanos as $dif){
              ?>
              <tr bgcolor="#FEF5E7">
              <td><img src="<?=base_url();?>/uploadt/<?=$dif->foto_nino;?>" width='55' height='55'></td>
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
                <td><?php echo $dif->no_carpeta;?></td>
                <td><?php echo $dif->nombre_centro;?></td>

        
        
            
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>



        </div>
      </div>
    </div>


   