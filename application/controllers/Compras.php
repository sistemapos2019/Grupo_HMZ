<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
        $this->load->library('grocery_CRUD');
    }

    public function index(){
        $crud = new grocery_CRUD();
        $crud->set_table("compra");
        $crud->set_language("spanish");
        $crud->unset_delete();
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_clone();
        $crud->required_fields('fecha', 'nombreProveedor', 'montoInterno', 'iva', 'percepcion', 'total');
        $output =$crud->render();
        $this->layout->load_view('compras/index',$output);
    }
   
}