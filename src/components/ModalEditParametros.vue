<template>
  <div class="normal-case tracking-normal">
    <a href="/#editar" @click.prevent="show" class="text-copy-primary uppercase hover:text-gray-600"> Editar</a>
    <modal id="modaleditar" name="modal-editar" @opened="opened" :adaptive="true" :height="450" :width="400">
        <div class="px-5 py-8">
          <h4 class="mb-4 uppercase tracking-wide text-xl"> Editar</h4>
         <form action="#" method="post">
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">Parámetro:</label>
            <div class="">
               <select>
  <option value="prm">Parámetro1</option>
  <option value="prm">Parámetro2</option>
</select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEfectivo" class="px-3 col-form-label">Valor:</label>
            <div class="">
              <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" ref="nombre">
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
      this.$modal.show('modal-editar')
    },
    showRegister() {
      this.$modal.hide('modal-editar')
    },
    opened() {
      this.$refs.nombre.focus()
    },
    hide() {
      this.$modal.hide('modal-editar')
    }
  }
}
</script>

<style >

</style>

