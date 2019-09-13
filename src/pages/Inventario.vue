<template>
    <div class="content">      
      <div class="container-fluid">
         
        <div class="row">
          
           
         
          <div class="col-md-12">
              
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Inventario</h4>
                    <div class="row">
          <div class="col-md-4">  </div>
           
           <div class="col-md-2">
           
              <a href="#">  <ModalAgregarProducto/></a>
              
              </div>
            <div class="col-md-2">
           
              <a href="#"> <i class="nc-icon nc-preferences-circle-rotate"></i> Ordenar</a>
              
              </div>
              
              <div class="col-md-3">
              <i class="nc-icon nc-zoom-split"></i>
   <input type="text" class="form-control-sm" placeholder="Buscar">
             
            </div>
                    </div>
                  </div>
           
                  <hr>
                  <div class="col-md-12">
                    <table class="table">
                        <thead>
                          
                            <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                             
                            <th>Cantidad</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Azucar Del Cañal - Bolsa</td>
                                 
                                <td>40</td>
                              
                            </tr>
                               <tr>
                                <td>2</td>
                                <td>Aceite Mazolla- Bolsa</td>
                                 
                                <td>12</td>
                              
                            </tr>
                               <tr>
                                <td>3</td>
                                <td>Café de Ataco - Bolsa</td>
                                 
                                <td>25</td>
                              
                            </tr>
                               
                          
                               <tr>
                                <td>5</td>
                                <td>Paquete de servilletas LIMPIO</td>
                                 
                                <td>23</td>
                              
                            </tr>
                        </tbody>
                        
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
  import ModalAgregarProducto from '@/components/ModalAgregarProducto';
   import Datepicker from 'vuejs-datepicker';
  export default {
    components: {
        Datepicker,
        ModalAgregarProducto
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