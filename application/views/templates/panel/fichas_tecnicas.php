<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>index.php/proyecto/fichas_tecnicas">Fichas</a></li>
  </ol>
          <h1 class="page-header">Fichas técnicas</h1>
          <table>
          	<table class="table table-hover" >

              
        <thead>
            <tr> 
                <th>Clave</th>
                <th>Nombre</th>
                <th>Fecha de elaboración</th>
                <th>Dependencia</th>
                <th>Válida</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 
        foreach ($fichas_tecnicas as $f) {
        ?><?php 
                if($f->validacion=="SI"){
                  $texto = "Si";
                  $etiqueta = "success";
                }else{
                  $texto = "No";
                  $etiqueta = "warning";
                }
              ?>
                <td class="<?php echo $etiqueta;?>"><?php echo $f->clave; ?></td>
                <td class="<?php echo $etiqueta;?>"><?php echo $f->nombre_ts; ?></td>
                <td class="<?php echo $etiqueta;?>"><?php echo $f->fecha_elab; ?></td>
                <td class="<?php echo $etiqueta;?>"><?php echo $f->nombre; ?></td>
                <td  class="<?php echo $etiqueta;?>"><?php echo $texto; ?>
    </td>
                 <td class="<?php echo $etiqueta;?>"><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/revision_ficha/<?php echo $f->fk_ts;?>" role="button"><span class="glyphicon glyphicon-ok"></span> Revisar</a></td>
                
                
            </tr>
        </tbody>
    <?php }?>                                                       
        </table>
          </table>


    </div>
  </div>
</div>
