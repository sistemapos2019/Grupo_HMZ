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
            <iframe src="http://localhost/jupiter/Productos/crud" id="embebido" frameBorder="0"></iframe>
          </card>
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

  #card{
    height: 500px;
  }
  #embebido{
    width: 100%;
    height: 100%;

  }
</style>