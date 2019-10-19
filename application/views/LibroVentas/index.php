<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <!-- Bootstrap 3.3.7 -->
        <!-- jQuery 3 -->
        <script
            src="<?= base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <link
            rel="stylesheet"
                href="<?= base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

            <!-- jQuery UI 1.11.4 -->
            <script
                src="<?= base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
            <script
                src="<?= base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- datepicker -->
            <script
                src="<?= base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            <script
                src="<?= base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
            <link
                rel="stylesheet"
                href="<?= base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
            <link
                rel="stylesheet"
                href="<?= base_url();?>assets/bower_components/datatables.net-bs/css/select.dataTables.min.css">

            <link
                rel="stylesheet"
                href="<?= base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
            <!-- Daterange picker -->
            <link
                rel="stylesheet"
            href="<?= base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    </head>
    <body>
        <div class="container" style="margin-top:5%;">
            <div class="row" style="margin-bottom:1%;">
                <div class="col-md-2"></div>
                <div class="col-md-3"><input
                    type="text"
                    class="form-control"
                    placeholder="Seleccione su fecha"
                    onkeypress="return false"
                    id="fecha"></div>
                <div class="col-md-2">
                    <button class="btn btn-primary" onclick="javascript:obtenerRegistros()">Consultar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table border="1" class="col-md-12" style="overflow-x:scroll;">
                        <thead>
                            <tr>
                                <td colspan="6">Nombre del Contribuyente: Cocina de la abuela</td>

                            </tr>
                            <tr>
                                <td colspan="1">Mes: Septiembre</td>
                                <td colspan="1">Año: 2019</td>
                                <td colspan="4">NCR: 10032123</td>

                            </tr>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="2" align="center">Compras Gravadas</th>
                                <th colspan="3" align="center"></th>
                            </tr>
                            <tr>
                                <th>Día</th>
                                <th>Del No.</th>
                                <th>Al No.</th>
                                <th>Venta</th>
                                <th>Propinas</th>
                                <th>Total De Ventas Díarias Propias</th>

                            </tr>
                        </thead>
                        <tbody id="registros">
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" align="left"></th>
                                <th colspan="1" id="totalventas"></th>
                                <th colspan="1" id="totalpropinas"></th>
                                <th id="totalReal"></th>

                            </tr>
                            <tr>
                                <th colspan="2" align="left">Total De Ventas:</th>
                                <th colspan="1" id="totalesventas"></th>
                                <th colspan="2">Ventas Netas Gravadas Locales:</th>
                                <th id="ventasnetas"></th>

                            </tr>
                            <tr>
                                <th colspan="3" align="left"></th>
                                <th colspan="2">13% Impuesto IVA:</th>
                                <th id="impuesto"></th>

                            </tr>
                            <tr>
                                <th colspan="3" align="left"></th>
                                <th colspan="2">Total Ventas:</th>
                                <th id="totalesdeventa"></th>

                            </tr>
                        </tfoot>
                    </table>
                    <br>
                </div>
            </div>

        </div>
    </div>

</div>

<script>

    $(function () {
        $("#fecha").datepicker(
            {viewMode: "months", minViewMode: "months", autoclose: true, format: 'yyyy-mm'}
        );
    });

    function obtenerRegistros() {
        let mesSeleccionado = $("#fecha").val();
        if(mesSeleccionado!=""){
            
        let formData = new FormData();
        formData.append("mes", mesSeleccionado);
        fetch("http://localhost/dsi-backend/api/libroventas/getVentasMes", {
            method: "POST",
            body: formData
        })
            .then(response => {
                console.log(response);
                return response.json();
            })
            .then(response => {
                console.log(response);
                llenarTabla(response);  
            });
        }else{
            alert("Seleccione un mes");
        }
    }

    function llenarTabla(registros) {
        let tabla =$("#registros");
        let totalpropinaElemento =$("#totalpropinas");
        let totalventasElemento =$("#totalventas");
        let totalrealElemento =$("#totalReal");
        let totalesventasElemento =$("#totalesventas");
        let ventasnetasElemento=$("#ventasnetas");
        let impuestoElemento=$("#impuesto");
        let totalesdeventaElemento=$("#totalesdeventa");
        

        let contenido ="";
        let totalPropinas=0.0, totalVentas=0.0, totalReal =0.0, impuesto=0.0, ventasnetas=0.0, totalesdeventa=0.0;
        registros.map(registro=>{
            totalPropinas+=parseFloat(registro.propina);
            totalVentas+=parseFloat(registro.total);
            totalReal +=parseFloat(registro.total)+parseFloat(registro.propina);

            impuesto=parseFloat(totalVentas)*0.13;
            ventasnetas=parseFloat(totalVentas)-parseFloat(impuesto);
            totalesdeventa=parseFloat(ventasnetas)+parseFloat(impuesto);
            console.log(totalesdeventa);

            let ids = registro.ids.split('');
        let cantidadIds = ids.length;
            contenido+=`
            <tr>
                                <td>${registro.fecha}</td>
                                <td>${ids[0]}</td>
                                <td>${ids[cantidadIds-1]}</td>

                                <td>$${registro.total}</td>
                                <td>$${registro.propina}</td>
                                <td>$${registro.venta}</td>
                            </tr>`
        });
        
        tabla.html("");
        tabla.html(contenido);

        totalpropinaElemento.html("");
        totalpropinaElemento.html("$"+totalPropinas.toFixed(2));

        totalesdeventaElemento.html("");
        totalesdeventaElemento.html("$"+totalesdeventa.toFixed(2));

        ventasnetasElemento.html("");
        ventasnetasElemento.html("$"+ventasnetas.toFixed(2));

        totalventasElemento.html("");
        totalventasElemento.html("$"+totalVentas.toFixed(2));

        impuestoElemento.html("");
        impuestoElemento.html("$"+impuesto.toFixed(2));

        totalesventasElemento.html("");
        totalesventasElemento.html("$"+totalVentas.toFixed(2));

        totalrealElemento.html("");
        totalrealElemento.html("$"+totalReal.toFixed(2));
    }
</script>

</body>
</html>