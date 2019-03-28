<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/catalogos">Catálogo</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/areas">Áreas</a></li>
      <li class="active">Edición de Área</li>
    </ol>

        <h1 class="page-header">Edición de Área</h1>
         <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/revisa_ficha/'.$ficha_tec['id_ficha'],$atributos);
        //var_dump ($areas);
       ?>
       <form  name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/revisa_ficha/<?php echo $ficha_tec['id_ficha']; ?>">
          
      </br>
        <input type="hidden" name="id_ficha" value="<?php echo $ficha_tec['id_ficha']; ?>">
      <?php echo form_error('id_area');?>

      <button type="submit" class="btn btn-primary" name="formulario">Guardar cambios</button>
       </form>

</div>
 