<template>
    <div class="content">      
      <div class="container-fluid">
         
        <div class="row">
          
           
         
          <div class="col-md-12">
              
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Libro de Ventas</h4>
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