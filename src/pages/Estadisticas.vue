<template>
    <div class="content">      
      <div class="container-fluid">
         
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
            <hr>
            <br><br>
            <br><br>
          <div class="col-md-12">
              
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ventas Díarias</h4>
                  </div>
                  <hr>
                  <div class="">
                    
                        <GChart
                        type="LineChart"
                        :data="chartData"
                        :options="chartOptions"
                      />
                  
                  </div>
                </div>
         
          </div>
          <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ventas Semanales</h4>
                </div>
                <hr>
                <div class="">
                    <l-table class="table-hover table-striped" :columns="table1.columns" :data="table1.data">
                      </l-table>
                </div>
              </div>
            </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ventas Mensuales</h4>
              </div>
              <hr>
              <div class="">
                  <GChart
                  type="ColumnChart"
                  :data="chartDataMes"
                  :options="chartOptions"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
   
  <script>
  import { GChart } from 'vue-google-charts'
  import LTable from 'src/components/Table.vue' 
  import Datepicker from 'vuejs-datepicker';
  const tableColumns = ['Fecha', 'Total']
  const tableData = [
    {
     fecha: "01-09-2019",
     total : "$200",
      
    },
    {
     fecha: "02-09-2019",
     total : "$100",
      
    },
    {
     fecha: "03-09-2019",
     total : "$60",
      
    },
    {
     fecha: "04-09-2019",
     total : "$200",
      
    },
    {
     fecha: "05-09-2019",
     total : "$250",
      
    },
    {
     fecha: "06-09-2019",
     total : "$200",
      
    },
    {
     fecha: "07-09-2019",
     total : "$130",
      
    },
  ]
    
  export default {
    components: {
      LTable,
      GChart,
      Datepicker
    },
    methods:{
      
    },
    data () {
      return {
        table1: {
            columns: [...tableColumns],
            data: [...tableData]
          },
        // Array will be automatically processed with visualization.arrayToDataTable function
        chartData: [
          [  'Fecha', 'Total $'],
          [  '01-09-2019', 200],
          [  '02-09-2019', 100],
          [  '03-09-2019', 60],
          [  '04-09-2019', 200],
          [  '05-09-2019', 250],
          [  '06-09-2019', 200],
          [  '07-09-2019', 130],
       
  
  
          
        ],
        chartDataMes: [
          [  'Mes', 'Total $'],
          [  'Enero', 2000],
          [  'Febrero', 1000],
          [  'Marzo', 600],
          [  'Abril', 2000],
          [  'Mayo', 2500],
          [  'Junio', 2000],
          [  'Julio', 1300],
          [  'Agosto',600],
          [  'Septiembre', 1047]
  
  
          
        ],
        chartOptions: {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        }
      }
    }
  }
  </script> 
  <style>
  
  </style>