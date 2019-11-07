    <?php
   $imprimirPreparados= $parametros['Imprimir Ticket de productos preparados']=="SI"?true:false;
   $imprimirNoPreparados= $parametros['Imprimir Ticket de productos NO preparados o rapidos']=="SI"?true:false;
   $porcentajePropina =  intval ($parametros['Propina']);
    ?>
    <div class="content-wrapper" style=" min-height:80% !important; height: auto !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Crear Orden
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        Home</a>
                </li>
                <li class="active">Crear Orden</li>
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
                                <div class="col-md-1">
                                    Orden: <?php echo $id;?>
                                    <input type="hidden" id="codigoOrden" value="<?php echo $id;?>">
                                </div>
                                <div class="col-md-3">
                                  <select name="numeroMesa" id="numeroMesa" class="form-control col-md-3"></select>
                                </div>
                                <div class="col-md-3">
                                   <select name="mesero"  class="form-control col-md-3" id="mesero">
                                   <option value="">--Mesero--</option>
                                   <?php foreach ($meseros as $mesero) {
                                       ?>
                                       <option value="<?php echo $mesero->id?>"><?php echo $mesero->nombre; ?></option>
                                       <?php
                                   }?>
                                   </select>

                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="cliente" placeholder="Cliente" class="form-control col-md-3">
                                    
                                   
                                    
                                </div>
                                <div class="col-md-2">
                                Para Llevar:
                                <input type="checkbox" name="llevar" id="llevar">                               
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
                                <table class="table table-bordered">
                                    <tbody id="productosSeleccionados">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th style="width: 40px"> - +</th>
                                        </tr>

                                    </tbody>
                                </table>
                                <br>
                                <br>
                                Comentario:
                                <textarea name="" id="comentario" class="form-control" style="resize: none;"></textarea>
                                <hr>
                                <h3>Subtotal $ <span id="subtotalOrden"></span></h3>
                                <h3>Propina $ <span id="propina"></span></h3>
                                <hr>
                                <h3>Total $ <span id="totalOrden"></span></h3>
                                <hr>
                                <button id="btnSave" class="btn btn-primary">Guardar Orden</button>
                                <?php if($parametros["ModoEntorno"]=="CAJA"){?>
                                <button id="btnCobrar" onclick="javascript:calcularTotal()" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Cobrar Orden</button>
                                            <?php }?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </section>
        </section>
        <div id="qrRapido" style="display:none;"></div>
        <div id="qrPreparado" style="display:none;"></div>
    </div>
    <script src="<?php echo base_url()?>assets/bower_components/blockUI/blockui.js"></script>
    <script src="<?php echo base_url()?>assets/bower_components/swal2/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/toastr.min.css">
    <script src="<?php echo base_url()?>assets/dist/js/toastr.js"></script>
    <script src="<?php echo base_url()?>assets/dist/js/qrcode.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/swal2/sweetalert2.css">
                        
    <script>
        var productos = [];
        var orden = [];
        var totalOrden = 0.00;
        var subTotalOrden =0.00;
        var idOrdenCreada=0;
        var yaCreada=0;
        var propina =0.00;
        

        $(document).ready(r => {
            $('#myModal').on('hidden.bs.modal', function () {
            //location.reload();
        });
            $("#btnSave").hide();
            $("#btnCobrar").hide();
            $("#Bebidas").click();
            recargarTablaOrden();
            generarTotalOrden();
            obtenerMesas();
        });
        
        function generarQRs() {
          
           new QRCode(document.getElementById("qrRapido"), "<?php base_url()?>/ordenesapi/setearRapido/<?php echo $id;?>");
           new QRCode(document.getElementById("qrPreparado"), "<?php base_url()?>/ordenesapi/setearPrepadado/<?php echo $id;?>");
           let rapido = document.getElementById("qrRapido");
           let preparado = document.getElementById("qrPreparado");
           setTimeout(function(){
            var mywindow = window.open('', 'Print', 'height=600,width=400');
                    
                     mywindow.document.write("<h1>Validar Tiempo Rapido</h1>"); 
                    mywindow.document.write(rapido.innerHTML);
                    mywindow.document.write("<br>");   
                    mywindow.document.write("<h1>Validar Tiempo Preparado</h1>"); 
                    mywindow.document.write(preparado.innerHTML);
                
                    mywindow.document.close();
                    mywindow.focus()
                    mywindow.print();
                    mywindow.close();

            }, 2000);
          
                   
    return true;
           
        }
        function obtenerMesas() {
            let mesasSelect =document.querySelector("#numeroMesa");
            mesasSelect.innerHTML ="<option value=''>--N. de mesa--</option>";
            fetch('<?php echo base_url()?>/ordenesapi/obtenermesas')
                .then(
                    r => {
                        return r.json();
                    }
                )
                .then(mesas => {
                   
                    mesas.forEach(mesa => {
                        mesasSelect.innerHTML+=`<option value="${mesa.id}">${mesa.mesa}</option>`;
                    });
                  
                });
        }

        function obtenerProductosCategoria(id) {
            fetch('<?php echo base_url()?>productos/obtenerProductosPorCategoria/' + id)
                .then(
                    r => {
                        return r.json();
                    }
                )
                .then(json => {
                    console.log(json);
                    let valores = [];
                    productos[id] = [];
                    json.forEach(producto => {
                        valores.push(
                            {id: producto.id, nombre: producto.nombre, precio: producto.precio}
                        );
                    });
                   
                    productos[id] = valores;
                    recrearOpciones(id);
                });
        }

        function recrearOpciones(id) {
            let encabezado = "<tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th style=\"width: 40px\"" +
                    ">Opciones</th></tr>";
            $("#productosMostrados").html('');
            $("#productosMostrados").append(encabezado);
            productos[id].forEach(function (element) {
                let reg = "<tr> <td>" + element.nombre + "</td> <td> " + element.precio + " </t" +
                        "d><td><button class='btn btn-primary btn-sm' onclick=\"javascript:masMenos('ba" +
                        "jar'," + id + "," + element.id + ")\">  -  </button><span id=\"cantidad" + element.id + "\">     1     </span> <button class='btn btn-primary btn-sm'" +
                        " onclick=\"javascript:masMenos('subir'," + id + "," + element.id + ")\">  +  <" +
                        "/button></td><td><button class='btn btn-primary btn-sm' onclick=\"javascript:a" +
                        "gregarAOrden('" + id + "'," + element.id + ")\">Añadir</button></td> </tr>";
                $("#productosMostrados").append(reg);
            });
        }

        function masMenos(tipo, idCategoria, idProductos) {
            let idCantidad = "cantidad" + idProductos;
            let cantidad = parseInt($("#" + idCantidad).html(), 10);
            if (tipo == "subir") {
                $("#" + idCantidad).html(cantidad + 1);

            } else {
                if (cantidad > 1) {

                    $("#" + idCantidad).html(cantidad - 1);
                }
            }

        }


        function generarCobro() {
            let cont = 0;
            if($("#numeroMesa").val()==""){
                toastr["error"]("El campo número de mesa es requerido")
            }else {
                cont += 1;
            }
            if($("#cliente").val()==""){
                //toastr["error"]("El campo cliente es requerido")
            }else {
                
            }
            if($("#mesero").val()==""){
                toastr["error"]("El campo mesero es requerido")
            }else{
                cont += 1;
            }
            if(cont==2){
            $.blockUI({
                centerX: true,
                centerY: true,
                message: '<h1><img src="https://ui-ex.com/images/transparent-background-loading.gif" /> ' +
                        '<br> Procesando Pago...</h1>'
            });
          
            let url= "<?php echo base_url()?>ordenesapi/actualizarOrden";
            let formData = new FormData(); 
            formData.append('estado', 'CP');
            formData.append('actualizarguardar', '1');
            formData.append('idMesa', $("#numeroMesa").val()); 
            formData.append('cliente', $("#cliente").val());
            formData.append('mesero', $("#mesero").val());
            formData.append('comentario', $("#comentario").val());
            formData.append('llevar', $('#llevar').prop('checked')?"1":"0");
            formData.append('total',totalOrden);
            formData.append('propina',totalOrden*0.1);
            formData.append('orden', JSON.stringify(orden));
            fetch(url, {
                method: "POST",
                body: formData
            }).then(respuesta => {
                return (respuesta.json());
                
            }).then(json=>{
                
                $.unblockUI();
                
                // debugger;
                // console.log(json);
                // debugger;
                    //Configurar 
              imprimeTicket( generarPreparados(json.productos)+generarNoPreparados(json.productos),"",generarTicketCobrar(json.orden, json.productos));

                Swal.fire(
                            'Exitoso!',
                            'Su orden se cobrado satisfactoriamente',
                            'success').then(r=>{
                                window.location.href = "<?php echo base_url()?>Dashboard";
                            });                  
            }).catch(function (error) {
                console.log(error);
                $.unblockUI();
                Swal.fire(
                            'Upps!',
                            'Su orden no se pudo cobrar, contacte al admin',
                            'error');
                    setTimeout(function() {
                    //location.reload();
                    }, 2000);
});}
        }

        $("#btnSave").click(r => {
            
            var url = '<?php echo base_url()?>ordenesapi/guardarOrden';
            let formData = new FormData();
            let cont = 0;
            if($("#numeroMesa").val()==""){
                toastr["error"]("El campo número de mesa es requerido")
            }else {
                cont += 1;
            }
            if($("#cliente").val()==""){
                //toastr["error"]("El campo cliente es requerido")
            }else {
                
            }
            if($("#mesero").val()==""){
                toastr["error"]("El campo mesero es requerido")
            }else{
                cont += 1;
            }
            if(cont == 2){
            formData.append('idMesa', $("#numeroMesa").val()); 
            formData.append('cliente', $("#cliente").val());
            formData.append('mesero', $("#mesero").val());
            formData.append('estado','AA');
            formData.append('comentario', $("#comentario").val());
            formData.append('llevar', $('#llevar').prop('checked')?"1":"0");
            formData.append('total',totalOrden);
            formData.append('propina',totalOrden*0.1);
            formData.append('orden', JSON.stringify(orden));

            fetch(url, {
            method: 'POST',
            body:formData,            
            }).then(res => {return res.json()}).then(res =>
             {
               
            
                swal({
                title: "Exito!",
                text: "Su Orden Ha Sido Creada",
                type: "success",
                timer: 3000
                })
                
                .then(r=>{
                    yaCreada=1;
                  
                     
                    imprimeTicket( generarPreparados(res)+generarNoPreparados(res),"","");
                    window.location.href = "<?php echo base_url()?>Dashboard";
                });

                

            });           
        }
        });
        
        function agregarAOrden(idCategoria, idProducto) {
            let idCantidad = "cantidad" + "" + idProducto;
            let productoSeleccionado = (
                productos[parseInt(idCategoria)].filter(producto => producto.id == idProducto)[0]
            );
            if (orden.filter(producto => producto.id == idProducto).length == 1) {
                orden
                    .filter(producto => producto.id == idProducto)[0]
                    .cantidad += parseInt($("#" + idCantidad).html(), 10);
                orden
                    .filter(producto => producto.id == idProducto)[0]
                    .total = orden
                    .filter(producto => producto.id == idProducto)[0]
                    .cantidad * productoSeleccionado.precio;

            } else {
                orden.push({
                    id: idProducto,
                    nombre: productoSeleccionado.nombre,
                    categoria : idCategoria,
                    cantidad: parseInt($("#" + idCantidad).html(), 10),
                    total: parseInt($("#" + idCantidad).html(), 10) * productoSeleccionado.precio
                });
            }
            recargarTablaOrden();
            generarTotalOrden();
            if (totalOrden > 0) {
                $("#btnSave").show();
                $("#btnCobrar").show();
            }else{
                $("#btnSave").hide();
                $("#btnCobrar").hide();
            }
        }

        function recargarTablaOrden() {
            let encabezado = "<tr><th>Producto</th><th>Cantidad</th><th>Total</th> </tr>";
            orden.forEach(producto => {
                console.log(producto);
                if (producto.cantidad) {
                    encabezado = encabezado + "<tr><td>" + producto.nombre + `</td><td><button onclick="masMenosEditar(${producto.id},'restar')" class='btn btn-primary btn-sm'>-</button><span> ` +
                            producto.cantidad + `</span> <button class='btn btn-primary btn-sm' onclick="masMenosEditar(${producto.id},'sumar')">+</button></td><td><span>$` + (
                        producto.total.toFixed(2)
                    ) + `</span></td></tr>`;
                }
            });
            $("#productosSeleccionados").html(encabezado);

        }

        function generarTotalOrden() {
            subTotalOrden = 0.00;
            orden.forEach(producto => {
                subTotalOrden += producto.total;
            });
            <?php if($porcentajePropina>0){?>
                 propina = (<?php echo $porcentajePropina /100;?>* subTotalOrden );
                totalOrden = subTotalOrden+propina;
            <?php } ?>
            $("#subtotalOrden").html(subTotalOrden.toFixed(2));
            $("#totalOrden").html(totalOrden.toFixed(2));
            $("#propina").html(propina.toFixed(2));
        }

        function calcularTotal() {
            console.log(idOrdenCreada);
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

        function masMenosEditar(id, operacion) {
            if(operacion=="sumar"){
                orden.forEach(producto => {                    
              if(producto.id==id){
                  producto.cantidad+=1;
                  let productoSeleccionado = (
                  productos[parseInt(producto.categoria)].filter(productoBuscar => productoBuscar.id == producto.id)[0]);
                producto.total = producto.cantidad* productoSeleccionado.precio;
              }
            });
            
            }else{
                orden.forEach(producto => {
                    
                    if(producto.id==id){
                        producto.cantidad-=1;
                        let productoSeleccionado = (
                        productos[parseInt(producto.categoria)].filter(productoBuscar => productoBuscar.id == producto.id)[0]);
                      producto.total = producto.cantidad* productoSeleccionado.precio;
                    }    
                  });
            }
            recargarTablaOrden();
            generarTotalOrden();
            calcularTotal();

            if (totalOrden > 0) {
                $("#btnSave").show();
                $("#btnCobrar").show();
            }else{
                $("#btnSave").hide();
                $("#btnCobrar").hide();
            }
        }

//Para imprimir los tickets
function imprimeTicket(ticket1="", ticket2="", ticket3="") {
    generarQRs();
    var mywindow = window.open('', 'Print', 'height=600,width=400');
    mywindow.document.write(ticket1);
    mywindow.document.write(ticket2);
    mywindow.document.write(ticket3);   
    mywindow.document.close();
    mywindow.focus()
    mywindow.print();
    mywindow.close();
    return true;
}

function generarTicketCobrar(orden, productos) {
    let cliente =$("#cliente").val();
    let mesa =$("#numeroMesa").val();
    let efectivo = parseFloat($("#efectivo").val());
    let cambio= (efectivo-totalOrden );
    var content = '<html><head><title>Print</title> </head><body >'+`<h1><?php echo $parametros["Nombre"];?></h1> 
    <hr>

    <strong>Giro: <?php echo $parametros["Giro"];?></strong> <br>
    <strong>NIT: <?php echo $parametros["NIT"];?></strong> <br>
    <strong>Tel: <?php echo $parametros["Telefono"];?></strong> <br>
    <strong>Dirección: <?php echo $parametros["Direccion"];?></strong> <br>
    <strong>Fecha: ${orden.fecha}</strong>
        <table style="width:100%">
  <tr>
    <th> Orden: ${orden.id} </th>
    <th> Mesa: ${mesa} </th>
    <th> Cliente: ${cliente}</th> 
  </tr></table>
  
  <br>
        <hr>
        <table style="width:100%">
  <tr>
    <th>Producto</th>
    <th>Cantidad</th> 
    <th>Total</th>
  </tr>
 
    `;
    productos.forEach(producto => {
        content+=`<tr> <td>${producto.nombre}</td><td> ${producto.cantidad}</td><td>  $${(producto.precio*producto.cantidad).toFixed(2)} </td></tr>`;
    });
    content+=`</table>
    <br> <br>
    <hr>
    <div align="left">
    <strong> Subtotal: $${subTotalOrden.toFixed(2)}</strong><br>
    <strong> Propina: $${propina.toFixed(2)}</strong><br>
    <strong> Total: $${totalOrden.toFixed(2)}</strong><br>
    
    <strong> Efectivo: $${efectivo.toFixed(2)}</strong><br>
    <strong> Cambio: $${cambio.toFixed(2)}</strong><br>
    </div>

    <hr>
    <div align="center">
    Gracias Por Su Compra
    </div>
    
    `;
    content +='</body></html>';
    return content;
}

function generarPreparados(productos) {
<?php if ($imprimirPreparados){ ?>

    let cantidadProductos =0;
        productos.forEach(producto => {
       if(producto.preparado==1){cantidadProductos++}});


if(cantidadProductos>0){
let contentPreparados=`<html><body>
<h1>A Preparar Cocina</h1>
<hr>
    <strong>Productos Preparados
    </strong>
    <br>
        <table style="width:100%">
            <br>
                <hr>
                    <table style="width:100%">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>

   `;
     productos.forEach(producto => {
       if(producto.preparado==1){
        contentPreparados+=`<tr> <td>${producto.nombre}</td><td> ${producto.cantidad}</td></tr>`;
   }
   }); 
   
   let observacion = $("#comentario").val();
   contentPreparados+=`</table>
   
   <br>
   <strong>Observacion:</strong>
   ${   observacion}
   <div style=" page-break-before: always;"></div>
  
   </body></html>
   `;
   return contentPreparados;}
   else{
       return "";
   }
   
    <?php } else{?>
        return "";
        <?php }?>
}



function generarNoPreparados(productos) {
    <?php if ($imprimirNoPreparados){ ?>
        let cantidadProductos =0;
        productos.forEach(producto => {
       if(producto.preparado==0){cantidadProductos++}});

        if(cantidadProductos >0){
let contentPreparados=`<html><body>
<h1>¡Listos! Ya preparados</h1>
<hr>
    <strong>Productos No Preparados
    </strong>
    <br>
        <table style="width:100%">
            <br>
                <hr>
                    <table style="width:100%">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>

   `;
     productos.forEach(producto => {
       if(producto.preparado==0){
        contentPreparados+=`<tr> <td>${producto.nombre}</td><td> ${producto.cantidad}</td></tr>`;
   }
   });

   let observacion = $("#comentario").val();
   contentPreparados+=`</table>
   
   <br>
   <strong>Observacion:</strong>
   ${observacion}
   <div style=" page-break-before: always;"></div>
   </body></html>
   `;
   return contentPreparados;
}
   else{
       return "";
   }
   <?php } else{ ?>
    return "";
   <?php } ?>
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
        <span id="totalACobrar"></span>
        <br>
        <label>Efectivo:</label>
        <br>
        <input type="number" onkeyup="javascript:calcularTotal()" id="efectivo" class="form-field" min="0.00" step="0.01">
        <br>
        <label>Cambio:</label>
        <span id="cambio">0.0</span>
        <br>
      </div>
      <div class="modal-footer">   
      <div class="container">
        <div class="row">
        <div class="col-md-1">
        <button id="btnImprimir" disabled="disabled"  data-dismiss="modal" onclick="javascript:generarCobro()"  class="btn btn-primary">Imprimir</button>
        </div>
        <div class="col-md-1">
        <button id="cancelar" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
