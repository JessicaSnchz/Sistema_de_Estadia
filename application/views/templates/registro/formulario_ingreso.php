    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Ingreso al sistema</h1>
        <p>Esta es la sección pública. El formulario permite ingresar al panel de administración. Utilice al usuario: <i><b>usuario@correo.com</i></b> y la contraseña <i><b>123456</b></i> para ingresar como administrador general</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <h2>Ingresar</h2>
           <?php
           $atributos = array('class' => 'form-horizontal');
           echo form_open('proyecto',$atributos)
            ?>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Correo electrónico</label>
                <div class="col-sm-6">
                  <input type="email" class="form-control" id="inputEmail3" name="usuario" placeholder="Email">
                  <?php echo form_error('usuario'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" id="inputPassword3" name="contrasena" placeholder="Password">
                 <?php echo form_error('contrasena'); ?>
                 <?php
                 if($error){
                 ?>
                  <div class="alert alert-danger alert-dismissible fade in" role=alert>
                    <button type=button class=close data-dismiss=alert aria-label=Close>
                      <span aria-hidden=true>&times;</span>
                        </button> <strong>Error:</strong> El usuario o contraseña no están registrados.
                  </div>
                 <?php
                  }
                 ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <a href="#">Olvidé mi usuario o contraseña</a>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success" name="formulario">Ingresar</button>
                </div>
              </div>
            </form>
        </div>
        <div class="col-md-6">
          <h2>Crear una nueva cuenta</h2>
          <p>Contar con una cuenta le permitirá
            <ul>
              <li>Registrarse como participante a Proyecto 2016</li>
              <li>Generar su recibo de pago</li>
              <li>Descarga de los formatos oficiales para el envío de trabajos</li>
              <li>Envío de trabajos</li>
              <li>Establecer contacto con los revisores de trabajos</li>
            </ul>
          </p>
          <p><a class="btn btn-default" href="<?php echo base_url('index.php/proyecto');?>/formulario_usuario" role="button">Crear cuenta &raquo;</a></p>
       </div>
      </div>
      <hr>
