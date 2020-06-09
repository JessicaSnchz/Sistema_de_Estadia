  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/vista_ninos">Expedientes niños</a></li>
      <li class="active">Visita domiciliaria</li>
    </ol>

       <center> <h1 class="page-header">ALTA DE REPORTE DE ESTUDIO SOCIOECONÓMICO Y VISITA DOMICILIARÍA</h1> </center>

<div class="panel panel-primary">
      <div class="panel-heading">Datos del niño ingresado</div>
    <div class="panel-body">
       <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/visita_domiciliaria/<?php echo $expediente['id_expediente'];?>">
      
         <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
              <td><center><img src="<?=base_url();?>/assets/img/<?=$expediente['foto_nino'];?>" width='300' height='315'></center></td>
                <!--<?php echo $expediente['foto_nino']?>-->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <label>Nombre del niño: </label> <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?><br>
              <label>No. Expediente: </label>  <?php echo $expediente['no_expediente'] ?> <br>
              <label>No. Carpeta: </label> <?php echo $expediente['no_carpeta']?><br>
              <label>Fecha de nacimiento: </label>  <?php echo $expediente['fecha_nnino']?><br/>
                <label>Edad: </label>  <br/>
                <label>Género: </label>  
                 <?php if(($expediente['genero_nino'])=="F"){
                  ?>
                  <span>Femenino</span>
                <?php
                }
                else{
                  ?>
                  <span>Masculino</span>
                  <?php 
                }?> <br/>
                <label>Lugar de nacimiento: </label>  <?php echo $expediente['lugar_nnino']?> <br>
                <label>Municipio de origen:  </label>  <?php echo $expediente['municipio_origen']?><br>
                <label>Fecha de ingreso: </label>  <?php echo $expediente['fecha_ingreso']?> <br/>
                  <label>Hora de ingreso: </label>  <?php echo $expediente['hora_ingreso']?> <br/>
                  <label>Centro asistencial: </label>  <?php echo $expediente['nombre_centro']?> <br/>
                  <label>Motivos de ingreso: </label> <?php echo $expediente['motivos_ingreso']?><br/>
                  <label>Observaciones del ingreso </label> <?php echo $expediente['observaciones_ingreso']?>
              </div>
            </div>
          </div>
      </form>
       </div> 
        </div>



     <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/visita_domiciliaria/'.$expediente['id_expediente'],$atributos);
        //var_dump($privilegio);
       ?>
 <input type="hidden" name="expediente" value="<?php echo $expediente['id_expediente']; ?>">
      <?php echo form_error('id_expediente');?>
      <div class="panel panel-primary">
      <div class="panel-heading">Información de la entrevista</div>
    <div class="panel-body">

<label>Fecha de entrevista: <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fecha_e"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fecha_e');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
<br>
    <label for="nombre_r">Realizado por:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nombre_r" value="<?php echo set_value('nombre_r');?>" id="nombre_r" class="form-control" placeholder="Nombre Completo ">
        <?php echo form_error('nombre_r');?>
        </div> 
        </div>
<br>
<div class="panel panel-primary">
      <div class="panel-heading">Antesedentes</div>
    <div class="panel-body">
        <label for="antec_caso">Antecedentes del caso <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="antec_caso" value="<?php echo set_value('antec_caso');?>" id="antec_caso" class="form-control" placeholder="Descripción">
        <?php echo form_error('antec_caso');?>

<br>

</div> 
</div>

<div class="panel panel-primary">
      <div class="panel-heading">Metodología</div>
    <div class="panel-body">
     
    <label for="metod">Metodología: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="metod" value="<?php echo set_value('metod');?>" id="metod" class="form-control" placeholder="Descripción">
        <?php echo form_error('metod');?>
<br>

</div> 
</div>

