<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <card id="card" class="table-wrapper-scroll-y my-custom-scrollbar" body-classes="table-">
            <template slot="header">
              <h4 class="card-title">Parámetros</h4>
            </template>
            <l-table class="table-hover table-striped" :columns="table.columns" :data="table.data"></l-table>
          </card>
        </div>
      </div>
      <div class="row">
      
      </div>
    </div>
  </div>
</template>

<script>
import ChartCard from "src/components/Cards/ChartCard.vue";
import StatsCard from "src/components/Cards/StatsCard.vue";
import LTable from "src/components/Table.vue";
import Card from "src/components/Cards/Card.vue";
import ModalLogin from "@/components/ModalLogin.vue";
const tableColumns = ["nombre", "valor"];
const tableData = [
  {
    nombre: "ModoEntorno",
    valor:"CAJA"
  },
  {
   nombre: "Nombre",
    valor:"Cocina"
  },
  {
   nombre: "Descripcion",
    valor:"El punto del sabor"
  },
  {
   nombre: "Teléfono",
    valor:"7777-7777"
  },
  {
   nombre: "NIT",
    valor:"0000-000000-000-0"
  },
];

export default {
  components: {
    LTable,
    ChartCard,
    StatsCard,
    Card,
    ModalLogin
  },
  data() {
    return {
      table: {
        columns: [...tableColumns],
        data: [...tableData]
      }
    };
  }
};
</script>

<style>
#modal-login {
  min-height: 11em;
  display: table-cell;
  vertical-align: middle;
}
.btn-light{
    border-width: 0px;
    color: rgb(58, 57, 57);
}
.nc-icon{
    font-size: 15px;
    font-weight: bold; 
}
</style>