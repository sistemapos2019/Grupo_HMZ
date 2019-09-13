<template>
  <card>
    <h4 slot="header" class="card-title">Editar Perfil</h4>
    <form>
      <div class="row">
        <div class="col-md-3">
          <base-input type="text"
                    label="Login"
                    placeholder=" "
                    v-model="user.username">
          </base-input>
        </div>
        <div class="col-md-3">
          <base-input type="Contrasenia"
                    label="Contraseña"
                    placeholder="Contraseña"
                    v-model="user.contrasenia">
          </base-input>
        </div>
        <div class="col-md-3">
          <base-input type="Pin"
                    label="Pin"
                    placeholder="Pin"
                    v-model="user.pin">
          </base-input>
        </div>
        <div class="col-md-3">
          <base-input type="Rol"
                    label="Rol"
                    placeholder="Rol"
                    v-model="user.rol">
          </base-input>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <base-input type="text"
                    label="Primer Nombre"
                    placeholder="Primer Nombre"
                    v-model="user.firstName">
          </base-input>
        </div>
        <div class="col-md-6">
          <base-input type="text"
                    label="Apellido"
                    placeholder="Apellido"
                    v-model="user.lastName">
          </base-input>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-info btn-fill float-right" @click.prevent="updateProfile">
          Actualizar Perfil
        </button>
      </div>
      <div class="clearfix"></div>
    </form>
  </card>
</template>
<script>
  import Card from 'src/components/Cards/Card.vue'

  export default {
    components: {
      Card
    },
    data () {
      return {
        user: {
          username: 'juan',
          contrasenia: 'juan',
          pin:'11111',
          firstName: 'Juan',
          lastName: 'Perez',
          rol: 'M'
        }
      }
    },
    methods: {
      updateProfile () {
        alert('Your data: ' + JSON.stringify(this.user))
      }
    }
  }

</script>
<style>

</style>
