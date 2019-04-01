<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  </ol>
          <h1 class="page-header">Fichas técnicas creadas</h1>
           <table>
            <table class="table table-hover" > 
        <thead>
            <tr> 
                <th>Clave</th>
                <th>Nombre</th>
                <th>Fecha de elaboración</th>
                <th>Dependencia</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 
        foreach ($fichas_tecnicas as $f) {
        ?>
                <td><?php echo $f->clave; ?></td>
                <td><?php echo $f->nombre_ts; ?></td>
                <td><?php echo $f->fecha_elab; ?></td>
                <td><?php echo $f->nombre; ?></td>
                 <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/fichas_tecnicas/<?php echo $f->id_ficha;?>/<?php echo $f->fk_ts;?>" role="button"><span class="glyphicon glyphicon-eye-open"></span> Ver</a></td>
                
                
            </tr>
        </tbody>
    <?php }?>                                                       
        </table>
          </table>
          

    </div>
  </div>
</div>
