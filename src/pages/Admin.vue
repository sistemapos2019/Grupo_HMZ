<template>
  <div class="container">
    <br>
    <br>
  <div class="row">
    <div class="col">
     <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/mesas">
                  <button class="btn btn-primary btn-sty">Mesas<br><i class="nc-icon nc-istanbul"></i></button>
          </sidebar-link>
          </ul>
    </div>
    <div class="col">
     <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/productos">
            <button class="btn btn-primary btn-sty">Productos<br><i class="nc-icon nc-grid-45"></i></button>
          </sidebar-link>
          </ul>
    </div>
    <div class="col">
      <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/usuario-rol">
            <button class="btn btn-primary btn-sty">Usuarios / Rol<br><i class="nc-icon nc-badge"></i></button>
          </sidebar-link>
          </ul>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col">
     <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/categorias">
             <button class="btn btn-primary btn-sty">Categorias<br><i class="nc-icon nc-single-copy-04"></i></button>
          </sidebar-link>
          </ul>
    </div>
    <div class="col">
     <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/compras">
          <button class="btn btn-primary btn-sty">Compras<br><i class="nc-icon nc-cart-simple"></i></button>
          </sidebar-link>
          </ul>
    </div>
    <div class="col">
      <ul class="navbar-nav ml-auto">
          <sidebar-link to="/admin/admin/parametros">
            <button class="btn btn-primary btn-sty">Parámetros<br><i class="nc-icon nc-puzzle-10"></i></button>
          </sidebar-link>
          </ul>
    </div>
  </div>
  <br>
  <br>
</div>
</template>

<script>
export default {};
</script>

<style>
.btn-sty{
  width: 180px;
  height: 80px;
}

.nc-icon{
  font-size: 25px;
}

.col{
left: 50px;
}



</style>