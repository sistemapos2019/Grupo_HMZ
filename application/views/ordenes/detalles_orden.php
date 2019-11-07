<div class="content-wrapper" style=" min-height:80% !important; height: auto !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Detalles De Orden
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        Home</a>
                </li>
                <li class="active">Detalles De Orden</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="">

                <div class="row">
                    <div class="col-md-8">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Productos</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-md-3">
                                    Orden: 1

                                </div>
                                <div class="col-md-3">
                                    <input type="text" placeholder="Numero de Mesa" value="Mesa 1" class="form-control col-md-3">

                                </div>
                                <div class="col-md-3">
                                    <input type="text" placeholder="Mesero" value="Juan Carlos" class="form-control col-md-3">

                                </div>
                                <div class="col-md-3">
                                    <input type="text" placeholder="Cliente" value="Benja" class="form-control col-md-3">

                                </div>
                                <br>
                                <hr>
                                <div class="col-md-12">
                                    <?php
                                    if (count($categorias) > 0) {
                                        foreach ($categorias as  $categoria) {
                                            ?>
                                            <button id="<?php echo $categoria->nombre; ?>" class="btn btn-primary" style="margin-right:5px;" onclick="javascript:obtenerProductosCategoria(<?php echo $categoria->id; ?>)">
                                                <p style="word-wrap: break-word;"><?php echo $categoria->nombre; ?></p>
                                                </button>                                                                                                                                                                                                                                                    <?php
                                                }
                                                } ?>
                                </div>
                                <br>
                                <hr>
                                <table class="table table-bordered">
                                    <tbody id="productosMostrados">
                                        <tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Detalles de Orden</h3>
                            </div>
                            <div class="box-body">
                                <!-----------AQUI VA LA COSA DE EDITAR----------->
                                <table class="table table-bordered">
                                    <tbody id="productosSeleccionados">
                                    
                                    </tbody>
                                </table>
                                <br>
                                <hr>
                                <h3>Total $ <span id="totalOrden"></span></h3>
                                <hr>
                                <button id="btnSave" class="btn btn-primary">Guardar Orden</button>
                                <button id="btnCobrar" onclick="javascript:calcularTotal()" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Cobrar Orden</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </section>
        </section>
    </div>
    <script src="<?php echo base_url()?>assets/bower_components/blockUI/blockui.js"></script>
    
    <script src="<?php echo base_url()?>assets/bower_components/swal2/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/swal2/sweetalert2.css">

    <script>
        var productos = [];
        var orden =[];
        var totalOrden =0.00;
        function obtenerProductosCategoria(id) {
            let encabezado = "<tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th style=\"width: 40px\">Opciones</th></tr>";
            $("#productosMostrados").html('');
            $("#productosMostrados").append(encabezado);
            productos[id - 1].forEach(function(element) {
                let reg = "<tr> <td>" + element.nombre + "</td> <td> " + element.precio + " </td><td><button class='btn btn-primary btn-sm' onclick=\"javascript:masMenos('bajar'," + id + "," + element.id + ")\"> - </button><span id=\"cantidad"+id+""+element.id+"\">      1  </span> <button class='btn btn-primary btn-sm' onclick=\"javascript:masMenos('subir'," + id + "," + element.id + ")\"> + </button></td><td><button class='btn btn-primary btn-sm' onclick=\"javascript:agregarAOrden(" + id + "," + element.id + ")\">Añadir</button></td> </tr>";
                $("#productosMostrados").append(reg);
            });

        }

        function definirOpciones() {
            productos[0] = [];
            productos[1] = [];
            productos[2] = [];
            productos[0].push({
                id: 1,
                nombre: 'Suspiros',
                precio: 0.50
            });
            productos[0].push({
                id: 2,
                nombre: 'Galleta Picnic',
                precio: 1.25
            });
            productos[0].push({
                id: 3,
                nombre: 'Snickers Pequeño',
                precio: 1.50
            });

            productos[1].push({
                id: 1,
                nombre: 'Coca Cola',
                precio: 1.25
            });
            productos[1].push({
                id: 2,
                nombre: 'Sprite',
                precio: 1.25
            });
            productos[1].push({
                id: 3,
                nombre: 'Uva',
                precio: 1.25
            });

            productos[2].push({
                id: 1,
                nombre: 'Four Loco',
                precio: 1.25
            });
            productos[2].push({
                id: 2,
                nombre: 'Smirnoff Ice',
                precio: 1.25
            });
            productos[2].push({
                id: 3,
                nombre: 'Algo más',
                precio: 1.25
            });

        }
        function masMenos(tipo, idCategoria, idProductos) {
            let idCantidad = "cantidad" + idCategoria + "" + idProductos;
            let cantidad = parseInt($("#" + idCantidad).html(), 10);
            if (tipo == "subir") {
                $("#" + idCantidad).html(cantidad + 1);
            
            } else {
                if (cantidad > 1) {
                    
                    $("#" + idCantidad).html(cantidad - 1);
                }
            }
            
        }


        $(document).ready(
            r => {

                definirOpciones();
                $("#btnSave").hide();
                $("#btnCobrar").hide();
                $("#Snacks").click();
                inicializarCantidadProductos();
                recargarTablaOrden();
                generarTotalOrden();

            }
        );

        $("#btnSave").click(
            r => {
                Swal.fire(
                    'Exitoso!',
                    'Su orden se ha guardado satisfactoriamente',
                    'success');
                setTimeout(function() {
                    location.reload();
                }, 5000);
            }
        );

        $("#btnImprimir").click(r=>{
            generarCobro();}
        );
        function inicializarCantidadProductos() {
            orden =[[{"producto":1,"nombre":"Suspiros","cantidad":4,"total":2},{"producto":2,"nombre":"Galleta Picnic","cantidad":0,"total":0},{"producto":3,"nombre":"Snickers Pequeño","cantidad":2,"total":3}],[{"producto":1,"nombre":"Coca Cola","cantidad":0,"total":0},{"producto":2,"nombre":"Sprite","cantidad":0,"total":0},{"producto":3,"nombre":"Uva","cantidad":0,"total":0}],[{"producto":1,"nombre":"Four Loco","cantidad":0,"total":0},{"producto":2,"nombre":"Smirnoff Ice","cantidad":0,"total":0},{"producto":3,"nombre":"Algo más","cantidad":0,"total":0}]];
        }
        function agregarAOrden(idCategoria, idProducto) {
            let idCantidad="cantidad"+idCategoria+""+idProducto;            
            orden[idCategoria-1][idProducto-1].cantidad+=parseInt($("#" + idCantidad).html(), 10);
            orden[idCategoria-1][idProducto-1].total=(orden[idCategoria-1][idProducto-1].cantidad*productos[idCategoria-1][idProducto-1].precio);
            recargarTablaOrden();
            generarTotalOrden();
            calcularTotal();
        }

        function generarTotalOrden() {
          totalOrden=0.00;
          orden.forEach(categoria => {
            categoria.forEach(producto => {
              totalOrden+=producto.total;
             
            })
          });
          $("#totalOrden").html(totalOrden.toFixed(2));
        }

        function recargarTablaOrden() {
            let encabezado = "<tr><th>Producto</th><th>Cantidad</th><th>Total</th><th>Opciones</th>";
            orden.forEach((categoria, id_categoria)=>{
                categoria.forEach((producto, id_producto)=>{
                  
                    if(producto.cantidad){
                    encabezado=encabezado+"<tr><td>" + producto.nombre + "</td><td><span>" + producto.cantidad +"</span></td><td><span>" + (producto.total)+"</span></td><td><button class='btn btn-sm btn-success' style='margin-right:3px;' onclick='javascript:cambiarCantidadProductoOrden("+id_categoria+","+id_producto+",0)'>-</button><button class='btn btn-sm btn-success ' onclick='javascript:cambiarCantidadProductoOrden("+id_categoria+","+id_producto+",1)'>+</button> </td></tr>";
                }
        })
            });
            $("#productosSeleccionados").html(encabezado);
            $("#btnSave").show();
            $("#btnCobrar").show();
        }
        
        function cambiarCantidadProductoOrden(idCategoria, idProducto, accion) {
            if(accion ==1){
            orden[idCategoria][idProducto].cantidad= orden[idCategoria][idProducto].cantidad+1;}
            else{
                orden[idCategoria][idProducto].cantidad= orden[idCategoria][idProducto].cantidad-1;
            }
            orden[idCategoria][idProducto].total=(orden[idCategoria][idProducto].cantidad*productos[idCategoria][idProducto].precio);
            recargarTablaOrden() ;
            generarTotalOrden();
            calcularTotal();
        }

        function calcularTotal() {
            let efectivo = $("#efectivo").val();
            $("#totalACobrar").html(totalOrden.toFixed(2));
            cambio = efectivo - totalOrden;
            $("#cambio").html(cambio.toFixed(2));
            if (cambio < 0) {
                $("#cambio").html((0.00).toFixed(2));
                $("#btnImprimir").attr("disabled", true);
            } else {
                $("#btnImprimir").attr("disabled", false);

            }
        }

        
        function generarCobro() {
        
        $.blockUI({centerX: true,
centerY: true, message: '<h1><img src="https://ui-ex.com/images/transparent-background-loading.gif" /> <br> Procesando Pago...</h1>' });
      setTimeout(function() {
        $.unblockUI({ message: '<h1><img src="https://ui-ex.com/images/transparent-background-loading.gif" /> Procesando Pago...</h1>' });
        Swal.fire(
          'Exitoso!',
          'Su orden se cobrado satisfactoriamente',
          'success');
      }, 3000);

      setTimeout(function() {
          location.reload();
      }, 5000);
  }
    </script>

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
        $<span id="totalACobrar"></span>
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
        <button id="btnSave" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
        </div>
      </div>
    </div>

  </div>
</div>