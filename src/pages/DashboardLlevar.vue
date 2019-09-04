<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <card class="table-wrapper-scroll-y my-custom-scrollbar" body-classes="table-">
            <template slot="header">
              <h4 class="card-title">Ordenes Recientes</h4>
            </template>
            <l-table class="table-hover table-striped" :columns="table1.columns" :data="table1.data">
            </l-table>
          </card>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Opciones</h4>
            </div>
            <hr>
            <div class="">
              <ul class="navbar-nav ml-auto">
                <sidebar-link to="/admin/crear-orden">
                  <div class="">
                    <i class="card-body" role="button"><i class="nc-icon nc-settings-tool-66"></i> Editar Orden </i>
                  </div>
                </sidebar-link>
              </ul>
            </div>
            <div class="">
              <ul class="navbar-nav ml-auto">
                <sidebar-link to="/admin/crear-orden">
                  <div class="">
                    <i class="card-body" role="button"><i class="nc-icon nc-money-coins"></i> Cobrar Orden </i>
                  </div>
                </sidebar-link>
              </ul>
            </div>
          </div>
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
const tableData = [
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
