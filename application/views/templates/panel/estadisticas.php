<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li class="active">Estadísticas</li>
    </ol> 
      <!--<form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/revision_expediente/<?php echo $expediente['id_expediente']; ?>/<?php echo $expediente['id_ingreso']; ?>">-->

           <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                 <h4 align="center"><b>GÉNERO</b></h4>
                 <table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th><center>Femenino</th>
                            <th><center>Masculino</th>
                            <th><center>Total</th>
                          </tr>
                        </thead>
                      <tbody>
                        <tr>
                        <td><center><?php $mujeres = $this->Modelo_proyecto->genero_femenino();
                        echo $mujeres;?></td>
                        <td><center><?php $hombres = $this->Modelo_proyecto->genero_masculino();
                        echo $hombres;?></td>
                        <td><center><?php $total_g = $mujeres + $hombres;
                        echo $total_g;?></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>GRÁFICA</b></h4><br>
                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
                    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  
                  </head>
                  <body>

                  <input type="button" id="Buscar1" value="Graficar">



                  <canvas id="myChart1" width="500" height="150"></canvas>   
              </div>
            </div>
          </div>
        </div>

           <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                 <h4 align="center"><b>ESTADO PROCESAL</b></h4>
                 <table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th><center>En Juicio</th>
                            <th><center>Convenio Asistencial</th>
                            <th><center>Trámite Administ.</th>
                            <th><center>Situación Jurídica Resuelta</th>
                            <th><center>Fugado</th>
                            <th><center>Total</th>
                          </tr>
                        </thead>
                      <tbody>
                        <tr>
                        <td><center><?php $ju = $this->Modelo_proyecto->en_juicio();
                        echo $ju;?></td>
                        <td><center><?php $convenios = $this->Modelo_proyecto->convenios_asistenciales();
                        echo $convenios;?></td>
                        <td><center><?php $tramite = $this->Modelo_proyecto->tramite_administrativo();
                        echo $tramite;?></td>
                        <td><center><?php $resuelta = $this->Modelo_proyecto->situacion_juridica_resuelta();
                        echo $resuelta;?></td>
                        <td><center><?php $fugados = $this->Modelo_proyecto->fugados_gr();
                        echo $fugados;?></td>
                        <td><center><?php $total_e = $ju + $convenios + $tramite + $resuelta + $fugados;
                        echo $total_e;?></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>GRÁFICA</b></h4><br>
                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
                    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
                  </head>
                  <body>
                  <input type="button" id="Buscar" value="Graficar">
                  <canvas id="myChart" width="500" height="150"></canvas>   
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                 <h4 align="center"><b>ESTADO DEL MENOR</b></h4>
                 <table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th><center>Ingresos</th>
                            <th><center>Egresos</th>
                            <th><center>Fugas</th>
                            <th><center>Total</th>
                          </tr>
                        </thead>
                      <tbody>
                        <tr>
                        <td><center><?php $ingresos = $this->Modelo_proyecto->estadistica_ingresos();
                        echo $ingresos;?></td>
                        <td><center><?php $egresos = $this->Modelo_proyecto->estadistica_egresos();
                        echo $egresos;?></td>
                        <td><center><?php $fugas = $this->Modelo_proyecto->estadistica_fugados();
                        echo $fugas;?></td>
                        <td><center><?php $total_i = $ingresos + $egresos + $fugas;
                        echo $total_i;?></td>
                          </tr>
                      </tbody>
                    </table>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>GRÁFICA</b></h4><br>
                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
                    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  
                  </head>
                  <body>

                  <input type="button" id="Buscar2" value="Graficar">



                  <canvas id="myChart2" width="500" height="150"></canvas>   
              </div>
            </div>
          </div>
      </form>
</div>