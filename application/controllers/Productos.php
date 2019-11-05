<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    public function __construct()
    {
        parent::__construct(); 
        $this->load->library('grocery_CRUD');
        $this->load->model('Productomodel','productos');
        
    }

    public function index(){
        $crud = new grocery_CRUD();
        $crud->set_table("producto");
        $crud->set_language("spanish");
        $crud->set_relation('idCategoria','categoria','nombre');
        $crud->display_as('idCategoria','Categoria');
        $crud->field_type('preparado','true_false');
        $crud->unset_delete();
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_clone();        
        $crud->required_fields('nombre','precio','inventario','idCategoria','preparado');
        $output =$crud->render();
        $this->layout->load_view('productos/index',$output);
    }

    public function obtenerProductosPorCategoria($categoria = "")
    {
        if($categoria!=""){
            echo(json_encode($this->productos->obtenerProductosPorCategoria($categoria)));
        }
    }
    

}

/* End of file Productos.php */
