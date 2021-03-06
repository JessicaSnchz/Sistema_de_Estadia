jQuery(document).ready(function ($) {

    /*----------------------FUNCIONES GENERALES--------------------*/

    function alinearCeldasTrabajadores() {
        var celdas_right = ["2", "4"];
        var i;
        var celdas_left = ["1"];
        var j;
        for (i = 0; i < celdas_right.length; i++) {
            $("#tabla_trabajadores tbody tr td:nth-child(" + celdas_right[i] + ")").css('text-align', 'right');
        }
        for (j = 0; j < celdas_left.length; j++) {
            $("#tabla_trabajadores tbody tr td:nth-child(" + celdas_left[j] + ")").css('text-align', 'left');
        }

    }

    function limpiarTabla(table) {
        var table = $(table).DataTable();
        table.clear().draw();
    }

    function dataTable(table) {
        //alinearCeldasTrabajadores();

        table = $(table).DataTable({
            "scrollY": 300,
            "scrollX": false,
            "scrollCollapse": true,
            "paging": false,
            "searching": false,
            "retrieve": true,
            "fixedColumns": true,
            "language": {
                "decimal": "",
                "emptyTable": "No ahi información para mostrar",
                "info": "",
                "infoEmpty": "",
                "infoFiltered": "",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
            },
        });

    }

    function limpiaregresos() {
        $("input[name='desde']").val('');
        $("input[name='hasta']").val('');
        
    }

    function limpiar() {
        limpiaregresos();
        limpiarTabla("#egresos_tabla");
    }
    
    function creaTablaegresos(data_json){
        limpiarTabla("#egresos_tabla");
        var data = JSON.stringify(data_json);
        data = '{"renglones":'+ data + '}';
        var json = JSON.parse(data);

        var table = $('#egresos_tabla').DataTable();
        var nombre = "";

        var fechaActual = new Date()

        var mes = fechaActual.getMonth();
        var dia = fechaActual.getDate();
        var año = fechaActual.getFullYear();

        fechaActual.setDate(dia);
        fechaActual.setMonth(mes);
        fechaActual.setFullYear(año);

    
        for(var i = 0; i< json.renglones.length; i++)
        {
            var fechaNace = new Date(json.renglones[i].fecha_nnino);
    nombre = json.renglones[i].nombres_nino+" "+json.renglones[i].apellido_pnino+" "+json.renglones[i].apellido_mnino;
    edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
    if(isNaN(edad) == true){edad = 0;}
               table.row.add( [
                  json.renglones[i].no_expediente,
                  json.renglones[i].no_carpeta,
                  json.renglones[i].nombre_estado,
                  json.renglones[i].nombre_centro,
                  nombre,
                  json.renglones[i].fecha_nnino,
                  edad,
                  json.renglones[i].genero_nino,
                  json.renglones[i].fecha_ingreso,
                  json.renglones[i].motivos_ingreso
                  json.renglones[i].fecha_egreso,
                  json.renglones[i].motivos_egreso,
                  json.renglones[i].autoriza,
                  json.renglones[i].responsable  
              ] ).draw( false );
        }
                
        
     }
    
    function llamartabla(){
        var fecha_inicio = $("input[name='desde']").val();
        var fecha_final = $("input[name='hasta']").val();

        $.ajax({
            url: base_url + "Proyecto/egresos_filtrados",
            type: "POST",
            dataType: "json",
            data: {fecha_inicial:fecha_inicio, fecha_final:fecha_final},
            success: function (json) {
                if (json.status == "200") {
                    creaTablaegresos(json.datos);
                } else if (json.status == "500") {
                    limpiarTabla("#egresos_tabla");
                } else if (json.status == "300") {
                     limpiarTabla("#egresos_tabla");
                }
            },
            error: function (xhre) {
                console.log(xhre);
            }
        });
    }

    

    /*----------------------CIERRE DE CREAR TABLAS--------------------*/
    dataTable("#egresos_tabla");    
    
    $(document).on("click", '#buscar_egreso', function (event) {
        event.preventDefault();
        limpiarTabla("#egresos_tabla");
        llamartabla();
    });
    
    llamartabla();
    
       

});