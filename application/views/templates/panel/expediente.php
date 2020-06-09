<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/vista_expediente_nino">Lista de Expedientes</a></li>
      <li class="active">Expediente particular</li>
    </ol> 
      <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/revision_expediente/<?php echo $expediente['id_expediente']; ?>/<?php echo $expediente['id_ingreso']; ?>">
        <div class="col-md-12">
          <div class="well well-sm">
              <h1 align="center" ><?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?></h1>
              <h2 align="center" ><p>No. Expediente:  <?php echo $expediente['no_expediente'] ?> </p></h2>
              <h3 align="center"><p>No. Carpeta:  <?php echo $expediente['no_carpeta']?></p></h3>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
              <td><center><img src="<?=base_url();?>/uploadt/<?=$expediente['foto_nino'];?>" width='300' height='315'></center></td>
              <!--<td><img src="<?=base_url();?>/uploadt/<?=$dif->foto_nino;?>" width='60' height='60'></td>-->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <label>FECHA DE NACIMIENTO: </label>  <?php echo $expediente['fecha_nnino']?><br/>
                <label>EDAD: </label>  <td>
                <?php 
                $id_ingreso = $this->Modelo_proyecto->devuelve_id_ing($this->uri->segment(4));
                $fecha_naci = $this->Modelo_proyecto->ver_edad($id_ingreso);
                $fecha_nacinino = $fecha_naci;
                $fecha_actual = date("Y/m/d/");
                $edad = $fecha_actual - $fecha_nacinino;
                if($edad > 100) echo "0"; 
                else echo $edad;
                ?>
                </td><br/>
                <label>GÉNERO: </label> <?php echo $expediente['genero_nino']?> 
                  <br/>
                <label>LUGAR DE NACIMIENTO: </label>  <?php echo $expediente['lugar_nnino']?> <br>
                <label>MUNICIPIO DE ORIGEN:  </label>  <?php echo $expediente['municipio_origen']?><br>
                <label>FECHA DE INGRESO: </label>  <?php echo $expediente['fecha_ingreso']?> <br/>
                  <label>HORA INGRESO: </label>  <?php echo $expediente['hora_ingreso']?> <br/>
                  <label>CENTRO ASISTENCIAL: </label>  <?php echo $expediente['nombre_centro']?> <br/>
                  <label>ESTATUS: </label>  <?php echo $expediente['nombre_incidencia']?> <br/>
                  <label>ESTADO PROCESAL: </label>  <?php echo $expediente['nombre_estado']?> <br/>
                  <label>PERSONAL QUE ATIENDE: 
                  <!--<table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th>Área</th>
                            <th>Nombre de personal</th>
                          </tr>
                        </thead>
                      <tbody>
                        <?php
                        foreach ($personas_atiende as $pe) {

                        ?>
                          <tr>
                            <td><?php echo $pe->nombre_privilegio;?></td>
                            <td><?php echo $pe->nombres;?> <?php echo $pe->apellido_p;?> <?php echo $pe->apellido_m;?></td>
                            
                          </tr>
                        <?php
                        }
                         ?>
                      </tbody>
                    </table>-->
              </div>
            </div>
          </div>
          <div class="col-md-12">
            
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                 <label>MOTIVOS DE INGRESO </label><br/>
                  <p><?php echo $expediente['motivos_ingreso']?> </p><br/>
                  <label>OBSERVACIONES DEL INGRESO </label><br/>
                  <p><?php echo $expediente['observaciones_ingreso']?> </p>
                  
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>PERTENENCIAS</b></h4><br>
                    <table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th>Cantidad</th>
                            <th>Descripción</th>
                          </tr>
                        </thead>
                      <tbody>
                        <?php
                        foreach ($pertenencias as $pe) {

                        ?>
                          <tr>
                            <td><?php echo $pe->cantidad; ?></td>
                            <td><?php echo $pe->descripcion; ?></td>
                            
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
                <h4 align="center"><b>HERMANOS</b></h4><br>
                    <table class="table table-bordered" align="center">
                        <thead>
                          <tr> 
                            <th>No. Expediente</th>
                            <th>No. Carpeta</th>
                            <th>Estado Procesal</th>
                            <th>Nombre del niño</th>
                            <th>Género</th>
                            <th>Fecha nacimiento</th>
                            <th>Edad</th>
                            <th>Motivos de ingreso</th>
                            <th>Fecha de ingreso</th>
                          </tr>
                        </thead>
                      <tbody>
                        <?php
                        foreach ($hermanos as $h) {
                        ?>
                          <tr>
                          <td><?php echo $h->no_expediente; ?></td>
                          <td><?php echo $h->no_carpeta; ?></td>
                          <td><?php echo $h->nombre_estado; ?></td>
                          <td><?php echo $h->nombres_nino; ?> <?php echo $h->apellido_pnino; ?> <?php echo $h->apellido_mnino; ?></td>
                          <td><?php echo $h->genero_nino; ?></td>
                          <td><?php echo $h->fecha_nnino; ?></td>
                          <td><center>
                           <?php 
                           $fecha_naci = $this->Modelo_proyecto->ver_edad($h->id_ingreso);
                           $fecha_nacinino = $fecha_naci;
                           $fecha_actual = date("Y/m/d/");
                           $edad = $fecha_actual - $fecha_nacinino;
                           if($edad > 100) echo "0"; 
                           else echo $edad;
                           ?>
                          </td>
                          <td><?php echo $h->motivos_ingreso; ?></td>
                          <td><?php echo $h->fecha_ingreso; ?></td>
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
                <h4 align="center"><b>VALORACIONES</b></h4><br>
                    <label>VALORACIÓN MEDICA </label><br/>
                  <p>
                  Condición inicial: <?php echo $valoracion_medi['condicion']?><br>
                  Descripción inicial de salud: <?php echo $valoracion_medi['des_ini']?><br>
                  Peso: <?php echo $valoracion_medi['peso']?><br>
                  Talla: <?php echo $valoracion_medi['talla']?><br>
                  Descripción de cabeza:: <?php echo $valoracion_medi['cabeza']?><br>
                  Descripción de ojos: <?php echo $valoracion_medi['ojos']?><br>
                  Descripción de nariz: <?php echo $valoracion_medi['nariz']?><br>
                  Descripción de boca: <?php echo $valoracion_medi['boca']?><br>
                  Descripción de cuello: <?php echo $valoracion_medi['cuello']?><br>
                  Descripción de torax: <?php echo $valoracion_medi['torax']?><br>
                  Descripción de abdomen: <?php echo $valoracion_medi['abdomen']?><br>
                  Descripción de genitales: <?php echo $valoracion_medi['genitales']?><br>
                  Descripción de columna: <?php echo $valoracion_medi['columna']?><br>
                  Descripción de extremidades: <?php echo $valoracion_medi['extremidades']?><br>
                  Descripción de tés: <?php echo $valoracion_medi['tes']?><br>
                  </p>
                  <label>VALORACIÓN NUTRIOLÓGICA </label><br/>
                  <p>Peso: <?php echo $valoracion_nutri['peso']?><br>
                  Talla: <?php echo $valoracion_nutri['talla']?><br>
                  Peso ideal: <?php echo $valoracion_nutri['peso_ideal']?><br>
                  Diagnostico nutricional: <?php echo $valoracion_nutri['diagnostico_nutricional']?><br>
                  Dieta: <?php echo $valoracion_nutri['dieta']?><br>
                  Plan alimenticio: <?php echo $valoracion_nutri['plan_alimenticio']?><br>
                  Rasgos fisicos: <?php echo $valoracion_nutri['rasgos_fisicos']?><br>
                  Datos del comedor: <?php echo $valoracion_nutri['datos_comedor']?><br>
                  ¿Se presenta alguna enfermedad? <?php echo $valoracion_nutri['enfermedad']?><br>
                  Trato especial: <?php echo $valoracion_nutri['trato_especial']?><br>
                  </p>
                  <label>VALORACIÓN ESCOLAR </label><br/>
                  <p>Escolaridad: <?php echo $valoracion_peda['nivel_estudios']?><br>
                  Lectura: <?php echo $valoracion_peda['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_peda['obs_lectoras']?><br>
                  Comprensión lectora: <?php echo $valoracion_peda['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_peda['obs_comp_lectora']?><br>
                  Transcripción: <?php echo $valoracion_peda['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_peda['obs_transcripcion']?><br>
                  Matemáticas: <?php echo $valoracion_peda['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_peda['obs_matematicas']?><br>
                  Español: <?php echo $valoracion_peda['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_peda['obs_espanol']?><br>
                  Escritura: <?php echo $valoracion_peda['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_peda['obs_escritura']?><br>  
                  Canaliza de nivel: <?php echo $valoracion_peda['nombre_educacion']?></p>
                  <label>VALORACIONES PSICOLÓGICAS </label><br/>
                  <label>Valoración del ingreso del menor</label>
                  <p>
                  Motivos de ingreso: <?php echo $valoracion_psico['motivos_ing']?><br>
                  Nombre del visitante: <?php echo $valoracion_psico['nombre_visitante']?><br>
                  Parentesco: <?php echo $valoracion_psico['parentesco']?><br>
                  Antecedentes: <?php echo $valoracion_psico['antecedentes']?><br>
                  Actitud del niño: <?php echo $valoracion_psico['actitud_nino']?><br>
                  Dinamica de convivencias: <?php echo $valoracion_psico['dinamica_convivencias']?><br>
                  Recomendaciones: <?php echo $valoracion_psico['recomendaciones']?>
                  </p>
                  <label>Valoración psicológica del menor</label>
                  <p>
                  Familiograma: <?php echo $valoracion_pmenor['familiograma']?><br>
                  Antecedentes: <?php echo $valoracion_pmenor['antec_m']?><br>
                  Instrumentos: <?php echo $valoracion_pmenor['instrumentos']?><br>
                  Resultados: <?php echo $valoracion_pmenor['resul']?><br>
                  Impresión del menor: <?php echo $valoracion_pmenor['impresion']?><br>
                  Recomendaciones: <?php echo $valoracion_pmenor['recomen']?>
                  </p>
                  <label>Notas psicológicas</label>
                  <p>
                  Comentarios: <?php echo $notas['coment']?><br>
                  Actividad: <?php echo $notas['actividad']?>
                  </p>
                  <label>Valoración psicológica del familiar</label>
                  <p>
                  Nombre del familiar: <?php echo $visita['nombre_cp']?><br>
                  Parentesco: <?php echo $visita['parent_m']?><br>
                  Escolaridad: <?php echo $visita['escolaridad']?><br>
                  Estado civil: <?php echo $visita['ecivil']?><br>
                  No. Hijos: <?php echo $visita['n_hijos']?><br>
                  Ocupación: <?php echo $visita['ocupacione']?><br>
                  Dirección: <?php echo $visita['direccione']?><br>
                  Antecedentes: <?php echo $visita['ant']?><br>
                  Conclusiones: <?php echo $visita['conclu']?><br>
                  Recomendaciones: <?php echo $visita['rec']?>
                  </p>
                  <label>VALORACIÓN JURÍDICA </label><br/>
                  <p></p><br>
                  <label>VALORACIÓN DE TRABAJO SOCIAL </label><br/>
                  <label>Visita domiciliaria</label>
                  <p>
                  Nombre: <?php echo $estudio_s['nombre_r']?><br>
                  Nombre: <?php echo $estudio_s['nombre_e']?><br>
                  Pariente: <?php echo $estudio_s['pariente']?><br>
                  Edad: <?php echo $estudio_s['edad']?><br>
                  Domicilio: <?php echo $estudio_s['domicilio']?><br>
                  Antecedentes del caso: <?php echo $estudio_s['antec_caso']?><br>
                  Escolaridad: <?php echo $estudio_s['escol']?><br>
                  Ocupación: <?php echo $estudio_s['ocupacion']?><br>
                  Enfermedades: <?php echo $estudio_s['p_enfer']?><br>
                  Antecedentes penales: <?php echo $estudio_s['antec_penal']?><br>
                  Adicciones: <?php echo $estudio_s['adiccion']?><br>
                  Materiales: <?php echo $estudio_s['materiales']?><br>
                  Diágnostico: <?php echo $estudio_s['diagnostico']?>
                  </p>
                  <label>Estudio socieconómico</label>
                  <p>
                  Situación económica: <?php echo $estudio_s['situacion_e']?><br>
                  Gastos en agua: $<?php echo $estudio_s['agua']?><br>
                  Gastos en luz: $<?php echo $estudio_s['luz']?><br>
                  Gastos en alimentos: $<?php echo $estudio_s['alimentos']?><br>
                  Gastos en transporte: $<?php echo $estudio_s['transporte']?><br>
                  Gastos en telefono: $<?php echo $estudio_s['tel']?><br>
                  Gastos médicos: $<?php echo $estudio_s['g_medicos']?><br>
                  Total ingreso: $<?php echo $estudio_s['tot_i']?><br>  
                  Total egreso: $<?php echo $estudio_s['tot_e']?><br>
                  Bienes: <?php echo $estudio_s['bienes_i']?><br>
                  Nivel: <?php echo $estudio_s['nivel_s']?><br>  
                  Clase: <?php echo $estudio_s['clase']?><br>                  
                  </p>
                  <p></p>
              </div>
            </div>
          </div>

           <div class="col-md-12">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>FAMILIARES</b></h4><br>
                    <table class="table table-bordered" align="center">
                        <thead>
                          <tr> 
                            <th>Nombre familiar</th>
                            <th>Género</th>
                            <th>Fecha nacimiento</th>
                            <th>Parentesco</th>
                          </tr>
                        </thead>
                      <tbody>
                        <?php
                        foreach ($familiar as $f) {

                        ?>
                          <tr>
                            <td><?php echo $f->nombre_f; ?> <?php echo $f->apellido_pf; ?> <?php echo $f->apellido_mf; ?></td>
                            <td><?php echo $f->genero_f; ?></td>
                            <td><?php echo $f->fecha_naf; ?></td>
                            <td><?php echo $f->relacion; ?></td>
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
                <h4 align="center"><b>PENSIONES</b></h4><br>
                    <table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th>Cuaderno</th>
                            <th>Familiar</th>
                            <th>Fecha de deposito</th>
                            <th>Monto inicial</th>
                            <th>Monto retirado</th>
                            <th>Monto final</th>
                          </tr>
                        </thead>
                      <tbody>
                        <?php
                        foreach ($pensiones as $p) {

                        ?>
                          <tr>
                            <td><?php echo $p->cuaderno; ?></td>
                            <td><?php echo $p->nombre_f; ?> <?php echo $p->apellido_pf; ?> <?php echo $p->apellido_mf; ?></td>
                            <td><?php echo $p->fecha_pension; ?> </td>
                            <td><center>$<?php echo $p->monto; ?> </td>
                            <td><center>$<?php echo $p->retiro; ?> </td>
                            <td><center>$
                            <?php 
                            $monto = $this->Modelo_proyecto->ver_montop($p->id_pension);
                            $retiro = $this->Modelo_proyecto->ver_retiro($p->id_pension);
                            $total = $monto - $retiro;
                            echo $total;
                            ?>
                            </td>
                          </tr>
                        <?php
                        }
                         ?>
                      </tbody>
                    </table>
              </div>
            </div>
          </div>
        </div>
      </form>
</div>