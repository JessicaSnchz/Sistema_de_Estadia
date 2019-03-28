    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <?php
            foreach ($menu as $m ){
              $ruta = base_url('index.php/proyecto/').$m->url;
            ?>

            <li <?php if(current_url()==$ruta) echo "class=\"active\""; ?>><a href="<?php echo $ruta;?>"><?php echo $m->nombre_seccion;?></a></li>
           <?php
          }
           ?>
          </ul>
        </div>
