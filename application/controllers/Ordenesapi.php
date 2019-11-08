<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenesapi extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('Productomodel','productos');
      $this->load->model('Categoriasmodel','categorias'); 
      $this->load->model("parametrosmodel","parametros");
      $this->load->model("Usuariosmodel","usuarios");
      $this->load->model("Seguridadmodel","seguridad");
      
      $this->load->model('OrdenesModel', 'ordenes');
      
      
            //Do your magic here
    }

    public function crearOrden()
    {
        // la ruta es 'ordenes/crearorden'
        $data['categorias']= $this->categorias->obtenerCategorias();
        $data['id'] =$this->ordenes->ObtenerUltimoId()->id;
        $data['meseros'] =$this->usuarios->obtenerMeseros();
        $data['parametros'] = $this->parametros->obtenerTodos();
        $this->layout->load_view('ordenes/crear_orden', $data);
    }

    public function obtenerMesas()
    {
        echo json_encode($this->ordenes->obtenerMesas());
    }

    public function cobrarDesdeDashboard()
    {
        $id = $_POST['idOrden'];
        $this->ordenes->ActualizarRegistroOrden($id,array('estado' => "CC" ));
        $data['orden']=$this->ordenes->obtenerOrden($id);
        $data['detalle'] =$this->ordenes->obtenerDetalleOrden($id);
        echo json_encode($data);
    }

    public function detallesOrden($id){
        $data['categorias']= $this->categorias->obtenerCategorias();
        $data['orden'] = $this->ordenes->obtenerOrden($id);
        $data['meseros'] =$this->usuarios->obtenerMeseros();
        $data['id'] = $id;
        if( count($data['orden'])>0){
            $data['orden']=$data['orden'][0];
        $data['detalle'] = $this->ordenes->obtenerDetalleOrden($id);
        $this->layout->load_view('ordenes/detalles_orden', $data);
        }
    }

    public function ordenes_activas()
    {   
      echo json_encode($this->manejadorordenes->obtenerActivas());
    }

    public function guardarOrden()
    {
        $orden = [];
        $orden['idMesa'] =$_POST['idMesa'];
        $orden['idUsuario'] =$_POST['mesero'];
        $orden['llevar'] =$_POST['llevar'];
        $orden['estado'] =$_POST['estado'];
        $orden['observacion'] =$_POST['comentario'];
        $orden['total'] =$_POST['total'];
        $orden['propina'] =$_POST['propina'];
        $orden['formaPago']="E";
        $orden['cliente'] = $_POST['cliente'];
        $orden['tiempoPreparado'] = date("Y-m-d H:i:s");
        $orden['tiempoRapido'] = date("Y-m-d H:i:s");
        
        $detalleOrden = json_decode($_POST['orden']);
       $productos=[];
        $id = $this->ordenes->crearOrden($orden);
       $this->ordenes->guardarDetalleOrden($id, $detalleOrden);
       foreach ($detalleOrden as  $producto) {
                    $nuevoProducto = $this->productos->obtenerProductoPorId($producto->id);
                    $nuevoProducto = (array) $nuevoProducto;
                    $nuevoProducto['cantidad'] = $producto->cantidad;
                 array_push($productos, $nuevoProducto);
                    } 
        $this->seguridad->GuardarSucesoBitacora("Orden $id Creada", $orden['idUsuario']);
        if($id!=0){
            header('Content-Type: application/json');
            echo json_encode($productos);
        }
        else{
            header('Content-Type: application/json');
            echo "{'Estado':'FALLO'}";
        }        
    }

    public function verEstadoOrden($id="")
    {
        if($id!=""){
            
        }
    }

    public function actualizarOrden ()
    {
        if(isset($_POST['actualizarguardar'])){
            $orden = [];
            $orden['idMesa'] =$_POST['idMesa'];
            $orden['idUsuario'] =$_POST['mesero'];
            $orden['llevar'] =$_POST['llevar'];
            $orden['estado'] =$_POST['estado'];
            $orden['observacion'] =$_POST['comentario'];
            $orden['total'] =$_POST['total'];
            $orden['propina'] =$_POST['propina'];
            $orden['formaPago']="E";
            $orden['cliente'] = $_POST['cliente'];
            $orden['tiempoPreparado'] = date("Y-m-d H:i:s");
            $orden['tiempoRapido'] = date("Y-m-d H:i:s");
            
            $detalleOrden = json_decode($_POST['orden']);
           $productos=[];
            $id = $this->ordenes->crearOrden($orden);
           $this->ordenes->guardarDetalleOrden($id, $detalleOrden);
           foreach ($detalleOrden as  $producto) {
                        $nuevoProducto = $this->productos->obtenerProductoPorId($producto->id);
                        $nuevoProducto = (array) $nuevoProducto;
                        $nuevoProducto['cantidad'] = $producto->cantidad;
                     array_push($productos, $nuevoProducto);
                        } 
           $this->seguridad->GuardarSucesoBitacora("Orden $id Creada Y Cobrada", $orden['idUsuario']);
            if($id!=0){
                header('Content-Type: application/json');

                $respuesta = array('productos' => $productos, 'orden'=>array(
                    "id"=>$id,
                    "fecha"=>date("Y-m-d")  
                ) );
                echo json_encode( $respuesta );
            }
            else{
                header('Content-Type: application/json');
                echo "{'Estado':'FALLO'}";
            }
         
        }
            else{
                //actualizar los productos
            $detalle =  json_decode($_POST['detalle']);
            $idOrden = $_POST['idOrden'];
            foreach ($detalle as  $producto) {
                $productoEnOrden = $this->ordenes->buscarProductoEnOrden($idOrden, $producto->id);
                if(count($productoEnOrden)>0){
                    $this->ordenes->ActualizarCantidadProductoEnOrden($idOrden, $producto->id, $producto->cantidad);
                }
                else{
                    if(number_format($producto->cantidad,2)>0){
                        $this->ordenes->AgregarProductoAOrden($idOrden, $producto);
                    }
                }
            }

            //Actualiza los datos de la orden
            $datosOrden  = array('idMesa' => $_POST['idMesa'],
            'idUsuario'=>$_POST['mesero'], 
            'cliente'=>$_POST['cliente'], 'llevar'=>$_POST['llevar'],
            'estado'=>$_POST['estado'], 'observacion'=>$_POST['comentario'] ,
            'tiempoPreparado'=>date("Y-m-d H:i:s"), 'tiempoRapido'=>date("Y-m-d H:i:s"),
            'total'=>$_POST['total'], 'propina'=>$_POST['propina']
            );
            $this->ordenes->ActualizarRegistroOrden($idOrden, $datosOrden);
            header('Content-Type: application/json');
            $respuesta = array('productos' => $detalle, 'orden'=>array(
                "id"=>$idOrden
            ) );
            echo json_encode( $respuesta );
            }
    }
    
    public function setearRapido($id)
    {
      $this->ordenes-> TiempoRapidoNull($id);
      echo "<h1>Orden $id: Productos No Preparados Entregados </h1>";
      echo "<script>setTimeout(function(){ window.location = '".base_url()."'  },3000);</script>";
      
    }

    public function setearPrepadado($id)
    { 
        $this->ordenes->TiempoPreparadoNull($id);
        echo "<h1>Orden $id: Productos Preparados Entregados </h1>";
        echo "<script>setTimeout(function(){ window.location = '".base_url()."'  },3000);</script>";
    }
}