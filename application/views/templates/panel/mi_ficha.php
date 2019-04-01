<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/mis_fichas">Fichas técnicas</a></li>
      <li class="active">Ficha técnica actual</li>
    </ol> 
      <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/fichas_tecnicas/<?php echo $ficha_tec['id_ficha']; ?>/<?php echo $ficha_tec['fk_ts']; ?>">
        <div class="col-md-10">
          <div class="well well-sm">
              <h2 align="center" ><?php echo $ficha_tec['nombre_ts'] ?></h2>
              <h4 align="center"><?php echo $ficha_tec['clave']?></h4>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <?php if ($ficha_tec['tipo']=='T') {
                  $tipo="Trámite";$T="TRAMITE";
                    }else{$tipo="Servicio";$T="SERVICIO";}?>
                  <label>TIPO DE SOLICITUD: <?php echo $tipo?> </label><br/>
                  <label>DEPENDENCIA: <?php echo $ficha_tec['nombre'] ?></label><br/>
                  <?php if($clas_ts['nombre_clasificacion']=="Otro"){
                    $clas="";
                  }else{
                    $clas=$clas_ts['nombre_clasificacion'];
                  }?>
                  <label>CLASIFICACIÓN: <?php echo $clas ?></label><!--FALTA consulta clasificación rpm -->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <label>FECHA DE ELABORACIÓN: <?php echo $ficha_tec['fecha_elab']?> </label><br/>
                  <label>FECHA DE MODIFICACIÓN: <?php echo $ficha_tec['fecha_elab']?> </label><br/><!--FALTA consultar la fecha de la última version-->
                  <label>VERSIÓN: <?php echo $version_ft['version']?> </label><br/><!--FALTA trabajar con versiones -->
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="well well-sm">
              <div class="panel-body" >
                <label>DESCRIPCIÓN DEL <?php echo $T?> </label><br/>
                  <p><?php echo $ficha_tec['descripcion_ft']?> </p><br/>
                  <label>¿QUÉ OBTIENE EL CIUDADANO? </label><br/>
                  <p><?php echo $ficha_tec['producto_final']?> </p><br/>
                  <label>CASOS EN QUE DEBE DE REALIZARSE</label><br/>
                  <p><?php echo $ficha_tec['en_caso_de']?> </p><br/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <!--FALTA EL IF DE LA MODALIDAD -->
                <label>MODALIDAD: </label><br/><p><?php echo $modalidad['nombre_modalidad']?></p><!--FALTA consulta modalidad -->
                  <label>ÁMBITO DE APLICACIÓN: </label><br/><p><?php echo $ambito['nombre']?></p><!--FALTA consulta quien_ambito_aplicación-->
                  <label>¿QUIÉN PUEDE SOLICITARLO?: </label><br/>
                  <?php foreach ($quien as $q) { ?> 
                      <p>- <?php echo $q->nombre_q; ?></p>
                  <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>PASOS</b></h4><br>
                    <table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th>N°</th>
                            <th>Paso</th>
                          </tr>
                        </thead>
                      <tbody>
                        <?php
                        foreach ($pasos as $a) {

                        ?>
                          <tr>
                            <td><?php echo $a->orden; ?></td>
                            <td><?php echo $a->descripcion_paso; ?></td>
                          </tr>
                        <?php
                        }
                         ?>
                      </tbody>
                    </table>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>REQUISITOS</b></h4><br>
                    <table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th>N°</th>
                            <th>Requisito</th>
                            <th>Original</th>
                            <th>Copias</th>
                            <th>Requisito externo</th>
                          </tr>
                        </thead>
                      <tbody>
                        <?php
                        foreach ($req as $r) {

                        ?>
                          <tr>
                            <td><?php echo $r->orden; ?></td>
                            <td><?php echo $r->descripcion_req; ?></td>
                            <td><?php echo $r->original; ?></td>
                            <td><?php echo $r->copias; ?></td>
                            
                          </tr>
                        <?php
                        }
                         ?>
                      </tbody>
                    </table>
                    <label>INFORMACIÓN RELEVANTE: </label><p><?php echo $ficha_tec['info_relevante']?></p><br/>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="well well-sm">
              <div class="panel-body" >
                <!--FALTA EL IF DE LA MODALIDAD -->
                <?php if ($ficha_tec['ficta']=='P') {
                  $fic="Positiva";
                    }else{$fic="Negativa";}?>
                  <label>FICTA: </label><p><?php echo $fic?></p>
                <label>TIEMPO DE RESPUESTA: </label><p><?php echo $ficha_tec['tiempo_res']?></p><br/>
                  <label>CONSIDERACIONES: </label><p><?php echo $ficha_tec['consideraciones']?></p><br/><!--FALTA consulta quien_ambito_aplicación-->
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="well well-sm">
              <div class="panel-body" >
                <!--FALTA EL IF DE LA MODALIDAD -->
                    <?php if(!empty($ficha_tec['vigencia'])) {
                     $v=$ficha_tec['vigencia'];
                    }else{$v="No aplica";}?>
                  <label>VIGENCIA: </label><p><?php echo $v?></p><br/><!--FALTA consulta quien_ambito_aplicación-->
                  <?php if(!empty($ficha_tec['costo'])) {
                     $c=$ficha_tec['costo'];
                    }else{$c="No tiene costo";}?>
                  <label>COSTO: </label><p><?php echo $c?></p><br/>
                  <?php if(!empty($ficha_tec['concepto_pago'])) {
                     $co=$ficha_tec['concepto_pago'];
                    }else{$co="No aplica";}?>
                  <label>CONCEPTO DE PAGO: </label><p><?php echo $co?></p><br/>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="well well-sm">
              <div class="panel-body" >
                  <label>DATOS DEL ÁREA ENCARGADA: </label><p>Área: <?php echo $ficha_tec['nombre_a']?>
                    <br/>
                    Encargado:<?php echo $ficha_tec['nombres']." ".$ficha_tec['ape_pat']." ".$ficha_tec['ape_mat'];?>
                    <br>
                    Horario de atención: <?php echo $horario['dias']. " de ".$horario['horas'];?>
                    <br>
                    Teléfono:<?php echo $ficha_tec['telefono']." ext.(".$ficha_tec['extension'].")";?>
                    <br>
                    Correo electrónico:<?php echo $ficha_tec['correo']?>;
                    <br>
                    Dirección:<?php echo $ficha_tec['municipio'].", ".$ficha_tec['colonia'].", calle ".$ficha_tec['calle'].", número int. ".$ficha_tec['num_int'].", número ext.".$ficha_tec['num_ext'].", ".$ficha_tec['estado'] ; ?>
                    <br>
                    Ubicación:<?php echo $ficha_tec['ubicacion']?>
                    <br>
                    
                  </p>
                  
              </div>
            </div>
          </div>
        
        </div>
      </form>
</div>