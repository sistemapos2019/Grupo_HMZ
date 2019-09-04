<template>
  <div class="content">
    <div class="container-fluid">  
      <div class="row">
        <div  class="col-2">
          <ul class="navbar-nav ml-auto">
            <sidebar-link to="/admin/crear-orden">
            <i class="btn btn-success btn-lg" role="button">Editar</i>
          </sidebar-link>
          </ul>  
        </div>
        <div  class="">
           <ul class="navbar-nav ml-auto">
            <sidebar-link to="/admin/crear-orden">
            <i class="btn btn-warning btn-lg " role="button">Cobrar</i>
          </sidebar-link>
          </ul>
        </div>
        
        <div class="col-12">
          <card class="strpied-tabled-with-hover" body-classes="table-full-width table-responsive">
            <template slot="header">
              <h4 class="card-title">Ordenes Recientes</h4>
            </template>
            <l-table class="table-hover table-striped"
                     :columns="table1.columns"
                     :data="table1.data">
            </l-table>
          </card>
        </div>  
      </div>
    </div>
  </div>
</template>
<script>
  import ChartCard from 'src/components/Cards/ChartCard.vue'
  import StatsCard from 'src/components/Cards/StatsCard.vue'
  import LTable from 'src/components/Table.vue'
  import Card from 'src/components/Cards/Card.vue'
const tableColumns = ['IdOrden','Mesero', 'Cliente', 'Total', 'Estado','TiempoPreparado', 'Preparado']
const tableData = [{
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
   idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  },
  {
  idorden: 1,
   mesero : "Juan",
   cliente : "Carlos",
   total : 10.0,
   estado : "Pendiente",
   tiempopreparado : 5.00,
   preparado : "Sí"
  }]
  
  export default {
    components: {
      LTable,
      ChartCard,
      StatsCard,
      Card
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
  
</style>
