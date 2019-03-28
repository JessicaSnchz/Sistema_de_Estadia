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

    <?php
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/alta_fichat_2/'.$ts['id_ts'],$atributos);
     ?>
<div>
<table class="table form-inline" >
    
        <thead>
            <tr>
                    <th></th>  
                    <th>N°</th>
                    <th>Paso</th>
                    <th>Nuevo paso</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 
        foreach ($orden as $o) {
        ?>
                <td><input type="checkbox" class="form-control.checkbox " id="orden" name="orden[]" value="<?=$o->id_orden;?>" ></td>
                <td><?=$o->numero_orden;?></td>
                <td><select type="text" name="pasos[]" class="form-control">
                <?php 
                    foreach ($pasos as $pa){ 
                ?>
                    <option value="<?=$pa->id_paso;?>"><?=$pa->descripcion_paso;?>
                        <?php 
                            } 
                        ?>
                    </option>
            </select></td>
                <td><textarea type="text" class="form-control " id="nuevo_paso" name="nuevo_paso[]" placeholder="Ingresa el nuevo paso" value=""></textarea></td>
                
            </tr>
        </tbody>
    <?php }?>                                                       
        </table>
         
        <input type="hidden" name="id_ts" value="<?php echo $ts['id_ts']; ?>">
            <?php echo form_error('id_ts');?>
</div>    
</br> <input type="submit" class="btn btn-primary" name="formulario" value="Enviar">
        </form>                 
                 
    </div><!--panel body-->
</div><!--panel primary-->
</div>
</div>

