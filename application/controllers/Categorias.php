<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
    }
    

    public function index()
    {
        $crud = new grocery_CRUD();
        $crud->set_table("categorias");
        $crud->set_language("spanish");
        $output =$crud->render();
        
        $this->layout->load_view('categorias/index', $output);
    }

}

/* End of file Productos.php */
