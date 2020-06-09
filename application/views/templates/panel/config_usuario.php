<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><center>CONFIGURACIÓN DE LA CUENTA</h1>
      
     <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
     <div class="panel panel-primary">
        <div class="panel-heading">Cambiar contraseña del trabajador</div>
  <div class="panel-body">

     <?php 
   $atributos=array('class'=>'fom_horizontal');
   echo form_open('proyecto/config_usuario/'.$usuario['id_usuario'],$atributos);
   ?> 


       
        <label for="usuariou" >Correo:</label>
        <input   name="usuariou" value="<?php echo $usuario['usuario'];?>" id="usuriou" class="form-control" placeholder="Correo" readonly="readonly">

        <input  type="hidden" name="id_persona" value="<?php echo $usuario['id_persona'];?>">
         <?php echo form_error('usuariou');?>

        
         <br>

        <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'];?>">
        <label for="contrasenau" >Contraseña:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="contrasenau" value="<?php echo $usuario['contrasena'];?>" id="contrasenau" class="form-control" placeholder="Contraseña">
         <?php echo form_error('contrasenau');?>
   
   

         
  </div>
</div>
 



 
    </div>
  </div>
        
    
 <button class="btn btn-warning" name="formulario" type="submit">Actualizar</button>
</form>
</div>
</div>

             </div>
     
     </div>
     <a class="btn btn" style="background:" href="<?php echo base_url('index.php/proyecto/panel');?>" role="button"></a>
     </div>
     </div>