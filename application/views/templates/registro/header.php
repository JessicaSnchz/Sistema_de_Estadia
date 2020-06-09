<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Ingreso al Sistema</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/estilo.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/datepicker.css');?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url('assets/css/ie10-viewport-bug-workaround.css');?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/jumbotron.css');?>" rel="stylesheet">

   <!-- Custom -->
  <link href="<?php echo base_url('assets/css/estilo.css');?>" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url('assets/js/ie-emulation-modes-warning.js');?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CONTROL DE EXPEDIENTES</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <!--<li class=""><a href="<?php echo base_url('index.php');?>">Ingresar</a></li>-->
            <li><a href="<?php echo base_url('index.php/proyecto');?>/formulario_usuario">Crear una cuenta</a></li>
          </ul>
          <form class="navbar-form navbar-right" method="POST" action="<?php echo base_url('index.php/proyecto/ingresar');?>">
            <div class="form-group">
              <input type="text" placeholder="Correo Electrónico" name="usuario" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Contraseña" name="contrasena" class="form-control">
            </div>
            <button type="submit" class="btn btn-success" name="formulario">Ingresar</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
