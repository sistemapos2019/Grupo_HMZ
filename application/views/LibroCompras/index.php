<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Libro Compras
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        Home</a>
                </li>
                <li class="active">Libro Compras</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="">

                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"></h3>
                            </div>
                            <div class="box-body">
                            <div class="container" style="width:100%;">
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
                                <td colspan="6">Nombre del Contribuyente: <?php
                                     echo $parametros["Nombre"]; 
                                ?></td>

                            </tr>
                            <tr>
                                <td id="fechas" colspan="2">  </td>
                                <td colspan="4">NCR: <?php
                                    echo $parametros["NRC"];
                                ?></td>

                            </tr>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="2" align="center">Compras Gravadas</th>
                                <th colspan="3" align="center"></th>
                            </tr>
                            <tr>
                                <th>Día</th>
                                <th>Internas</th>
                                <th>Importaciones e Internacionales</th>
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
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </section>
    </section>
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
        fetch("http://localhost/dsi-backend/librocompras/getComprasMes", {
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
        let fechasElemento=$("#fechas");
        

        let contenido ="";
        let fechas ="";

        let totalPropinas=0.0, totalVentas=0.0, totalReal =0.0, impuesto=0.0, ventasnetas=0.0, totalesdeventa=0.0;
        registros.map(registro=>{
            fechas=$("#fecha").val();
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

        fechasElemento.html("");
        fechasElemento.html("Fecha: "+fechas);

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