<div class="panel panel-primary">
      <div class="panel-heading">Información del entrevistado</div>
    <div class="panel-body">


    <label for="nombre_e">Nombre del entrevistado:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nombre_e" value="<?php echo set_value('nombre_e');?>" id="nombre_e" class="form-control" placeholder="Nombre Completo ">
        <?php echo form_error('nombre_e');?>
<br>

    <label for="domicilio">Domicilio <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="domicilio" value="<?php echo set_value('domicilio');?>" id="domicilio" class="form-control" placeholder="Domicilio">
        <?php echo form_error('domicilio');?>

    <br>

    <label for="pariente">Parentesco:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="pariente" value="<?php echo set_value('pariente');?>" id="pariente" class="form-control" placeholder="Parentesco">
        <?php echo form_error('pariente');?>
<br>

    <label for="edad">Edad:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="edad" value="<?php echo set_value('edad');?>" id="edad" class="form-control" placeholder="Edad">
        <?php echo form_error('edad');?>
<br>
    <label>Fecha de nacimiento: <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fecha_n"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fecha_n');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>

<br>

   

    <label for="lugar_n">Lugar de nacimiento:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="lugar_n" value="<?php echo set_value('lugar_n');?>" id="lugar_n" class="form-control" placeholder="lugar de nacimiento">
        <?php echo form_error('lugar_n');?>
<br>
 <label for="estado_c">Estado civíl: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="estado_c" value="<?php echo set_value('estado_c');?>" id="estado_c" class="form-control" placeholder="Estado civil">
        <?php echo form_error('estado_c');?>
<br>
 <label for="escol">Escolaridad: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="escol" value="<?php echo set_value('escol');?>" id="escol" class="form-control" placeholder="Descripción de escolaridad">
        <?php echo form_error('escol');?>
<br>

 <label for="religion">Religión: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="religion" value="<?php echo set_value('religion');?>" id="religion" class="form-control" placeholder="Religión que predica">
        <?php echo form_error('religion');?>
<br>

 <label for="ocupacion">Ocupación: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="ocupacion" value="<?php echo set_value('ocupacion');?>" id="ocupacion" class="form-control" placeholder="Ocupación">
        <?php echo form_error('ocupacion');?>
<br>

 <label for="p_enfer">Enfermedad: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="p_enfer" value="<?php echo set_value('p_enfer');?>" id="p_enfer" class="form-control" placeholder="Padece de alguna enfermedad">
        <?php echo form_error('p_enfer');?>
<br>

 <label for="antec_penal">Antecedentes penales: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="antec_penal" value="<?php echo set_value('antec_penal');?>" id="antec_penal" class="form-control" placeholder="Antecedentes">
        <?php echo form_error('antec_penal');?>
<br>

 <label for="adiccion">Adicciones: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="adiccion" value="<?php echo set_value('adiccion');?>" id="adiccion" class="form-control" placeholder="Descripción de la adicción">
        <?php echo form_error('adiccion');?>
<br>

        </div> 
        </div>



        <div class="panel panel-primary">
      <div class="panel-heading">Desarrollo de la entrevista</div>
    <div class="panel-body">
        <label for="hechos">Con relación a los hechos: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="hechos" value="<?php echo set_value('hechos');?>" id="hechos" class="form-control" placeholder="Descripción">
        <?php echo form_error('hechos');?>

<br>
  <label for="nuc_p">Núcleo primario del entrevist@: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nuc_p" value="<?php echo set_value('nuc_p');?>" id="nuc_p" class="form-control" placeholder="Descripción">
        <?php echo form_error('nuc_p');?>
<br>
  <label for="dinamica_p">Dinámica familiar del núcleo primario del entrevist@: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="dinamica_p" value="<?php echo set_value('dinamica_p');?>" id="dinamica_p" class="form-control" placeholder="Descripción">
        <?php echo form_error('dinamica_p');?>
        <br>
  <label for="nuc_s">Núcleo secundario del entrevist@: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nuc_s" value="<?php echo set_value('nuc_s');?>" id="nuc_s" class="form-control" placeholder="Descripción">
        <?php echo form_error('nuc_s');?>
        <br>
  <label for="dinamica_s">Dinámica familiar del núcleo secundario del entrevist@: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="dinamica_s" value="<?php echo set_value('dinamica_s');?>" id="dinamica_s" class="form-control" placeholder="Descripción">
        <?php echo form_error('dinamica_s');?>
        <br>
