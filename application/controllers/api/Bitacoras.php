<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bitacoras extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
        $this->load->library('grocery_CRUD');
    }

    public function crud(){

        $crud = new grocery_CRUD();
        $crud->set_table("bitacora");
        $crud->set_language("spanish");
        $crud->set_relation('idUsuario','usuario', 'nombreCompleto');
        $crud->display_as('idUsuario', 'Nombre');
        $crud->unset_delete();
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_clone();
        $crud->required_fields('idUsuario', 'fecha', 'suceso');
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
/* End of file Bitacoras.php */