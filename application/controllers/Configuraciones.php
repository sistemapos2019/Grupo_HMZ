<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuraciones extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
    }
    

    public function index()
    {
        $crud = new grocery_CRUD();
        $crud->set_table("parametros");
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_print();
        $crud->unset_export();
        $crud->set_language("spanish");
        $output =$crud->render();
        
        $this->layout->load_view('configuraciones/index', $output);
    }

}

/* End of file Productos.php */
