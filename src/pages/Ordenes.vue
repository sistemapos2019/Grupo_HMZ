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
        </div>

        <div class="col-12">
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
        <div class="col-12">
          
        </div>
      </div>
    </div>
  
  
</template>
<script>
  import LTable from 'src/components/Table.vue'
  import ChartCard from 'src/components/Cards/ChartCard.vue'
  import StatsCard from 'src/components/Cards/StatsCard.vue'
  import Card from 'src/components/Cards/Card.vue'
  import CategoriaRepository from '../repositories/CategoriaRepository.js'
  var algo = new CategoriaRepository();
  var tableData = [{
    id: 1,
    name: 'Dakota Rice',
    
  }]
algo.getAll().then(r=>{
  return r.json() 
}).then(r=>{
  console.log(r);
  tableData =r;
  return r;
});
  const tableColumns = ['Id', 'Nombre']
  
  export default {
    components: {
      LTable,
      Card,
      ChartCard,
      StatsCard

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
