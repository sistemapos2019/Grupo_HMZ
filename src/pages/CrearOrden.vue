<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          

        </div>

        <div class="col-12">
          
        </div>

        <div class="col-12">
          
        </div>

      </div>
    </div>
  </div>
</template>
<script>
  import LTable from 'src/components/Table.vue'
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
