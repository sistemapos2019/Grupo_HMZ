<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
        $this->load->library('grocery_CRUD');
    }
    
    public function index(){
        $crud = new grocery_CRUD();
        $crud->set_table("usuario");
        $crud->set_language("spanish");
        $crud->unset_delete();
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_clone();        
        $crud->required_fields('nombreCompleto', 'login', 'clave', 'pin', 'rol');
        $crud->field_type('clave', 'password');
        $crud->field_type('rol','dropdown',
            array('G' => 'G', 'M' => 'M'));
            $crud->callback_before_update(array($this,'encrypt_password_callback'));
        $output =$crud->render();
        $this->layout->load_view('usuarios/index',$output);
    }
    
    function encrypt_password_callback($post_array, $primary_key){
    //Encrypt password only if is not empty. Else don't change the password to an empty field
    if(!empty($post_array['clave']))
    {
        
        $post_array['clave'] = base64_encode($post_array['clave']);
    }
    else
    {
        unset($post_array['clave']);
    }
 
  return $post_array;
    }

}

/* End of file Categorias.php */
