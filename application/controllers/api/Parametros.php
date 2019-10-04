<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parametros extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
        $this->load->library('grocery_CRUD');
    }
    
 

    public function crud()
    {
        $crud = new grocery_CRUD();
        $crud->set_table("parametro");
        $crud->set_language("spanish");
        $crud->unset_delete();
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_clone();        
        $crud->required_fields('nombre','valor');
        $output =$crud->render();
        foreach ($output->css_files as $key => $css) {
            echo ' <link rel="stylesheet" type="text/css" href="'.$css.'">';
           }
        foreach ($output->js_files as $key => $js) {
            echo '<script src="'.$js.'" > </script>';
           }
        foreach ($output->js_lib_files as $key => $js) {
         echo '<script src="'.$js.'" > </script>';
        }
       echo $output->output;
    }

}

/* End of file Mesas.php */
