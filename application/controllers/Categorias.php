<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {
    
    public function index(){
        $crud = new grocery_CRUD();
        $crud->set_table("categoria");
        $crud->set_language("spanish");
        $crud->unset_delete();
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_clone();        
        $crud->required_fields('nombre');
        $output =$crud->render();
        $this->layout->load_view('categorias/index',$output);
    }

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
        $this->load->library('grocery_CRUD');
    }
    
}

/* End of file Categorias.php */
