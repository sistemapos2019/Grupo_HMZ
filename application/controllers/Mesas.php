<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mesas extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
        $this->load->library('grocery_CRUD');
    }

    public function index(){
        $crud = new grocery_CRUD();
        $crud->set_table("mesa");
        $crud->set_language("spanish");
        $crud->unset_delete();
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_clone();        
        $crud->required_fields('nombre');
        $output =$crud->render();
        $this->layout->load_view('mesas/index',$output);
    }
    


}

/* End of file Mesas.php */
