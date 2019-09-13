<template>
  <div class="normal-case tracking-normal">
    <a href="/#editar" @click.prevent="show" class="text-copy-primary uppercase hover:text-gray-600"> Editar</a>
    <modal id="modaleditar" name="modal-editar" @opened="opened" :adaptive="true" :height="250" :width="400">
        <div class="px-5 py-8">
          <h4 class="mb-4 uppercase tracking-wide text-xl"> Editar</h4>
        <form action="#" method="post">
          <div class="form-group mb-4">
              <label for="staticTotal" class="block font-normal uppercase tracking-wide text-xs mb-1">Nombre:</label>
                <input type="text" class="form-control" id="inputEfectivo" placeholder="Nombre" value="DOS">
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary btn-sm active px-3">Guardar</button>
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
      this.$modal.show('modal-editar')
    },
    showRegister() {
      this.$modal.hide('modal-editar')
    },
    opened() {
      this.$refs.efectivo.focus()
    },
    hide() {
      this.$modal.hide('modal-editar')
    }
  }
}
</script>

<style >

</style>

