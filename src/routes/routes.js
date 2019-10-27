import DashboardLayout from '../layout/DashboardLayout.vue'
// GeneralViews
import NotFound from '../pages/NotFoundPage.vue'

// Admin pages
import Dashboard from 'src/pages/Dashboard.vue'
import DashboardLlevar from 'src/pages/DashboardLlevar.vue'
import CrearOrden from 'src/pages/CrearOrden.vue'
import CrearOrdenLlevar from 'src/pages/CrearOrdenLlevar.vue'
import ModificarOrden from 'src/pages/ModificarOrden.vue'
import Ordenes from 'src/pages/Ordenes.vue'
import Admin from 'src/pages/Admin.vue'
import AdminMesas from 'src/pages/AdminMesas.vue'
import AdminUsuarioRol from 'src/pages/AdminUsuarioRol.vue'
import AdminProductos from 'src/pages/AdminProductos.vue'
import AdminCategorias from 'src/pages/AdminCategorias.vue'
import LibroCompras from 'src/pages/LibroCompras.vue'
import LibroVentas from 'src/pages/LibroVentas.vue'
import AdminCompras from 'src/pages/AdminCompras.vue'
import AdminParametros from 'src/pages/AdminParametros.vue'
import Estadisticas from 'src/pages/Estadisticas.vue'
import Inventario from 'src/pages/Inventario.vue'
import AdminBitacoras from 'src/pages/AdminBitacoras.vue'
import Login from 'src/pages/Login.vue'
import LoginModificar from 'src/pages/LoginModificar.vue'
import TableList from 'src/pages/TableList.vue'
import Typography from 'src/pages/Typography.vue'
import Icons from 'src/pages/Icons.vue'
import Maps from 'src/pages/Maps.vue'
import Notifications from 'src/pages/Notifications.vue'
import Upgrade from 'src/pages/Upgrade.vue'

const routes = [
  {
    path: '/',
    component: DashboardLayout,
    redirect: '/admin/dashboard'
  },
  {
    path: '/admin',
    component: DashboardLayout,
    redirect: '/admin/overview',
    children: [
      {
        path: 'dashboard',
        name: 'Dashboard',
        component: Dashboard
      },
      {
        path: 'dashboard-llevar',
        name: 'Dashboard para Llevar',
        component: DashboardLlevar
      },
      {
        path: 'crear-orden',
        name: 'Crear Orden',
        component: CrearOrden
      },
      {
        path: 'crear-orden-llevar',
        name: 'Crear Orden para Llevar',
        component: CrearOrdenLlevar
      },
      {
        path: 'modificar-orden',
        name: 'Modificar Orden',
        component: ModificarOrden
      },
      {
        path: 'ordenes',
        name: 'Ordenes',
        component: Ordenes
      },
      {
        path: 'login',
        name: 'Login',
        component: Login
      },
      {
        path: 'login-modificar',
        name: 'Login Modificar',
        component: LoginModificar
      },
      {
        path: 'admin',
        name: 'admin',
        component: Admin
      },
      {
        path: 'admin/mesas',
        name: 'Administración Mesas',
        component: AdminMesas
      },
      {
        path: 'admin/bitacoras',
        name: 'Administración Bitácoras',
        component: AdminBitacoras
      },
      {
        path: 'admin/usuario-rol',
        name: 'Administración Usuario-Rol',
        component: AdminUsuarioRol
      },
    
      {
        path: 'admin/productos',
        name: 'Administración Productos',
        component: AdminProductos
      },
      {
        path: 'admin/categorias',
        name: 'Administración Categorías',
        component: AdminCategorias
      },
      {
        path: 'admin/compras',
        name: 'Administración Compras',
        component: AdminCompras
      },
      {
        path: 'admin/parametros',
        name: 'Administración Parametros',
        component: AdminParametros
      },
      {
        path: 'libro-compras',
        name: 'Libro Compras',
        component: LibroCompras
      },
      {
        path: 'libro-ventas',
        name: 'Libro De Ventas',
        component: LibroVentas
      },
      {
        path: 'estadisticas',
        name: 'Estadísticas',
        component: Estadisticas
      },
      {
        path: 'inventario',
        name: 'Inventario',
        component: Inventario
      },
      {
        path: 'table-list',
        name: 'Table List',
        component: TableList
      },
      {
        path: 'typography',
        name: 'Typography',
        component: Typography
      },
      {
        path: 'icons',
        name: 'Icons',
        component: Icons
      },
      {
        path: 'maps',
        name: 'Maps',
        component: Maps
      },
      {
        path: 'notifications',
        name: 'Notifications',
        component: Notifications
      },
      {
        path: 'upgrade',
        name: 'Upgrade to PRO',
        component: Upgrade
      }
    ]
  },
  { path: '*', component: NotFound }
]

/**
 * Asynchronously load view (Webpack Lazy loading compatible)
 * The specified component must be inside the Views folder
 * @param  {string} name  the filename (basename) of the view to load.
function view(name) {
   var res= require('../components/Dashboard/Views/' + name + '.vue');
   return res;
};**/

export default routes
