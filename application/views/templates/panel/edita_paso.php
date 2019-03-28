<div class="col-sm-2 col-sm-offset-9 col-md-10 col-md-offset-2 main">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_1">Paso 1: Sobre el Trámite/Servicio</a></li>
          <li class="active">Paso 2: Sobre los pasos</li>
        </ol>


        <h1 class="page-header">Nueva ficha técnica</h1>
        <div class="col-md-16">

 <div class="panel panel-primary">
      <div class="panel-heading">Sobre los pasos del Trámite/Servicio</div>
    <div class="panel-body">

    <form  name="formulario" class="form-control" method="POST" action="<?php echo base_url()?>index.php/proyecto/alta_fichat_2_1/<?php echo $pasos['id_paso']; ?>">

      <label for="paso">Paso<span class="asterisco">*</span> </label>
      <td><select type="text" name="pasos" class="form-control">
                <?php 
                    foreach ($pasos as $pa){ 
                ?>
                    <option value="<?=$pa->id_paso;?>"><?=$pa->descripcion_paso;?>
                        <?php 
                            } 
                        ?>
                    </option>
            </select></td>
    </br>
    <input class="btn btn-primary" name="new_paso" value="Nuevo">
    </br>
    <label for="nuevo_paso">Nuevo paso<span class="asterisco"></span> </label><input type="text" class="form-control" name="nuevo_paso" value="<?php echo set_value('nuevo_paso');?>" id="nuevo_paso" placeholder="Describa el nuevo paso">
      <?php echo form_error('nuevo_paso');?>
    </br>
      <input type="hidden" name="id_ts" value="<?php echo $ts['id_ts']; ?>">
            <?php echo form_error('id_ts');?>
    </br>
     <input type="submit" class="btn btn-primary" name="formulario" value="Agregar">
    </form></br>                      
                 
    </div><!--panel body-->
</div><!--panel primary-->