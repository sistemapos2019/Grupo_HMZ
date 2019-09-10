<template>
  <div class="normal-case tracking-normal">
    <a href="/#cobrar" @click.prevent="show" class="text-copy-primary uppercase hover:text-gray-600">Crear Orden</a>
    <modal name="modal-cobrar" @opened="opened" :adaptive="true" :height="440" :width="400">
      <div class="px-10 py-8">
       
      </div>
    </modal>
  </div>
</template>

<script>
export default {
  methods: {
    show() {
      this.$modal.show('modal-cobrar',{
        title: 'Alert!',
  text: 'You are too awesome',
  buttons: [
    {
      title: 'Deal with it',
      handler: () => { alert('Woot!') }
    },
    {
      title: '',       // Button title
      default: true,    // Will be triggered by default if 'Enter' pressed.
      handler: () => {} // Button click handler
    },
    {
      title: 'Close'
    }
 ]
      })
    },
    showRegister() {
      this.$modal.show('modal-register')
      this.$modal.hide('modal-cobrar')
    },
    opened() {
      this.$refs.email.focus()
    },
    hide() {
      this.$modal.hide('modal-cobrar')
    }
  }
}
</script>

