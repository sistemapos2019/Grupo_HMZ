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
            <div class="col-md-12">
            <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Filtros</h3>
                        </div>
                        <div class="box-body">
                        <input type="text" id="fechaInicio">
                        <input type="text" id="fechaFin">
                        <button onclick="javascript:obtenerVentasEntreFechas()">Consultar</button>
                        </div>
                        </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Ventas Mes Actual</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered">
                            <thead>
                            <th>Fecha</th>
                            <th>Total Venta</th>
                            <th>Total Propina</th>
                            </thead>
                                <tbody id="ventasMesActual">
                                    
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Ventas Diarias</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered">
                            <thead>
                            <th>Fecha</th>
                            <th>Total Venta</th>
                            <th>Total Propina</th>
                            </thead>
                                <tbody id="ventasDiarias">
                                    
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Ventas Entre Fechas Seleccionadas</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered">
                            <thead>
                            <th>Fecha</th>
                            <th>Total Venta</th>
                            <th>Total Propina</th>
                            </thead>
                                <tbody id="ventasFechas">
                                    
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                    </div>
                </div>
               
               <script>
                $(function () {
                        $("#fechaInicio").datepicker(
                            {autoclose: true, format: 'yyyy-mm-dd'}
                        );
                    });
               </script>

               <script>
                    $(function () {
                        $("#fechaFin").datepicker(
                            {autoclose: true, format: 'yyyy-mm-dd'}
                        );
                    });
               </script>

                <script>
                function obtenerRegistros(){
                    let fechaInicioSeleccionado = $("#fechaInicio").val();
                   // console.log(fechaInicioSeleccionado);
                    let fechaFinSeleccionado = $("#fechaFin").val();
                   //  console.log(fechaFinSeleccionado);
                    

                }
                
                </script>

                <script>
                    var fechas =[];
                    var totales =[];
                    var productos =[];
                    var totalProductos =[]; 
                    
                </script>
                
 

<style>

</style>
<script src="<?= base_url();?>assets/bower_components/chart.js/Chart.js"></script>
    
    <script> 
    function obtenerVentasMesActual() {
        fetch("<?php echo base_url()?>Estadisticas/obtenerVentasMesActual").then(r=>r.json()).then(r=>{
            let tabla = document.querySelector("#ventasMesActual");
            let contenido = "";
            r.forEach(registro => {
                contenido+= `<tr>
             
            	<td>${registro.fecha}</td>
            	<td>
            	$${registro.totalVentas}
            	</td>
            	<td>
                $${registro.totalPropina}
            	</td>
            </tr>`;
            });
            tabla.innerHTML=contenido;
        });
    }

    function obtenerVentasDiarias() {
        fetch("<?php echo base_url()?>Estadisticas/obtenerVentasDiarias").then(r=>r.json()).then(r=>{
            let tabla = document.querySelector("#ventasDiarias");
            let contenido = "";
            r.forEach(registro => {
                contenido+= `<tr>
             
            	<td>${registro.fecha}</td>
            	<td>
            	$${registro.totalVentas}
            	</td>
            	<td>
                $${registro.totalPropina}
            	</td>
            </tr>`;
            });
            tabla.innerHTML=contenido;
        });
    }
    function obtenerVentasEntreFechas() {
        let formData = new FormData();
formData.append('fechaI', $("#fechaInicio").val());
formData.append('fechaF', $("#fechaFin").val());
        fetch(
        "<?php echo base_url()?>Estadisticas/obtenerVentasEntreFechas",
       { method: "POST",
        body: formData}
        ).then(r=>r.json()).then(r=>{
            let tabla = document.querySelector("#ventasFechas");
            let contenido = "";
            r.forEach(registro => {
                contenido+= `<tr>
             
            	<td>${registro.fecha}</td>
            	<td>
            	$${registro.totalVentas}
            	</td>
            	<td>
                $${registro.totalPropina}
            	</td>
            </tr>`;
            });
            tabla.innerHTML=contenido;
        });
    }

   $(document).ready(function () {
    obtenerVentasMesActual();
    obtenerVentasDiarias();
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
    
    


