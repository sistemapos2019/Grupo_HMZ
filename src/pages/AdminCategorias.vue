<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3">
        <input class="form-control" type="text" placeholder="Search" aria-label="Search"/>
        </div>
          <div class="col-sm-3">
        <button type="button" class="btn btn-light"><i class="nc-icon nc-bullet-list-67"></i> Sorft</button>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-8">
          <card id="card" class="table-wrapper-scroll-y my-custom-scrollbar" body-classes="table-">
            <template slot="header">
              <h4 class="card-title">Categorías</h4>
            </template>
            <l-table class="table-hover table-striped" :columns="table.columns" :data="table.data"></l-table>
          </card>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Opciones</h4>
            </div>
            <hr />
            <div class>
              <ul class="navbar-nav ml-auto">
                <sidebar-link to="#">
                  <div class="Edit">
                    <i class="card-body" role="button">
                      <i class="nc-icon nc-settings-tool-66"></i> Editar </i>
                  </div>
                </sidebar-link>
              </ul>
            </div>
            <div class>
              <ul class="navbar-nav ml-auto">
                <sidebar-link to="#">
                  <div class>
                   <i class="card-body" role="button"> <i class="nc-icon nc-simple-add"></i> Agregar </i> 
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
import ModalLogin from "@/components/ModalLogin.vue";
const tableColumns = ["id", "Nombre"];
const tableData = [
  {
    id: 1,
    nombre: "Entradas"
  },
  {
    id: 2,
    nombre: "Platos"
  },
  {
    id: 3,
    nombre: "Bebidas"
  }
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