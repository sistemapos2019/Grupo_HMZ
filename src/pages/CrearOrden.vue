<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <card class="card">
            <div class="card-body">
              <h4 class="card-title">Productos</h4>
              <hr>
              <div class="Categorias">
                <label for="numeroOrden">Orden:</label>
                <span id="numeroDeOrden"> </span>
              <div class="row">
                <div class="col-md-4">
                  <Label for="nombre">Nombre</Label>
                  <input type="text" name="nombre" placeholder="Nombre del cliente" id="nombre" class="form-control">
                </div>
                <div class="col-md-4">
                  <Label for="mesa">Mesa</Label>
                  <select name="mesa" id="mesa" class="form-control">
                    <option value="">--Seleccione Mesa--</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <Label for="mesero">Mesero</Label>
                  <input placeholder="Nombre del mesero" type="text" class="form-control">
                </div>
              </div>
              </div>
              <hr>
              <form>
                <div class="form-row" id="seccionCategorias">
                    
                </div>
              </form>
              <hr>
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Coca-Cola</td>
                    <td>$0.60</td>
                    <td>
                      <div class="row">
                        <button class="btn btn-primary btn-sm active">-</button>
                        <h6 class="px-1 py-2">1</h6>
                        <button class="btn btn-primary btn-sm active">+</button>
                      </div>
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm active">Añadir</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Pepsi</td>
                    <td>$0.50</td>
                    <td>
                      <div class="row">
                        <button class="btn btn-primary btn-sm active">-</button>
                        <h6 class="px-1 py-2">1</h6>
                        <button class="btn btn-primary btn-sm active">+</button>
                      </div>
                      
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm active">Añadir</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>7up</td>
                    <td>$0.60</td>
                    <td>
                      <div class="row">
                        <button class="btn btn-primary btn-sm active">-</button>
                        <h6 class="px-1 py-2">1</h6>
                        <button class="btn btn-primary btn-sm active">+</button>
                      </div>
                      
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm active">Añadir</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Fanta</td>
                    <td>$0.60</td>
                    <td>
                      <div class="row">
                        <button class="btn btn-primary btn-sm active">-</button>
                        <h6 class="px-1 py-2">1</h6>
                        <button class="btn btn-primary btn-sm active">+</button>
                      </div>
                      
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm active">Añadir</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Colashampan</td>
                    <td>$0.50</td>
                    <td>
                      <div class="row">
                        <button class="btn btn-primary btn-sm active">-</button>
                        <h6 class="px-1 py-2">1</h6>
                        <button class="btn btn-primary btn-sm active">+</button>
                      </div>
                      
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm active">Añadir</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </card>
        </div>
        <div class="col-md-4">
          <card class="card">
            <div class="">
              <div class="card-body">
                <h4 class="card-title">Orden</h4>
                <hr>
                <div class="px-4">
                  <input class="form-check-input" type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                  Orden Para Llevar
                </label>
                </div>
                <hr>
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Producto</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Coca-Cola</td>
                      <td>
                      <div class="row">
                        <button class="btn btn-primary btn-sm active">-</button>
                        <h6 class="px-1 py-2">1</h6>
                        <button class="btn btn-primary btn-sm active">+</button>
                      </div>
                    </td>
                    <td>
                      $0.60
                    </td>
                    </tr>
                    <tr>
                      <td>Pepsi</td>
                      <td>
                      <div class="row">
                        <button class="btn btn-primary btn-sm active">-</button>
                        <h6 class="px-1 py-2">1</h6>
                        <button class="btn btn-primary btn-sm active">+</button>
                      </div>
                    </td>
                    <td>
                      $0.50
                    </td>
                    </tr>
                  </tbody>
                </table>
                <label for="">Comentarios</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                <hr>
                <h4>
                  Total: $1.10
                </h4>
                <hr>
                <div class="row">
                  <div class="px-4">
                  <button class="btn btn-primary btn-sm active">Guardar Orden</button>
                  </div>
                  <div class="px-3">
                    <button class="btn btn-warning btn-sm active">Cobrar Orden</button>
                  </div>
                  
                </div>
                </div>
            </div>
          </card>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import StatsCard from 'src/components/Cards/StatsCard.vue'
  import ChartCard from 'src/components/Cards/ChartCard.vue'
  import LTable from 'src/components/Table.vue'
  import Card from 'src/components/Cards/Card.vue'
  let ultimoId;
  let categorias;
  let mesas;
  async function obtenerUltimoId() {
    let response = await fetch('http://localhost/dsi-backend/api/ordenes/ObtenerUltimoId');
    let data = await response.json()
    return data;
  }
  async function obtenerCategorias() {
    let response = await fetch('http://localhost/dsi-backend/api/ordenes/obtenerCategorias');
    let data = await response.json()
    return data;
  }
  async function obtenerMesas() {
    let response = await fetch('http://localhost/dsi-backend/api/ordenes/obtenerMesas');
    let data = await response.json()
    return data;
  }
  

  
  export default {
  methods:{
    consultarUltimoId(){
      obtenerUltimoId().then(r => {
        this.ultimoId = r;
        document.querySelector("#numeroDeOrden").innerHTML=`${this.ultimoId.id}`;
      });
    },
    consultarMesas(){
     
      obtenerMesas().then(r => {
        this.mesas = r;
        let opciones= `<option value="">--Seleccione Mesa--</option>`;
        this.mesas.map(mesa=>{
          opciones+=`<option value="${mesa.id}">${mesa.mesa}</option>`;
        });
        let mesaSelect = document.querySelector("#mesa");
        mesaSelect.innerHTML=opciones;
      });
    },
    consultarCategorias(){
      obtenerCategorias().then(r => {
        this.categorias = r;
        let opciones="";
        this.categorias.map(categoria=>{
          opciones+=`<div class="px-1">
                      <button type="button" onclick="javascript:obtenerProductos('${categoria.id}')" class="btn btn-primary btn-sm">${categoria.nombre}</button>
                    </div>`;
        });
        let seccionCategorias = document.querySelector("#seccionCategorias");
        seccionCategorias.innerHTML=opciones;
      });
    }
  },
  created(){
    this.consultarUltimoId()
    this.consultarCategorias()
    this.consultarMesas()
  },
  components: {
      Card,
      ChartCard,
      StatsCard
    },
    
  }
</script>
<style>
</style>
