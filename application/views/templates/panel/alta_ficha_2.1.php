<div class="col-sm-2 col-sm-offset-9 col-md-10 col-md-offset-2 main">

	<script type="text/javascript"><!--
			function limpiar() {
			setTimeout('document.formulario.reset()',2000);
			return false;
			}
	</script>

	<script type="text/javascript">
		function desactivar(){
 		 document.getElement.ById("nuevo_paso").disabled = false;
		}
	</script>

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

    <form  name="formulario" onsubmit="return limpiar()" class="form-control" method="POST" action="<?php echo base_url()?>index.php/proyecto/alta_fichat_2_1/<?php echo $ts['id_ts']; ?>">
  			
  			<label for="paso">N° paso<span class="asterisco">*</span> </label>
  			<input type="num" class="form-control" name="orden">
			</br>
			<label for="paso">Paso<span class="asterisco">*</span> </label>
			<select type="text" name="id_paso" class="form-control">
                <?php 
                    foreach ($pasos as $pa){ 
                ?>
                    <option value="<?=$pa->id_paso;?>"><?=$pa->descripcion_paso;?>
                        <?php 
                            } 
                        ?>
                    </option>
            </select>
		</br>
		<input class="btn btn-primary" name="new_paso" onClick="desactivar()" value="desactivar">
		</br>
		<label for="nuevo_paso">Nuevo paso<span class="asterisco"></span> </label><input type="text"  disabled="disabled" class="form-control" name="nuevo_paso" value="<?php echo set_value('nuevo_paso');?>" id="nuevo_paso" placeholder="Describa el nuevo paso">
			<?php echo form_error('nuevo_paso');?>
		</br>
		  <input type="hidden" name="id_ts" value="<?php echo $ts['id_ts']; ?>">
            <?php echo form_error('id_ts');?>
		</br>
		 <input type="submit" class="btn btn-primary" name="formulario" value="Agregar">
		</form></br>                      
                 
    </div><!--panel body-->
</div><!--panel primary-->

<div class="panel panel-primary">
      <div class="panel-heading">Pasos</div>
    <div class="panel-body">

    	<table class="table form-control" >
    
        <thead>
            <tr> 
                <th>N°</th>
                <th>Paso</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 
        foreach ($pasitos as $p) {
        ?>
                <td><?php echo $p->orden; ?></td>
                <td><?php echo $p->descripcion_paso; ?></td>
                <td><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php/proyecto/edita_paso/<?php echo $p->id_paso;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
                
                
            </tr>
        </tbody>
    <?php }?>                                                       
        </table>
   	</div><!--panel body-->
</div><!--panel primary-->


</div>
</div>

