<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('Productomodel','productos');
      $this->load->model('Categoriasmodel','categorias');
      $this->load->model('OrdenesModel','ordenes');

            //Do your magic here
    }

    public function crearOrden()
    {
        $data['categorias']= $this->categorias->obtenerCategorias();
        $this->layout->load_view('ordenes/crear_orden', $data);
    }

    public function detallesOrden($id){
        $data['categorias']= $this->categorias->obtenerCategorias();
        $this->layout->load_view('ordenes/detalles_orden', $data);
    }

    public function obtenerVentas()
    {
        $this->$fechaF
    }
}