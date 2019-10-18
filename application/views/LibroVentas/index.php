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

    </head>
    <body>
        <div class="container" style="margin-top:5%;">
            <div class="row" style="margin-bottom:1%;">
                <div class="col-md-2"></div>
                <div class="col-md-2"><input type="text" class="form-control" onkeypress="return false" id="fechaInicio"></div>
                <div class="col-md-2"><input type="text" class="form-control" onkeypress="return false" id="fechaFin"></div>
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
                        <tbody>
                            <tr>
                                <td>11-9-2019</td>
                                <td>1</td>
                                <td>11</td>

                                <td>$500.00</td>
                                <td>$0.00</td>
                                <td>$500.00</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" align="left"></th>
                                <th colspan="1">$500.00</th>
                                <th colspan="1">$0.00</th>
                                <th>$500.00</th>

                            </tr>
                            <tr>
                                <th colspan="2" align="left">Total De Ventas:</th>
                                <th colspan="1">$500.00</th>
                                <th colspan="2">Ventas Netas Gravadas Locales:</th>
                                <th>$432.10</th>

                            </tr>
                            <tr>
                                <th colspan="3" align="left"></th>
                                <th colspan="2">13% Impuesto IVA:</th>
                                <th>$66.70</th>

                            </tr>
                            <tr>
                                <th colspan="3" align="left"></th>
                                <th colspan="2">Total Ventas:</th>
                                <th>$500.00</th>

                            </tr>
                        </tfoot>
                    </table>
                    <br>
                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>