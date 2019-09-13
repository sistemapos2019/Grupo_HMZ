<template>
  <div class="normal-case tracking-normal">
    <a href="#" @click.prevent="show" class="text-copy-primary uppercase hover:text-gray-600"> <i class="nc-icon nc-simple-add"></i>Agregar</a>
    <modal id="modalcobrar" name="modal-cobrar" @opened="opened" :adaptive="true" :height="350" :width="400">
        <div class="px-5 py-8">
          <h4 class="mb-4 uppercase tracking-wide text-xl">Agregar Producto</h4>
        <div >
          <div class="form-group mb-4">
            
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">Nombre:</label>
            <div class="">
              <input type="number" class="form-control" id="inputEfectivo" placeholder="Ingrese nombre" ref="efectivo">
            </div>
          </div>
          <div class="form-group row">
              <label for="staticCambio" class="col-4 col-form-label">Cantidad:</label>
              <div class="">
                <input type="number" min="1" step="1" class="form-control-plaintext" id="staticCambio" value="$3">
              </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary btn-sm active px-3">Agregar</button>
              <button class="btn btn-warning btn-sm active px-3">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
    </modal>
  </div>
</template>

<script>
export default {
  methods: {
    show() {
      this.$modal.show('modal-cobrar')
    },
    showRegister() {
      this.$modal.hide('modal-cobrar')
    },
    opened() {
      this.$refs.efectivo.focus()
    },
    hide() {
      this.$modal.hide('modal-cobrar')
    }
  }
}
</script>

<style >

</style>

