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
                <span> 3</span>
                <!--
                <form>
                  <div class="form-row">
                    <div class="">
                      <input type="text" class="form-control" placeholder="Mesa">
                    </div>
                    <div class="px-1">
                      <input type="text" class="form-control" placeholder="Mesero">
                    </div>
                    <div class="px-1">
                      <input type="text" class="form-control" placeholder="Cliente">
                    </div>
                  </div>
                </form>
                -->
              </div>
              <hr>
              <form>
                <div class="form-row">
                    <div class="">
                      <button type="button" class="btn btn-primary btn-sm">Platillos</button>
                    </div>
                    <div class="px-1">
                      <button type="button" class="btn btn-primary btn-sm">Postres</button>
                    </div>
                    <div class="px-1">
                      <button type="button" class="btn btn-primary btn-sm">Bebidas Frías</button>
                    </div>
                    <div class="px-1">
                      <button type="button" class="btn btn-primary btn-sm">Entradas</button>
                    </div>
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
                <!--
                <div class="px-4">
                  <input class="form-check-input" type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                  Orden Para Llevar
                </label>
                </div>
                <hr>
                -->
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
  
  
  export default {
    components: {
      Card,
      ChartCard,
      StatsCard
    },
    
  }
</script>
<style>
</style>
