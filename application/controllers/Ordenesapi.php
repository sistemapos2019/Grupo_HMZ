<?php
include(APPPATH."/entities/Producto.php");
include(APPPATH."/entities/Orden.php");
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenesapi extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('Productomodel','productos');
      $this->load->model('Categoriasmodel','categorias');
      $this->load->library('manejadores/manejadorordenes');
      $this->load->library('manejadores/manejadorcategoria');
      $this->load->model("parametrosmodel","parametros");
      
            //Do your magic here
    }

    public function crearOrden()
    {
        // la ruta es 'ordenes/crearorden'
        $data['categorias']= $this->manejadorcategoria->Obtener();
        $data['id'] = $this->manejadorordenes->obtenerID();
        $data['parametros'] = $this->parametros->obtenerTodos();
        $this->layout->load_view('ordenes/crear_orden', $data);
    }

    public function detallesOrden($id){
        $data['categorias']= $this->manejadorcategoria->Obtener();
        $data['orden'] = $this->manejadorordenes->obtenerOrden($id);
        if( count($data['orden'])>0){
            $data['orden']=$data['orden'][0];
        $data['detalle'] = $this->manejadorordenes->ObtenerDetalleVenta($id);
        $this->layout->load_view('ordenes/detalles_orden', $data);
        }
    }

    public function ordenes_activas()
    {   
      echo json_encode($this->manejadorordenes->obtenerActivas());
    }

    public function guardarOrden()
    {
        $orden = new Orden();
        $orden->Fecha = date("Y-m-d H:m:s");
        $orden->Mesero = $_POST['mesero'];
        $orden->Mesa = $_POST['mesa'];
        $orden->Cliente= $_POST['cliente'];
        $orden->Estado = 1;
        $orden->Observacion = $_POST['comentario'];
        $orden->Total= $_POST['total'];
        $orden->DetalleOrden = json_decode($_POST['orden']);
       
        $id = $this->manejadorordenes->insertar($orden);
        
        $respuesta['orden'] = $this->manejadorordenes->obtenerOrden($id );
        $respuesta['detalleOrden'] = $this->manejadorordenes->ObtenerDetalleVenta($id );
        
        if($id!=0){
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        }
        else{
            header('Content-Type: application/json');
            echo "{'Estado':'FALLO'}";
        }
       
    }
    public function actualizarOrden ()
    {
        if(isset($_POST['actualizarguardar'])){

        $orden = new Orden();
        $orden->Fecha = date("Y-m-d H:m:s");
        $orden->Mesero = $_POST['mesero'];
        $orden->Mesa = $_POST['mesa'];
        $orden->Cliente= $_POST['cliente'];
        $orden->Estado = 1;
        $orden->Observacion = $_POST['comentario'];
        $orden->Total= $_POST['total'];
        $orden->DetalleOrden = json_decode($_POST['orden']);
       

        $id = $this->manejadorordenes->insertar($orden);
        $orden->Id = $id;
        $orden->Estado = $_POST['estado'];
        $resultado=$this->manejadorordenes->actualizar($orden);
        $respuesta['orden'] = $this->manejadorordenes->obtenerOrden($_POST['idOrden']);
        $respuesta['detalleOrden'] = $this->manejadorordenes->ObtenerDetalleVenta($_POST['idOrden']);
        
        if($resultado){
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        }
        else{
            header('Content-Type: application/json');
            echo "{'Estado':'FALLO'}";
        }
        }
            else{
                
        $orden = new Orden();
        $orden->Id = $_POST['idOrden'];
        $orden->Estado = $_POST['estado'];
        $resultado=$this->manejadorordenes->actualizar($orden);
      
        $respuesta['orden'] = $this->manejadorordenes->obtenerOrden($_POST['idOrden']);
        $respuesta['detalleOrden'] = $this->manejadorordenes->ObtenerDetalleVenta($_POST['idOrden']);
        if($resultado){
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        }
        else{
            header('Content-Type: application/json');
            echo "{'Estado':'FALLO'}";
        }
    }
    }
}