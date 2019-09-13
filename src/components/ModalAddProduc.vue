<template>
  <div class="normal-case tracking-normal">
    <a href="/#agregar" @click.prevent="show" class="text-copy-primary uppercase hover:text-gray-600"> Agregar</a>
    <modal id="modalagregar" name="modal-agregar" @opened="opened" :adaptive="true" :height="600" :width="400">
        <div class="px-5 py-8">
          <h4 class="mb-4 uppercase tracking-wide text-xl"> Agregar</h4>
        <form action="#" method="post">
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">Nombre:</label>
            <div class="">
             <select>
  <option value="prod">Producto1</option>
  <option value="prod">Producto2</option>
</select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">Precio:</label>
            <div class="">
              <input type="text" readonly class="form-control-plaintext  px-4" id="staticTotal" value="12.50">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">Inventario:</label>
            <div class="">
              <input type="text" readonly class="form-control-plaintext  px-4" id="staticTotal" value="10">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">Preparado:</label>
            <div class="">
              <input type="radio" name="prep" value="si"> Si <input type="radio" name="prep" value="no"> No<br>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">idCategoria:</label>
             <div class="">
             <select>
  <option value="cat">Categoria1</option>
  <option value="cat">Categoria2</option>
</select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary btn-sm active px-3">Agregar</button>
              <button class="btn btn-warning btn-sm active px-3">Cancelar</button>
            </div>
          </div>
        </form>
      </div>
    </modal>
  </div>
</template>

<script>
export default {
  methods: {
    show() {
      this.$modal.show('modal-agregar')
    },
    showRegister() {
      this.$modal.hide('modal-agregar')
    },
    opened() {
      this.$refs.nombre.focus()
    },
    hide() {
      this.$modal.hide('modal-agregar')
    }
  }
}
</script>

<style >

</style>

