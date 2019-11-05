<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small id="modo"></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Ordenes</h3>
                            <ul class="nav nav-pills nav-stacked">
                                <li  class="active"><a href="<?= base_url(); ?>ordenes/crearorden"><span class="fa fa-plus-square"></span>Nueva Orden</a></li>
                                <li class="opcionMenu disabled" id="botonModificar" role="presentation"><a><span class="fa fa-plus-square"></span>Modificar Orden</a></li>
                              <!--  <li class="opcionMenu disabled" onclick="javascript:mostrarAlertaImprimir()" role="presentation"><a href="#"><span class="fa fa-plus-square"></span>Imprimir</a></li> -->
                                <li class="opcionMenu disabled" id="optCobrar"><a href="#"><span class="fa fa-plus-square"></span>Cobrar</a></li>
                            </ul>
                        </div>
                        <div class="box-body">
                            <table id="tablaOrdenes" style="table-layout: fixed;" class="table table-bordered table-hover dataTable display ">
                                <thead>
                                    <tr>
                                        <th>Orden</th>
                                        <th>Mesa</th>
                                        <th>Mesero</th>
                                        <th>Cliente</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Preparado</th>
                                        <th>Rapido</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach ($ordenesActivas as  $orden) {
                                        $colorTiempo = '';
                                        $colorTiempoRapido = '';
                                        if($orden->llevar == 0){     
                                            switch ($orden->Preparado) {
                                                case 'ROJO':
                                                    $colorTiempo = "red";
                                                    break;
                                                case 'AMARILLO':
                                                    $colorTiempo = "yellow";
                                                    break;
                                                case 'VERDE':
                                                    $colorTiempo = "green";
                                                    break;
                                            }

                                            switch ($orden->Rapido) {
                                                
                                                case 'ROJO':
                                                    $colorTiempoRapido = "red";
                                                    break;
                                                case 'AMARILLO':
                                                    $colorTiempoRapido = "yellow";
                                                    break;
                                                case 'VERDE':
                                                    $colorTiempoRapido = "green";
                                                    break;
                                            }
                                                                                   
                                            ?>
                                    <tr>
                                        <th><?php echo $orden->IdOrden;?></th>
                                        <th><?php echo $orden->Mesa;?></th>
                                        <th><?php echo $orden->Mesero;?></th>
                                        <th><?php echo $orden->Cliente;?></th>
                                        <th>$<?php echo $orden->Total;?></th>
                                        <th><?php echo $orden->Estado;?></th>
                                        <th style = "background-color:<?php echo $colorTiempo;?>;"><?php echo $orden->TiempoPreparado;?></th>
                                        <th style = "background-color:<?php echo $colorTiempoRapido;?>;"><?php echo $orden->TiempoRapido;?></th>
                                    </tr>
                                    <?php
                                        }
                                       
                                    }
                                    ?>
                                   </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    </section>
</div>

<!--Moda de Cobrar-->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cobro</h4>
            </div>
            <div class="modal-body">
                <label>Total:</label>
                $<span id="totalOrdenCobrar"></span>
                <br>
                <label>Efectivo:</label>
                <br>
                <input type="number" onkeyup="javascript:calcularTotal()" id="efectivo" class="form-field" min="0.00" step="0.01">
                <br>
                <label>Cambio:</label>
                $<span id="cambio">0.0</span>
                <br>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1">
                            <button id="btnImprimir" disabled="disabled" data-dismiss="modal" onclick="javascript:generarCobro()" class="btn btn-primary">Imprimir</button>
                        </div>
                        <div class="col-md-1">
                            <button id="cancelar" class="btn btn-primary" data-target="#myModal" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>

</style>
<script>
    var codigoOrden = false;
    var haySeleccion = false;
    $("#optCobrar").click(r=>{
            if(haySeleccion===true){
                 $("#myModal").modal();
            }else{
                console.log("akgo");
            }
        });
        $("#botonModificar").click(r=>{
            if(codigoOrden){
                window.location.href = "<?php echo base_url()?>ordenesapi/detallesOrden/"+codigoOrden;
            }
        });
    $(document).ready(function() {

 
        var table = $('#tablaOrdenes').DataTable({
            language:

            {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },

            select: {
                style: 'single'
            },

        });
        $('#tablaOrdenes tbody ').on('click', 'tr', function() {
            if (!$(this).hasClass('selected')) {
                //console.log(table.row(this).data());
                codigoOrden = table.row(this).data()[0];
                totalOrden =0.00;
                totalOrden=(parseFloat(table.row(this).data()[4].substring(1)).toFixed(2));
                haySeleccion = true;
                generarTotalOrden();
            } else {
                totalOrden =0.00;
                codigoOrden = false;
                console.log("se deseleccionó");
                haySeleccion = false;
                generarTotalOrden();
            }

            if (codigoOrden != false) {
                $(".opcionMenu").removeClass('disabled');
            } else {
                $(".opcionMenu").addClass('disabled');
            }

        });

    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">

<script>
    function mostrarAlertaImprimir() {
        Swal.fire(
            'Orden con exito!',
            'Su ticket se está imprimiendo',
            'success'
        );
    }
</script>

<script src="<?php echo base_url()?>assets/bower_components/blockUI/blockui.js"></script>
    <script src="<?php echo base_url()?>assets/bower_components/swal2/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/swal2/sweetalert2.css">



<script>
    var totalOrden =0.00;
    function generarCobro() {
        let url= "<?php echo base_url()?>ordenesapi/actualizarOrden";
        $.blockUI({
            centerX: true,
            centerY: true,
            message: '<h1><img src="https://ui-ex.com/images/transparent-background-loading.gif" /> <br> Procesando Pago...</h1>'
        });
      let formData = new FormData();
formData.append('idOrden', codigoOrden);
formData.append('estado', '0');
fetch(url, {
    method: "POST",
    body: formData
}).then(respuesta => {
    console.log(respuesta);
    $.unblockUI();
    Swal.fire(
                'Exitoso!',
                'Su orden se cobrado satisfactoriamente',
                'success');
        setTimeout(function() {
            window.location.href = "<?php echo base_url()?>Dashboard";
        }, 2000);
}).catch(function (error) {
    $.unblockUI();
    Swal.fire(
                'Upps!',
                'Su orden no se pudo cobrar, contacte al admin',
                'error');
        setTimeout(function() {
            location.reload();
        }, 2000);
});
    }

    function calcularTotal() {
        let efectivo = $("#efectivo").val();
        $("#totalACobrar").html(totalOrden);
        cambio = efectivo - totalOrden;
        $("#cambio").html(cambio.toFixed(2));
        if (cambio < 0) {
            $("#cambio").html((0.00).toFixed(2));
            $("#btnImprimir").attr("disabled", true);
        } else {
            $("#btnImprimir").attr("disabled", false);

        }
    }

    function generarTotalOrden() {
          console.log(totalOrden);
          $("#totalOrdenCobrar").html(totalOrden);
        }
</script>