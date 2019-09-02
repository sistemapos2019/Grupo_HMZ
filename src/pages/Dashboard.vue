<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <stats-card>
            <div slot="header" class="icon-warning">
              <i class="nc-icon nc-chart-bar-32 text-success"></i>
            </div>
            <div slot="content">
              <p class="card-category">Ordenes de Hoy</p>
              <h4 class="card-title">105</h4>
            </div>
            <div slot="footer">
              <!--<i class="fa fa-refresh"></i>Updated now -->
            </div>
          </stats-card>
        </div>

        <div class="col-xl-3 col-md-6">
          <stats-card>
            <div slot="header" class="icon-success">
              <i class="nc-icon nc-money-coins text-danger"></i>
            </div>
            <div slot="content">
              <p class="card-category">Sin Cobrar</p>
              <h4 class="card-title">25</h4>
            </div>
            <div slot="footer">
             <!-- <i class="fa fa-calendar-o"></i>Last day -->
            </div>
          </stats-card>
        </div>

        <div class="col-xl-3 col-md-6">
          <stats-card>
            <div slot="header" class="icon-danger">
              <i class="nc-icon nc-circle text-warning"></i>
            </div>
            <div slot="content">
              <p class="card-category">En Cocina</p>
              <h4 class="card-title">23</h4>
            </div>
            <div slot="footer">
            <!-- <i class="fa fa-clock-o"></i>Last day -->
            </div>
          </stats-card>
        </div>

        <div class="col-xl-3 col-md-6">
          <stats-card>
            <div slot="header" class="icon-info">
              <i class="nc-icon nc-send text-primary"></i>
            </div>
            <div slot="content">
              <p class="card-category">Para Llevar</p>
              <h4 class="card-title">10</h4>
            </div>
            <div slot="footer">
              <!-- <i class="fa fa-refresh"></i>Updated now -->
            </div>
          </stats-card>
        </div>
        <div class="col-12">
          <card class="strpied-tabled-with-hover"
                body-classes="table-full-width table-responsive"
          >
            <template slot="header">
              <h4 class="card-title">Ordenes Recientes</h4>
              <p class="card-category"></p>
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
const tableColumns = ['id','llevar', 'cliente', 'total', 'propina','estado','tiempopreparado', 'formapago']
const tableData = [{
   id: 1,
   idmesa: 1,
   idusuario: 0,
   fecha: "2019-09-01T23:47:29.863Z",
   llevar : 0,
   estado: "Entregado",
   observacion: "string",
   tiempopreparado: "2019-09-01T23:47:29.863Z",
   tiemporapido : "2019-09-01T23:47:29.863Z",
   total : 13.50,
   propina : 2.0,
   formapago : "Cash",
   cliente : "Juan Carlos"
  },
  {
   id: 2,
   idmesa: 2,
   idusuario: 0,
   fecha: "2019-09-01T23:47:29.863Z",
   llevar : 0,
   estado: "Entregado",
   observacion: "string",
   tiempopreparado: "2019-09-01T23:47:29.863Z",
   tiemporapido : "2019-09-01T23:47:29.863Z",
   total : 14.50,
   propina : 1.0,
   formapago : "Cash",
   cliente : "Erick Adonay"
  },
  {
    id: 3,
   idmesa: 3,
   idusuario: 0,
   fecha: "2019-09-01T23:47:29.863Z",
   llevar : 0,
   estado: "Entregado",
   observacion: "string",
   tiempopreparado: "2019-09-01T23:47:29.863Z",
   tiemporapido : "2019-09-01T23:47:29.863Z",
   total : 15.50,
   propina :3.0,
   formapago : "Tarjeta",
   cliente : "Danielo Cerna"
  },
  {
   id: 4,
   idmesa: 4,
   idusuario: 0,
   fecha: "2019-09-01T23:47:29.863Z",
   llevar : 1,
   estado: "Retrasado",
   observacion: "string",
   tiempopreparado: "2019-09-01T23:47:29.863Z",
   tiemporapido : "2019-09-01T23:47:29.863Z",
   total : 17.50,
   propina : 5.0,
   formapago : "Tarjeta",
   cliente : "Brayam Hernandez"
  },
  {
    id: 5,
   idmesa: 0,
   idusuario: 0,
   fecha: "2019-09-01T23:47:29.863Z",
   llevar : 0,
   estado: "Pendiente",
   observacion: "string",
   tiempopreparado: "2019-09-01T23:47:29.863Z",
   tiemporapido : "2019-09-01T23:47:29.863Z",
   total : 19.50,
   propina : 1.0,
   formapago : "Cash",
   cliente : "Juana Arevalo"
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

</style>
