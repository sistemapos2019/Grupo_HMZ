<template>
    <div class="content">      
      <div class="container-fluid">
         
        <div class="row">
          
           
         
          <div class="col-md-12">
              
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Libro de compras</h4>
                    <div class="row">
          <div class="col-md-4">  </div>
            <div class="col-md-3">
              Fecha Inicio
  <datepicker format="dd-MM-yyyy" ></datepicker>
             
            </div>
            <div class="col-md-3">
              Fecha Fin:
              <datepicker format="dd-MM-yyyy" ></datepicker>
            </div>
            <div class="col-md-2">
              <br>
               <button class="btn btn-primary btn-sm ">Buscar</button>
              </div>
                    </div>
                  </div>
           
                  <hr>
                  <div class="col-md-12">
                    <table border="1" style="overflow-x:scroll;">
                        <thead>
                            <tr>
                                   <td colspan="5">Nombre del Contribuyente: Cocina de la abuela</td>
                                <td colspan="1">NCR: 10032123</td>
                                <td colspan="3">Mes: Septiembre</td>
                                <td colspan="3">Año: 2019</td>
                            </tr>
                            <tr>
                             <th colspan="7"></th>
                                <th colspan="3" align="center">Compras Gravadas</th>
                              
                            </tr>
                            <tr>
                            <th>No.</th>
                            <th>Fecha De Emisión</th>
                            <th>Número De Documento</th>
                            <th>NRC</th>
                            <th>NIT o DUI de sujeto excluido</th>
                            <th>Nombre De Proveedor</th>
                            <th>Internas</th>
                            <th>Importaciones e Internacionales</th>
                            <th>Credito Fiscal</th>
                            <th>Anticipo A Cuenta IVA Percivido</th>
                            <th>Total Compras</th>
                            <th>Compras A Sujetos Excluidos</th>   
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>11-9-2019</td>
                                <td>0000000000000</td>
                                <td>100323466</td>
                                
                                <td>12300003123-1</td>
                                <td>Tiendas Varias S.A. de C.V.</td>
                                <td>$500.00</td>
                                <td>$230.00</td>
                                <td>$120.32</td>
                                <td>$123.12</td>
                                <td>$853.12</td>
                                <td>$0.00</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                   <th colspan="6" align="left">TOTALES:</th>
                                <th colspan="1">$500.00</th>
                                <th colspan="1">$230.00</th>
                                <th>$120.32</th>
                                <th>$123.12</th>
                                <th>$853.12</th>
                                <th>$0.00</th>
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
  </template>
   
  <script>
   import Datepicker from 'vuejs-datepicker';
  export default {
    components: {
        Datepicker
    },
    methods:{
      
    },
    data () {
      return {
      }
    }
  }
  </script> 
  <style>
  
  </style>