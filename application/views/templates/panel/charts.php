	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	
</head>
<body>
<h1>GRÁFICA DE NIÑOS Y SUS INCIDENCIAS</h1>

<input type="button" id="Buscar" value="Graficar"  >



<canvas id="myChart" width="500" height="150"></canvas>








<script>

	var parammes = [];
     var paramPor = [];

$("#Buscar").click(function(){

	//alert("Si entro");
	

$.post("<?php echo base_url();?>index.php/proyecto/get",

	function(data){
		//alert(data);

		var miObjeto= JSON.parse(data);
         //alert(miObjeto);
         var parammes = [];
          var paramPor = [];
 
		$.each(miObjeto, function(i,item){

				parammes.push(item.nombre_incidencia);
				paramPor.push(item.id_expediente);

		});

		//alert(paramPor);

/////////////////////////////////////////////////////////////////////
//var paramMeses=['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
 //var paramValores=[12, 19, 3, 5, 2, 3, 4, 1, 2, 3, 1, 20];
var ctx = $('#myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:parammes,//valores horizontales
        datasets: [{
           label: "Total de niños por incidencia",
	        fill: true,
		    lineTension: 1000,
		    backgroundColor: "rgba(75,80,80,0.4)",
		    borderColor: "rgba(75,192,192,1)",
             borderDash: [],
		     borderDashOffset: 0.0,
		     borderJoinStyle: 'miter',
		     pointBorderColor: "rgba(75,192,192,1)",
		     pointBackgroundColor: "#fff",
 		     pointBorderWidth: 5,
 		     pointHoverRadius: 2,
 		     pointHoverBackgroundColor: "rgba(75,192,192,1)",
 		     pointHoverBorderColor: "rgba(220,220,220,1)",
 			 pointHoverBorderWidth: 3,
 		     pointRadius: 1,
		     pointHitRadius: 10,
		     data:paramPor,// valores verticales
		      spanGaps: false,
           
        }]


    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
/////////////////////////////////////////////////////////////////////

	});
});

/*
 */
</script>



</body>
</html>