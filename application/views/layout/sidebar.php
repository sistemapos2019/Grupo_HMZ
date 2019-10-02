
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
            <li class="active"><a href="<?= base_url();?>Productos"><i class="fa fa-circle-o"></i> Administración de productos</a></li>
            <li><a href="<?= base_url();?>Categorias"><i class="fa fa-circle-o"></i> Administración de categorias</a></li>
          </ul>
        </li>

        <li>
          <a href="<?= base_url();?>Estadisticas">
            <i class="fa fa-cog"></i> <span>Estadísticas</span>
            
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