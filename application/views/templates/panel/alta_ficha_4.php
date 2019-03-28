<div class="col-sm-2 col-sm-offset-9 col-md-10 col-md-offset-2 main">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_1">Paso 1: Sobre el Trámite/Servicio</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_2">Paso 2: Sobre los pasos</a></li>
          <li><a href="<?php echo base_url();?>index.php/proyecto/alta_fichat_2">Paso 3: Sobre los requisitos</a></li>
          <li class="active">Sobre los fundamentos jurídicos</li>
		</ol>


        <h1 class="page-header">Nueva ficha técnica</h1>
        <div class="col-md-12">
 <div class="panel panel-primary">
      <div class="panel-heading">Paso 4: Sobre los fundamentos jurídicos</div>
    <div class="panel-body">

 <form  name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/alta_fichat_4/<?php echo $ts['id_ts']; ?>">
      
      <label for="disposicion">Disposición<span class="asterisco">*</span> </label>
      <select type="text" name="fk_ley" class="form-control">
                <?php 
                    foreach ($disposicion as $d){ 
                ?>
                    <option value="<?=$d->id_ley;?>"><?=$d->titulo;?>
                        <?php 
                            } 
                        ?>
                    </option>
                </select>
      </br>
      <label for="fundamento">Descripción del fundamento<span class="asterisco"></span> </label>
      <input type="text" class="form-control" name="enunciado" placeholder="Ingrese los artículos con sus respectivas fracciones, ejemplo: art.1,X,IX ; art.2,IV,etc.">
      </br>
     
      <input type="hidden" name="id_ts" value="<?php echo $ts['id_ts']; ?>">
            <?php echo form_error('id_ts');?>
    </br>
    
<button type="submit" name="" value="enviar" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Agregar</button>
</br>
    </form>
  </div>
</div>                      
                 
   <div class="panel panel-primary">
    <div class="panel-body">

      <table class="table table-hover" >

    
        <thead>
            <tr> 
                <th>Fundamentos jurídicos</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 
        foreach ($fundamentos as $f) {
        ?>
                <td><?php echo $f->titulo.", ".$f->enunciado; ?></td>
                 <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/elimina_fundamento_j/<?php echo $f->fk_ts;?>/<?php echo $f->id_tramite_fundamento;?>" role="button"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
                
                
            </tr>
        </tbody>
    <?php }?>                                                       
        </table>
    </br>
    <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/alta_fichat_5/<?php echo $ts['id_ts'];?>" role="button"><span class="glyphicon glyphicon-arrow-right"></span> Paso 5</a>
    </div><!--panel body-->
</div><!--panel primary-->
</div>
</div>
