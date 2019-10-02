<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productosapi extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
        $this->load->library('Manejadores/manejadorproductos');
    }
    

    public function index()
    {
        $crud = new grocery_CRUD();
        $crud->set_table("productos");
        $crud->set_language("spanish");
        $crud->set_relation('id_categoria','categorias','nombre');
        $crud->display_as('id_categoria','Categoria');
        $output =$crud->render();
        
        
        $this->layout->load_view('productos/index', $output);
    }

    public function obtenerProductosPorCategoria($id)
    {
       header('Content-Type: application/json');
       echo json_encode($this->manejadorproductos->ObtenerxCategoria($id));
    }

}

/* End of file Productos.php */
