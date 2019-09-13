<template>
  <div class="normal-case tracking-normal">
    <a href="/#agregar" @click.prevent="show" class="text-copy-primary uppercase hover:text-gray-600"> Agregar</a>
    <modal id="modalagregar" name="modal-agregar" @opened="opened" :adaptive="true" :height="500" :width="450">
        <div class="px-5 py-8">
          <h4 class="mb-4 uppercase tracking-wide text-xl"> Agregar</h4>
        <form action="#" method="post">
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">Nombre:</label>
            <div class="">
              <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" ref="nombre">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">Apellido:</label>
            <div class="">
              <input type="text" class="form-control" id="inputNombre" placeholder="Apellido" ref="apellido">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">Login:</label>
            <div class="">
              <input type="text" class="form-control" id="inputNombre" placeholder="Login" ref="login">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">contraseña:</label>
            <div class="">
              <input type="text" class="form-control" id="inputNombre" placeholder="contraseña" ref="contraseña">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">pin:</label>
            <div class="">
              <input type="text" class="form-control" id="inputNombre" placeholder="pin" ref="pin">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">rol:</label>
            <div class="">
              <input type="text" class="form-control" id="inputNombre" placeholder="rol" ref="rol">
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

