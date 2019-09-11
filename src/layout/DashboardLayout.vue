<template>
  <div class="wrapper">
    <side-bar>
      <mobile-menu slot="content"></mobile-menu>
      <sidebar-link to="/admin/dashboard">
        <i class="nc-icon nc-chart-pie-35"></i>
        <p>Dashboard</p>
      </sidebar-link>
      <sidebar-link to="/admin/dashboard-llevar">
        <i class="nc-icon nc-spaceship"></i>
        <p>Para Llevar</p>
      </sidebar-link>
      <sidebar-link to="/admin/admin">
        <i class="nc-icon nc-settings-gear-64"></i>
        <p>Administración</p>
      </sidebar-link>
      <sidebar-link to="/admin/Ordenes">
        <i class="nc-icon nc-notes"></i>
        <p>Ordenes</p>
      </sidebar-link>
     <!-- <hr style="border-color:gray;"> -->
      <sidebar-link to="/admin/estadisticas">
        <i class="nc-icon nc-chart-bar-32"></i>
        <p>Estadísticas</p>
      </sidebar-link>
      
      <sidebar-link to="/admin/icons">
        <i class="nc-icon nc-atom"></i>
        <p>Confirguración</p>
      </sidebar-link>
      
    </side-bar>
    <div class="main-panel">
      <top-navbar></top-navbar>
      <dashboard-content @click="toggleSidebar">
      </dashboard-content>
      <content-footer></content-footer>
    </div>
  </div>
</template>
<style lang="scss">

</style>
<script>
  import TopNavbar from './TopNavbar.vue'
  import ContentFooter from './ContentFooter.vue'
  import DashboardContent from './Content.vue'
  import MobileMenu from './MobileMenu.vue'
  export default {
    components: {
      TopNavbar,
      ContentFooter,
      DashboardContent,
      MobileMenu
    },
    methods: {
      toggleSidebar () {
        if (this.$sidebar.showSidebar) {
          this.$sidebar.displaySidebar(false)
        }
      }
    }
  }

</script>
