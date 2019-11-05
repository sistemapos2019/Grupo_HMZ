<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoriasmodel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function obtenerCategorias()
    {
        $registros = $this->db->
        query("SELECT * FROM categoria;")->result();
        return $registros;
    }


}

/* End of file Categoriasmodel.php */
