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
        <div class="col-md-12">
          <card id="card" class="table-wrapper-scroll-y my-custom-scrollbar" body-classes="table-">
            <template slot="header">
              <h4 class="card-title">Compras</h4>
            </template>
            <l-table class="table-hover table-striped" :columns="table.columns" :data="table.data"></l-table>
          </card>
        </div>
      </div>
      <div class="row">
          <div class="col-md-12">
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
                      <i class="nc-icon nc-settings-tool-66"></i><modalEditCompras id="modal-agregar"/></i>
                  </div>
                </sidebar-link>
              </ul>
            </div>
            <div class>
              <ul class="navbar-nav ml-auto">
                <sidebar-link to="#">
                  <div class>
                   <i class="card-body" role="button"> <i class="nc-icon nc-simple-add"></i><modalAddCompras id="modal-agregar"/> </i> 
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
import ModalEditCompras from '@/components/ModalEditCompras.vue';
import ModalAddCompras from '@/components/ModalAddCompras.vue';

const tableColumns = ["idcompra", "idproducto","cantidad","preciounitario"];
const tableData = [
  {
    idcompra: "1",
    idproducto: "1",
    cantidad:"10",
    preciounitario:"5.50"
  },
  {
    idcompra: "2",
    idproducto: "2",
    cantidad:"20",
    preciounitario:"10"
  }
];

export default {
  components: {
    LTable,
    ChartCard,
    StatsCard,
    Card,
    ModalEditCompras,
    ModalAddCompras
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
#modal-agregar {
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