</div> 
</div>


<div class="panel panel-primary">
      <div class="panel-heading">Situación económica</div>
    <div class="panel-body">

        <label for="situacion_e">Situación: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="situacion_e" value="<?php echo set_value('situacion_e');?>" id="situacion_e" class="form-control" placeholder="Descripción">
        <?php echo form_error('situacion_e');?>

<br>
 <h4> Datos económicos:</h4>
    <h5> Manifiesta sus egresos de la siguiente manera</h5>
    <br>
  <label for="agua">Gatos en agua: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="agua" value="<?php echo set_value('agua');?>" id="agua" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('agua');?>
<br>
  <label for="luz">Gastos de luz: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="luz" value="<?php echo set_value('luz');?>" id="luz" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('luz');?>
        <br>
  <label for="alimentos">Gastos de alimentos: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="alimentos" value="<?php echo set_value('alimentos');?>" id="alimentos" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('alimentos');?>
        <br>
 <label for="transporte">Gastos de transporte: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="transporte" value="<?php echo set_value('transporte');?>" id="transporte" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('transporte');?>
        <br>
        <label for="tel">Gastos de teléfono: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="tel" value="<?php echo set_value('tel');?>" id="tel" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('tel');?>
        <br>
           <label for="g_medicos">Gastos de médicos: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="g_medicos" value="<?php echo set_value('g_medicos');?>" id="g_medicos" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('g_medicos');?>
        <br>
        <label for="tot_i">Total de ingresos: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="tot_i" value="<?php echo set_value('tot_i');?>" id="tot_i" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('tot_i');?>
        <br>
         <label for="tot_e">Total de egresos: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="tot_e" value="<?php echo set_value('tot_e');?>" id="tot_e" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('tot_e');?>
        <br>
         <label for="bienes_i">Bienes inmuebles: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="bienes_i" value="<?php echo set_value('bienes_i');?>" id="bienes_i" class="form-control" placeholder="Descripción">
        <?php echo form_error('bienes_i');?>
        <br>
         <label for="nivel_s">Nivel socioeconómico: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nivel_s" value="<?php echo set_value('nivel_s');?>" id="nivel_s" class="form-control" placeholder="Descripción">
        <?php echo form_error('nivel_s');?>
        <br>
         <label for="clase">Clase: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="clase" value="<?php echo set_value('clase');?>" id="clase" class="form-control" placeholder="Descripción">
        <?php echo form_error('clase');?>
        <br>
</div> 
</div>

<div class="panel panel-primary">
      <div class="panel-heading">Condiciones de la vivienda</div>
    <div class="panel-body">
     
    <label for="materiales">Materiales de construcción y distribución: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="materiales" value="<?php echo set_value('materiales');?>" id="materiales" class="form-control" placeholder="Descripción">
        <?php echo form_error('materiales');?>
<br>
    <label for="ubicacion">Ubicación: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="ubicacion" value="<?php echo set_value('ubicacion');?>" id="ubicacion" class="form-control" placeholder="Descripción">
        <?php echo form_error('ubicacion');?>
<br>

</div> 
</div>

<div class="panel panel-primary">
      <div class="panel-heading">Diagnostico Social</div>
    <div class="panel-body">
     
    <label for="diagnostico">Diagnostico: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="diagnostico" value="<?php echo set_value('diagnostico');?>" id="diagnostico" class="form-control" placeholder="Descripción">
        <?php echo form_error('diagnostico');?>
<br>

</div> 
</div>


  <button type="submit" class="btn btn-primary" name="formulario">Guardar</button>

  </div>
  </div>
</div>
