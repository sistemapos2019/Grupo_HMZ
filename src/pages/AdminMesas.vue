<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <card id="card" class="table-wrapper-scroll-y my-custom-scrollbar" body-classes="table-">
            <template slot="header">
              <h4 class="card-title">Mesas</h4>
            </template>
            <l-table
              class="table-hover table-striped"
              :columns="table.columns"
              :data="table.data"
            ></l-table>
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
                <sidebar-link to="#">
                  <div class="Edit">
                    <i class="card-body" role="button"><i class="nc-icon nc-settings-tool-66"></i> Editar Mesa </i>
                  </div>
                </sidebar-link>
              </ul>
            </div>
            <div class="">
              <ul class="navbar-nav ml-auto">
                <sidebar-link to="#">
                  <div class="">
                    <i class="card-body" role="button"> <i class="nc-icon nc-simple-add"></i> Agregar Mesas </i>
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
import ChartCard from "src/components/Cards/ChartCard.vue";
import StatsCard from "src/components/Cards/StatsCard.vue";
import LTable from "src/components/Table.vue";
import Card from "src/components/Cards/Card.vue";
const tableColumns = [
  "id",
  "Mesa"
];
const tableData = [
  {
    id: 1,
    mesa: "Uno"
  },
  {
    id: 2,
    mesa: "Dos"
  },
  {
    id: 3,
    mesa: "Tres"
  },
  {
    id: 4,
    mesa: "Cuatro"
  },
  {
    id: 5,
    mesa: "Cinco"
  }
];

export default {
  components: {
    LTable,
    ChartCard,
    StatsCard,
    Card
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

</style>