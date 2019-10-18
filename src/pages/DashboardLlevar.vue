<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <card class="card">
            <div class="row">
      </div>
            <div class="card-body">
              <h4 class="card-title">Ordenes Recientes</h4>
              <hr>
              <table id="user-table2" class="display table-bordered nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <tr>
                  <th>#</th>
                  <th>Mesero</th>
                  <th>Cliente</th>
                  <th>Total</th>
                  <th>Estado</th>
                  <th>Preparado</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            </div>
          </card>
        </div>
        <!--
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
        -->
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
  import DashboardParaLlevarRepository from '../repositories/DashboardParaLlevarRepository'
  import { async } from 'q';
  const tableColumns = ['IdOrden','Mesero','Cliente', 'Total', 'Estado','TiempoPreparado', 'Preparado']
  var tableData = []
  function llenarTabla(registrosData, dataTable2){
    let tableBody = document.querySelector('#tableRegistros');
    let contenido = '';
    registrosData.map(
      (registro) =>{
        let colorTiempoPreparado = '';
        
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

        if(registro.llevar == 1){
          dataTable2.row.add([
            registro.IdOrden, 
            registro.Mesero,
            registro.Cliente, registro.Total,
            registro.Estado, colorTiempoPreparado
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
        const dashboarData = (response, dataTable2) => {
          console.log(response);
          self.table1.data = response;
          llenarTabla(response, dataTable2);
          console.log(self.table1);
          tableData = response;
        }
        let data = new DashboardParaLlevarRepository;
        let response = data.findAll().then((response) =>{dashboarData(response,this.dataTable2)});
      },
    },
    mounted(){
       this.dataTable2 = $('#user-table2').DataTable({});
    },
    created(){
      this.traerRegistros();
    },
    data () {
      return {
        tableData, 
        tableColumns,
        dataTable2:null,
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
</style>
