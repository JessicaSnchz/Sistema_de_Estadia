<style>
    #modal_trabajadores .dataTables_scrollBody {
        height: auto;
        max-height: 162px !important;
    }
    
    #modal_nominas .dataTables_scrollBody {
        height: auto;
        max-height: 162px !important;
    }

    #tabla_personal tbody tr td {
        border: 1px solid lightgray !important;
        font-size: 10px !important
    }
</style>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  <li class="active">Ingresos</li>
  </ol>
          <center><h1 style="background-color: white" border="2" class="page-header">FILTRADO DE LOS INGRESOS DE LOS MENORES</h1></center>
<br>
<table border="0">
<tr>
<td>Desde&nbsp;</td>
<td><input type="date" name="desde" id="db_desde"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Hasta&nbsp;</td>
<td><input type="date" name="hasta" id="db_hasta"></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td><input type="submit" id="buscar_ingreso" name="buscar" value="Buscar"></td> 
</tr>
</table>
<br><br>

<table class="table table-bordered" id="ingresos_tabla" cellspacing="0" style="width:90%;">
   <thead>
                <tr bgcolor="#FEF5E7" align="center">
                <center>
                <th> <center>No. Expediente</th>
                <th> <center>No. Carpeta</th>
                <th> <center>Estado procesal</th>
                <th> <center>Centro asistencial</th>
                <th> <center>Nombre del niño</th>
                <th> <center>Fecha nacimiento</th>
                <th> <center>Edad</th>
                <th> <center>Género</th>
                <th> <center>Motivos de ingreso</th>
                <th> <center>Fecha ingreso</th>
                </center>
                </tr>
            </thead>
            <tbody>

            </tbody>
  </table>

        </div>
      </div>
    </div>