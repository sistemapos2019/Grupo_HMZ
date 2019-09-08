<template>
  <div class="container">
  <div class="row">
    <div class="col">
     <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/mesas">
            <i  class="btn btn-success btn-sm" role="button">Mesas</i>
          </sidebar-link>
          </ul>
    </div>
    <div class="col">
     <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/productos">
            <i class="btn btn-primary btn-sm" role="button">Productos</i>
          </sidebar-link>
          </ul>
    </div>
    <div class="col">
      <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/usuario-rol">
            <i class="btn btn-primary btn-sm" role="button">Usuarios y Roles</i>
          </sidebar-link>
          </ul>
    </div>
  </div>
  <div class="row">
    <div class="col">
     <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/categorias">
            <i  class="btn btn-success btn-sm" role="button">Categorías</i>
          </sidebar-link>
          </ul>
    </div>
    <div class="col">
     <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/compras">
            <i class="btn btn-primary btn-sm" role="button">Compras</i>
          </sidebar-link>
          </ul>
    </div>
    <div class="col">
      <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/parametros">
            <i class="btn btn-primary btn-sm" role="button">Parámetros</i>
          </sidebar-link>
          </ul>
    </div>
  </div>
</div>
</template>

<script>
export default {};
</script>

<style>
</style>