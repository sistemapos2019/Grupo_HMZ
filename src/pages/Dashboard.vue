<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
       <!-- <div class="col-md-3">
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
                    <i class="card-body" role="button"><i class="nc-icon nc-money-coins"></i>
                      <modal-cobrar id="modal-cobrar" /></i>
                  </div>
                </sidebar-link>
              </ul>
            </div>
          </div>
        </div> -->
        <div class="col-md-12">
          <card class="card">
          <div class="row">
          </div>
          <div class="card-body">
            <h4 class="card-title">Ordenes Recientes</h4>
            <div class="container">
              <div class="row">
                <div class="col-">
              <ul class="navbar-nav ml-auto">
                <sidebar-link to="/admin/login-modificar">
                  <div class="">
                    <button class="btn btn-primary btn-sm">Modificar Orden</button>
                  </div>
                </sidebar-link>
              </ul>
            </div>
            <div class="px-3">
              <ul class="navbar-nav ml-auto">
                <sidebar-link to="#">
                  <div class="">
                    <button class="btn btn-primary btn-sm">
                      <modal-cobrar id="modal-cobrar" /></button>
                  </div>
                </sidebar-link>
              </ul>
            </div>
              </div>
            </div>
            <hr>
            <table id="user-table" class="display table-bordered nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Mesa</th>
                  <th>Mesero</th>
                  <th>Cliente</th>
                  <th>Total</th>
                  <th>Estado</th>
                  <th>Preparado</th>
                  <th>Rapido</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
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
  import ModalCobrar from '@/components/ModalCobrar.vue'
  import DashboardPrincipalRepository from '../repositories/DashboardPrincipalRepository'
  import { async } from 'q';
  const tableColumns = ['#','Mesa','Mesero', 'Cliente', 'Total', 'Estado','llevar','Tiempo Preparado','Tiempo Rapido']
  var tableData = []
 function llenarTabla(registrosData, dataTable){
   let tableBody = document.querySelector('#tableRegistros');
   let contenido = '';
   registrosData.map(
     (registro) =>{
       let colorTiempoPreparado = '';
       let colorTiempoRapido = '';

       switch(registro.Preparado){
         case "ROJO":
           colorTiempoPreparado = `<div style="background-color:red">${registro.TiempoPreparado}</div>`
           break;
          case "AMARILLO":
             colorTiempoPreparado = `<div style="background-color:yellow">${registro.TiempoPreparado}</div>`
            break;
          case "VERDE":
            colorTiempoPreparado = `<div style="background-color:green">${registro.TiempoPreparado}</div>`
            break;
       }
       switch(registro.Rapido){
         case "ROJO":
           colorTiempoRapido = `<div style="background-color:red">${registro.TiempoRapido}</div>`
           break;
          case "AMARILLO":
           colorTiempoRapido = `<div style="background-color:yellow">${registro.TiempoRapido}</div>`
           break;
          case "VERDE":
            colorTiempoRapido = `<div style="background-color:green">${registro.TiempoRapido}</div>`
            break;
       }       
       if(registro.llevar == 0){
         dataTable.row.add([
           registro.IdOrden, registro.Mesa, 
           registro.Mesero, registro.Cliente, 
           registro.Total, registro.Estado, 
          colorTiempoPreparado, 
           colorTiempoRapido
         ]).draw(true);
       }
     }
   )
 }
  export default {
    components: {
      LTable,
      ChartCard,
      StatsCard,
      Card,
      ModalCobrar
    },
    methods:{
      traerRegistros: function(){
        let self = this
        let request = ''
        const dashboarData = (response, dataTable) => {
          console.log(response);
          self.table1.data = response;
          llenarTabla(response, dataTable);
          console.log(self.table1);
          tableData = response;
        }
        let data = new DashboardPrincipalRepository;
        let response = data.findAll().then((response) =>{dashboarData(response,this.dataTable)});
        },
    },
    mounted(){
      this.dataTable = $('#user-table').DataTable({});
    },
    created(){
      this.traerRegistros();
    },
    data () {
      return {
        tableData, 
        tableColumns,
        dataTable:null,
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
