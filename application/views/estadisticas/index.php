<link
    rel="stylesheet"
    href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Estadísticas
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        Home</a>
                </li>
                <li class="active">Estadísticas</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!---->
            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Ventas</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                    <?php foreach ($totalOrdenes as $registro) {
                                   ?>
                                    <tr>
  
                                        <td>1.</td>
                                        <td><?php echo $registro->fecha;?></td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 30%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-red">$<?php echo $registro->total;?></span>
                                        </td>
                                    </tr>
                                    <?php
                                }?>
                               
                                    <!--tr>
                                        <td>2.</td>
                                        <td>Viernes 05 de Abril 2019</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 40%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-yellow">$40</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Sábado 06 de Abril 2019</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar progress-bar-primary" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light-blue">$70</span>
                                        </td>
                                    </tr-->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="aaa">Opciones</h3>
                        </div>
                        <div class="box-body" style="max-width:500px;">
                        <canvas id="barChart2"   style="height:100%; width:100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Productos</h3>
                        </div>
                        <div class="box-body">
                        <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                    <?php foreach ($productosVendidos as $producto) {
                                        # code...
                                    ?>
                                    <tr>
                                        <td>1.</td>
                                        <td><?php echo $producto->nombre;?></td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 25%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-red"><?php echo $producto->total;?></span>
                                        </td>
                                    </tr>
                                <?php }?>
                                    <!--tr>
                                        <td>2.</td>
                                        <td>Churritos</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 12%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-yellow">12</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Snickers pequeños</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar progress-bar-primary" style="width: 10%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light-blue">10</span>
                                        </td>
                                    </tr-->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
               
                <script>
                    var fechas =[];
                    var totales =[];
                    var productos =[];
                    var totalProductos =[];
                    var json = JSON.parse('<?php echo json_encode($totalOrdenes); ?>');
                    json.forEach(registro => {
                        fechas.push(registro.fecha);
                        totales.push(registro.total);
                    });
                    var productosJson = JSON.parse('<?php echo json_encode($productosVendidos); ?>');
                    productosJson.forEach(registro => {
                        productos.push(registro.nombre);
                        totalProductos.push(registro.total);
                    });
                </script>
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="aaa">Opciones</h3>
                        </div>
                        <div class="box-body" style="max-width:500px; ">
                        <canvas id="barChart"  style="height:100%;width:100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </section>
</div>

<style>

</style>
<script src="<?= base_url();?>assets/bower_components/chart.js/Chart.js"></script>
    
    <script>
    var codigoOrden =false;
    let opciones= {
        language:
{
	"sProcessing":     "Procesando...",
	"sLengthMenu":     "Mostrar _MENU_ registros",
	"sZeroRecords":    "No se encontraron resultados",
	"sEmptyTable":     "Ningún dato disponible en esta tabla",
	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix":    "",
	"sSearch":         "Buscar:",
	"sUrl":            "",
	"sInfoThousands":  ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
	},
	"oAria": {
		"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	}
}, 
       
        select: {
            style: 'single'
        },

    };
   $(document).ready(function () {
    
    var table = $('#tablaOrdenes').DataTable();
    $('#tablaOrdenes tbody ').on('click', 'tr', function () {
        if (!$(this).hasClass('selected')) {
            console.log(table.row(this).data());
            codigoOrden =table.row(this).data()[0];
            console.log(codigoOrden);
        }else{
            codigoOrden = false;
            console.log("se deseleccionó");
        }

        if(codigoOrden!=false){
            $(".opcionMenu").removeClass('disabled');
        }else{
            $(".opcionMenu").addClass('disabled');
        }

    });

    var areaChartData = {
      labels  : productos,
      datasets: [
        {
          label               : 'Ventas por productos',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : totalProductos
        }
      ]
    };

    var fechasTotales = {
      labels  : fechas,
      datasets: [
        {
          label               : 'Ventas por productos',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : totales
        }
      ]
    };

//-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[0].fillColor   = '#00a65a'
    barChartData.datasets[0].strokeColor = '#00a65a'
    barChartData.datasets[0].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)

    //-------------
    //- BAR CHART2 -
    //-------------
    var barChartCanvas2                   = $('#barChart2').get(0).getContext('2d')
    var barChart2                         = new Chart(barChartCanvas2)
    var barChartData2                     = fechasTotales
    barChartData2.datasets[0].fillColor   = '#00a65a'
    barChartData2.datasets[0].strokeColor = '#00a65a'
    barChartData2.datasets[0].pointColor  = '#00a65a'
    var barChartOptions2                 = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions2.datasetFill = false
    barChart2.Bar(barChartData2, barChartOptions2)
  

  });
  


    </script>
    
    


