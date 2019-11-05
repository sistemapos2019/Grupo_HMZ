
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú</li>
        <li>
        <a href="<?= base_url();?>Dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
        </li>
        <li>
        <a href="<?= base_url();?>DashboardLlevar">
            <i class="fa fa-motorcycle"></i> <span>Dashboard Llevar</span>
            
          </a>
        </li>
        <?php if($configuraciones['modoEntorno']=="CAJA"){?>
          <script>
        
        $(document).ready(r=>{
          
         $("#modo").html("Modo Caja");
        });
               </script>
        <li class="treeview">
          <a href="<?= base_url();?>assets/#">
            <i class="fa  fa-laptop"></i> <span>Administración</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?= base_url();?>Productos/index"><i class="fa fa-circle-o"></i> Administración de productos</a></li>
            <li><a href="<?= base_url();?>Categorias"><i class="fa fa-circle-o"></i> Administración de categorias</a></li>
            <li><a href="<?= base_url();?>Mesas/index"><i class="fa fa-circle-o"></i> Administración de mesas</a></li>
            <li><a href="<?= base_url();?>Usuarios/index"><i class="fa fa-circle-o"></i> Administración de usuarios</a></li>
            <li><a href="<?= base_url();?>Parametros/index"><i class="fa fa-circle-o"></i> Administración de parametros</a></li>
            <li><a href="<?= base_url();?>Compras/index"><i class="fa fa-circle-o"></i> Administración de compras</a></li>
            <li><a href="<?= base_url();?>Bitacoras/index"><i class="fa fa-circle-o"></i> Administración de bitacora</a></li>
          </ul>
        </li>

        <li>
        <a href="<?= base_url();?>LibroCompras/index">
            <i class="fa fa-book"></i> <span>Libro Compras</span>
            
          </a>
        </li>

        <li>
        <a href="<?= base_url();?>LibroVentas/index">
            <i class="fa fa-book"></i> <span>Libro Ventas</span>
            
          </a>
        </li>

        <li>
        <a href="<?= base_url();?>Inventario">
            <i class="fa fa-linode"></i> <span>Inventario</span>
            
          </a>
        </li>

        <li>
          <a href="<?= base_url();?>Estadisticas">
            <i class="fa fa-bar-chart"></i> <span>Estadísticas</span>
            
          </a>
        </li>
        
        <li>
          <a href="<?= base_url();?>configuraciones">
            <i class="fa fa-cog"></i> <span>Configuración</span>
            
          </a>
        </li>
        
        <?php }else{ ?>
          <script>
        
        $(document).ready(r=>{
         $("#btnCobrar").remove();
         $("#modo").html("Modo Mesa");
        });
               </script>
        <?php }?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>