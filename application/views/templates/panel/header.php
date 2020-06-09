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

    <title>DIF</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href=".<?php echo base_url();?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url();?>assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>static/js/librerias/jquery.js"></script>
    <script src="<?php echo base_url()?>static/js/librerias/jquery-ui.js"></script>
  <script src="<?php echo base_url()?>static/js/librerias/popper.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url();?>static/js/modulos/ingresos.js"></script>

  <!--<script type="text/javascript" src="<?php echo base_url();?>static/js/modulos/egresos.js"></script>-->
    <!-- TABLAS UI-->
    <link rel="stylesheet" href="<?php echo base_url()?>static/plugins/tables/jquery.dataTables.css">
    <script src="<?php echo base_url()?>static/plugins/tables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>static/plugins/tables/jquery.dataTables.min.js"></script>
  

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <img width="50" height="30" src="<?php echo base_url();?>assets/img/dif.png"></img>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>index.php/proyecto/panel">Control de Expedientes de Menores</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $sesion['nombre']." - ".$sesion['nombre_privilegio'];?></a></li>
            <li><a href="<?php echo base_url();?>index.php/proyecto/config_usuario">Configuración</a></li>
            <li><a href="<?php echo base_url();?>index.php/proyecto/salir">Salir</a></li>
          </ul>
        </div>
      </div>
    </nav>