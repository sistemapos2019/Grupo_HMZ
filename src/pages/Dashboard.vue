<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Opciones</h4>
            </div>
            <hr>
            <div class="">
              <ul class="navbar-nav ml-auto">
                <sidebar-link to="/admin/login-modificar">
                  <div class="">
                    <i class="card-body" role="button"><i class="nc-icon nc-settings-tool-66"></i> Modificar Orden </i>
                  </div>
                </sidebar-link>
              </ul>
            </div>
            <div class="">
              <ul class="navbar-nav ml-auto">
                <sidebar-link to="#">
                  <div class="">
                    <i class="card-body" role="button"><i class="nc-icon nc-money-coins"></i><modal-cobrar id="modal-cobrar"/></i>
                  </div>
                </sidebar-link>
              </ul>
            </div>
          </div> 
        </div>
            <card class="card">
              <div class="row">
        <div class="col-sm-6">
        <input class="form-control" type="text" placeholder="Search" aria-label="Search"/>
        </div>
          <div class="col-sm-3">
        <button type="button" class="btn btn-light"><i class="nc-icon nc-bullet-list-67"></i> Sorft</button>
        </div>
      </div>
            <div class="card-body">
              <h4 class="card-title">Ordenes Recientes</h4>
              <hr>
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mesa</th>
                    <th scope="col">Mesero</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Total</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Llevar</th>
                    <th scope="col">Preparado</th>
                    <th scope="col">Rapido</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>1</td>
                    <td>Juan Perez</td>
                    <td>Carlos Jimenez</td>
                    <td>$15.90</td>
                    <td>Pendiente</td>
                    <td><span class="nc-icon nc-check-2 px-2"></span></td>
                    <td id="preparado">5:00</td>
                    <td><span class="nc-icon nc-check-2 px-2"></span></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>2</td>
                    <td>Juan Perez</td>
                    <td>Carlos Jimenez</td>
                    <td>$15.90</td>
                    <td>Pendiente</td>
                    <td><span class="nc-icon nc-simple-remove px-2"></span></td>
                    <td id="preparado">6:26</td>
                    <td><span class="nc-icon nc-check-2 px-2"></span></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>3</td>
                    <td>Juan Perez</td>
                    <td>Carlos Jimenez</td>
                    <td>$15.90</td>
                    <td>Pendiente</td>
                    <td><span class="nc-icon nc-simple-remove px-2"></span></td>
                    <td id="preparado">6:26</td>
                    <td><span class="nc-icon nc-simple-remove px-2"></span></td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>4</td>
                    <td>Juan Perez</td>
                    <td>Carlos Jimenez</td>
                    <td>$15.90</td>
                    <td>Pendiente</td>
                    <td><span class="nc-icon nc-simple-remove px-2"></span></td>
                    <td id="preparadoAmarillo">12:26</td>
                    <td><span class="nc-icon nc-check-2 px-2"></span></td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>5</td>
                    <td>Juan Perez</td>
                    <td>Carlos Jimenez</td>
                    <td>$15.90</td>
                    <td>Pendiente</td>
                    <td><span class="nc-icon nc-simple-remove px-2"></span></td>
                    <td id="preparadoRojo">22:28</td>
                    <td><span class="nc-icon nc-check-2 px-2"></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </card>
        </div>
      </div>
    </div>
</template>
<script>
  import ChartCard from 'src/components/Cards/ChartCard.vue'
  import StatsCard from 'src/components/Cards/StatsCard.vue'
  import LTable from 'src/components/Table.vue'
  import Card from 'src/components/Cards/Card.vue'
  import ModalCobrar from '@/components/ModalCobrar.vue'
const tableColumns = ['IdOrden','Mesa','Mesero', 'Cliente', 'Total', 'Estado','llevar','TiempoPreparado','TiempoRapido']
const tableData = [
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   mesa: 1,
   tiemporapido: 2.05,
   rapido: "sí",
   llevar: 1,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   mesa: 1,
   llevar: 1,
   tiemporapido: 2.05,
   rapido: "sí",
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   mesa: 1,
   llevar: 1,
   tiemporapido: 2.05,
   rapido: "sí",
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   mesa: 1,
   llevar: 1,
   tiemporapido: 2.05,
   rapido: "sí",
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   mesa: 1,
   llevar: 1,
   tiemporapido: 2.05,
   rapido: "sí",
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
  idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   mesa: 1,
   llevar: 1,
   tiemporapido: 2.05,
   rapido: "sí",
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  }]
  
  export default {
    components: {
      LTable,
      ChartCard,
      StatsCard,
      Card,
      ModalCobrar
    },
    data () {
      return {
        table1: {
          columns: [...tableColumns],
          data: [...tableData]
        },
        table2: {
          columns: [...tableColumns],
          data: [...tableData]
        }
      }
    }
  }
</script>
<style>
  #editarOrden{
    background-color: cornflowerblue;
  }
  #cobrarOrden{
    background-color: cadetblue;
  }
  
  #modal-cobrar{
    min-height: 11em;
    display: table-cell;
    vertical-align: middle 
  }
  #preparado{
    background-color: green;
    color: aliceblue;
  }
  #preparadoRapido{
    background-color: orange;
    color: aliceblue;
  }
  #preparadoAmarillo{
    background-color: orange;
    color: aliceblue;
  }
  #preparadoRojo{
    background-color: red;
    color: aliceblue;
  }
</style>
