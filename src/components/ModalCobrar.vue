<template>
  <div class="normal-case tracking-normal">
    <a href="/#cobrar" @click.prevent="show" class="text-copy-primary uppercase hover:text-gray-600">Cobrar Orden</a>
    <modal id="modalcobrar" name="modal-cobrar" @opened="opened" :adaptive="true" :height="350" :width="400">
        <div class="px-5 py-8">
          <h4 class="mb-4 uppercase tracking-wide text-xl">Cobrar Orden</h4>
        <form action="#" method="post">
          <div class="form-group mb-4">
              <label for="staticTotal" class="block font-normal uppercase tracking-wide text-xs mb-1">Total:</label>
                <input type="text" readonly class="form-control-plaintext  px-4" id="staticTotal" value="$12.50">
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">Efectivo:</label>
            <div class="">
              <input type="number" class="form-control" id="inputEfectivo" placeholder="Efectivo Recibido" ref="efectivo">
            </div>
          </div>
          <div class="form-group row">
              <label for="staticCambio" class="col-3 col-form-label">Cambio:</label>
              <div class="">
                <input type="text" readonly class="form-control-plaintext" id="staticCambio" value="$3">
              </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary btn-sm active px-3">Imprimir</button>
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

