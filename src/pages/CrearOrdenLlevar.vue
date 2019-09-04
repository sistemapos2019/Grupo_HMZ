<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <card class="card">
            <div class="">
              <div class="card-body">
                <h5 class="card-title">Productos</h5>
              </div>
            </div>
          </card>
          </div>
          <div class="col-md-4">
            <card class="card">
              <div class="">
              <div class="card-body">
                <h5 class="card-title">Orden</h5>
              </div>
            </div>
            </card>
          </div>
      </div>
      </div>
      </div>
</template>
<script>
  import StatsCard from 'src/components/Cards/StatsCard.vue'
  import ChartCard from 'src/components/Cards/ChartCard.vue'
  import LTable from 'src/components/Table.vue'
  import Card from 'src/components/Cards/Card.vue'
  
  
  export default {
    components: {
      Card,
      ChartCard,
      StatsCard
    },
    
  }
</script>
<style>
</style>
