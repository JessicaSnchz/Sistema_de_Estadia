  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/vista_ninos">Registros de niños</a></li>
      <li class="active">Alta pension</li>
    </ol>

       <center> <h1 class="page-header">ALTA DE PENSIÓN</h1> </center>

         <div class="panel panel-primary">
      <div class="panel-heading">Información de la pensión</div>
    <div class="panel-body">

         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/edita_pension/'.$expediente['id_expediente'],$atributos);
        //var_dump($privilegio);
       ?>
          <label for="Nombres">Cuardeno <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="cuaderno" value="<?php echo set_value('cuaderno');?>" id="Cuaderno" class="form-control" placeholder="Cuaderno">
        <?php echo form_error('cuaderno');?>
    <br>
        <label for="requis">Nombre del familiar <span style="color: red" class="asterisco">*</span> </label>
        <select name="familiar" class="form-control">
         <?php foreach ($familiar as $f) {
          ?>
      <option value="<?=$f->id_familiar;?>" class="col-sm-2 control-label"><?=$f->nombre_f;?> <?=$f->apellido_pf;?> <?=$f->apellido_mf;?></option>
         <?php 
          }   
      ?>
    </select>
    <br>
    <label for="Nombres">Monto <span style="color: red" class="asterisco">*</span></label>
        <input  type="number" name="monto" value="<?php echo set_value('monto');?>" id="Monto" class="form-control" placeholder="Monto">
        <?php echo form_error('monto');?>
    <br>
    <label>Fecha del deposito <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fechad"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fechad');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
      <br>
       
      
      <input type="hidden" name="expediente" value="<?php echo $expediente['id_expediente']; ?>">
      <?php echo form_error('id_expediente');?>
      </div>
      </div>
      <button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
       </form>
  </div>
  </div>
</div>
