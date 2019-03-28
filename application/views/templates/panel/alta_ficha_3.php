<div class="col-sm-2 col-sm-offset-9 col-md-10 col-md-offset-2 main">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_1">Paso 1: Sobre el Trámite/Servicio</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_2">Paso 2: Sobre los pasos del Trámite/Servicio</a></li>
          <li class="active">Paso 3: Sobre los requisitos</li>
        </ol>


        <h1 class="page-header">Nueva ficha técnica</h1>
        <div class="col-md-12">

 <div class="panel panel-primary">
      <div class="panel-heading">Sobre los pasos del Trámite/Servicio</div>
    <div class="panel-body">

    <?php
        $atributos = array('class'=>'form-horizontal');
        echo form_open_multipart ('proyecto/alta_fichat_3/'.$ts['id_ts'],$atributos);
     ?>
 <div >
     <table class="table table-hover" >
    
        <thead>
            <tr>
                    <th></th>  
                    <th>N°</th>
                    <th>Requisito</th>
                    <th>¿Es un trámite?</th>
                    <th>Nuevo requisito</th>
                    <th>Archivo</th>
                    <th>Original</th>
                    <th>Copia</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 
        foreach ($orden as $o) {
        ?>
                <td><input type="checkbox" class="form-control.checkbox " id="orden" name="orden[]" value="<?=$o->id_orden;?>" ></td>
                <td><?=$o->numero_orden;?></td>
                <td><select type="text" name="requis[]" class="form-control">
                <?php 
                    foreach ($requisitos as $r){ 
                ?>
                    <option value="<?=$r->id_requisito;?>"><?=$r->descripcion_req;?>
                        <?php 
                            } 
                        ?>
                    </option>
                </select></td>
                <td><select type="text" name="tramites[]" class="form-control">
                <?php 
                    foreach ($tramites as $tr){ 
                ?>
                    <option value="<?=$tr->id_ts;?>"><?=$tr->nombre_ts;?>
                        <?php 
                            } 
                        ?>
                    </option>
                </select></td>
                <td><textarea type="text" class="form-control " id="nuevo_requisito" name="nuevo_requisito[]" placeholder="Ingresa el nuevo requisito" value=""></textarea></td>
                <td>
                  <input enctype="multipart/form-data" type="file" class="form-control" id="file" name="archivos[]">
                </td>
                <td>
                  <input type="number" class="form-control" name="original[]">
                </td>
                <td>
                  <input type="number" class="form-control" name="copias[]">
                </td>
                
            </tr>
        </tbody>
    <?php }?>                                                       
        </table>
         </div>


         <input type="hidden" name="id_ts" value="<?php echo $ts['id_ts']; ?>">
            <?php echo form_error('id_ts');?>
   
    <button type="submit" class="btn btn-primary" name="formulario">Guardar</button>
        </form></br>
                     
                 
    </div><!--panel body-->
</div><!--panel primary-->
</div>
</div>


