<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <center><h1 style="background-color: white" border="2" class="page-header"> Privilegios y secciones </h1></center>


<br>

<br>
          <style>

        .round {
 background-color: #fff;
 width: auto;
 height: auto;
 margin: 0 auto 15px auto;
 padding: 5px;
 border: 1px solid #ccc;


 -moz-border-radius: 11px;
 -webkit-border-radius: 11px;
 border-radius: 11px;
 behavior: url(border-radius.htc);
    }
</style>

<html>

<head>
<TITLE>objetos redondeados</TITLE>

    <style>

        .round {
          background-color: #fff;
 width: auto;
 height: auto;
 margin: 0 auto 18px auto;
 padding: 7px;
 border: 2px solid #ccc;

 -moz-border-radius: 15px;
 -webkit-border-radius: 15px;
 border-radius: 15px;


 behavior: url(border-radius.htc);

    }


    .ph-center {
  height: 100px;
}
.ph-center::-webkit-input-placeholder {
  text-align: center;
}

    </style>

</head>

<body>

 <div id="formulario" >

    <table style="background-color:#F5F6CE;">

       

<br>  


    </table>

 </div>

</body>

</html>



<br>  
<br>

          <table class="table table-bordered">
            
            <thead>
              <tr bgcolor="#F9E79F" align="center">
                  <center>
			<th>Privilegio</th>
			<th>Secciones</th>
			<th>Edición</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($privilegios as $p) {
	?>
		<tr>
			<td><?php echo $p->nombre_privilegio;?></td>
			<td><?php echo $p->total;?></td>
			<td><a style="background-color:#008770 ;" href="<?php echo base_url();?>index.php/proyecto/ingresar_secciones/<?php echo $p->id_privilegio;?>" role="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Agregar / <span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
		</tr>
		<?php
	}
		?>
	</tbody>
</table>
          </div>
             </div>
        </div>
  </div>

  