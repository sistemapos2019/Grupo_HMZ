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
              <h4 class="card-title">Productos</h4>
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
                    <i class="card-body" role="button"><i class="nc-icon nc-settings-tool-66"></i><modalEditProduc id="modal-agregar"/></i>
                  </div>
                </sidebar-link>
              </ul>
            </div>
            <div class="">
              <ul class="navbar-nav ml-auto">
                <sidebar-link to="#">
                  <div class="">
                    <i class="card-body" role="button"> <i class="nc-icon nc-simple-add"></i> <modalAddProduc id="modal-agregar"/></i>
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
import ModalAddProduc from '@/components/ModalAddProduc.vue';
import ModalEditProduc from '@/components/ModalEditProduc.vue';
const tableColumns = [
  "id",
  "Nombre",
  "precio",
  "inventario",
  "preparado",
  "idcategoria"
];
const tableData = [
  {
    id: 1,
    nombre: "Carne Asada",
    precio: "4.50",
    inventario: "0",
    preparado: "si",
    idcategoria: "2"
  },
  {
    id: 2,
     nombre: "Soda Coca-Cola 12 onz",
    precio: "1.25",
    inventario: "46",
    preparado: "No",
    idcategoria: "3"
  }
];

export default {
  components: {
    LTable,
    ChartCard,
    StatsCard,
    Card,
    ModalAddProduc,
    ModalEditProduc
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
#modal-agregar{
    min-height: 11em;
    display: table-cell;
    vertical-align: middle
  }
</style>