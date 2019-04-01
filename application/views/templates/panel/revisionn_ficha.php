<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/fichas">Fichas técnicas</a></li>
      <li class="active">Ficha técnica actual</li>
    </ol> 
      <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/revision_ficha/<?php echo $ficha_tec['id_ficha']; ?>/<?php echo $ficha_tec['fk_ts']; ?>">
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
                  <label>CLASIFICACIÓN: </label><!--FALTA consulta clasificación rpm -->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <label>FECHA DE ELABORACIÓN: <?php echo $ficha_tec['fecha_elab']?> </label><br/>
                  <label>FECHA DE MODIFICACIÓN: <?php echo $ficha_tec['fecha_elab']?> </label><br/><!--FALTA consultar la fecha de la última version-->
                  <label>VERSIÓN: </label><br/><!--FALTA trabajar con versiones -->
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
                <label>MODALIDAD: </label><br/><!--FALTA consulta modalidad -->
                  <label>ÁMBITO DE APLICACIÓN: </label><br/><!--FALTA consulta quien_ambito_aplicación-->
                  <label>¿QUIÉN PUEDE SOLICITARLO?: </label><br/>
                  <?php if ($ficha_tec['ficta']=='P') {
                  $fic="Positiva";
                    }else{$fic="Negativa";}?>
                  <label>FICTA: </label><p><?php echo $fic?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
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
            <div class="panel panel-primary">
              <div class="panel-heading">VALIDACIÓN DE LA FICHA</div>
                <div class="panel-body">
                  <label for="validacion">Validación <span class="asterisco">*</span></label><br/>
                    <div class="radio">
                      <label><input type="radio"  name="validacion" value="SI" <?php if(set_value('validacion')=='SI') echo "checked";?>>Aceptada</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio"  name="validacion" value="NO" <?php if(set_value('validacion')=='NO') echo "checked";?>>Denegada</label><br/><br/>
                    </div>
                  <label for="comentarios">Comentarios</label>
                  <textarea name="comentarios" class="form-control"></textarea><br/>
                  <input type="hidden" name="id_ficha" value="<?php echo $ficha_tec['id_ficha']; ?>"><br/>
                  <?php echo form_error('id_ficha');?>
                  <button type="submit" class="btn btn-primary" name="formulario">Guardar cambios</button><br/>
                </div>
            </div>
          </div>
        </div>
      </form>
</div>