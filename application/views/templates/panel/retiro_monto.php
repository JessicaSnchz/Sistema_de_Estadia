  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/vista_pensiones">Pensiones</a></li>
      <li class="active">Retiro</li>
    </ol>

       <center> <h1 class="page-header">RETIRO DE PENSIÓN</h1> </center>

         <div class="panel panel-primary">
      <div class="panel-heading">Información de la pensión</div>
    <div class="panel-body">

         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/retiro_monto/'.$pension['id_pension'],$atributos);
        //var_dump($privilegio);
       ?>
    <label for="Nombres">Monto a retirar <span style="color: red" class="asterisco">*</span></label>
        <input  type="number" name="monto" value="<?php echo set_value('monto');?>" id="Monto" class="form-control" placeholder="Monto">
        <?php echo form_error('monto');?>
      </div>
      </div>
      <button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
       </form>
  </div>
  </div>
</div>
