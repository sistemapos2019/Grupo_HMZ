<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Productomodel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
    }
    
 
    public function obtenerProductoPorId($Id)
    {   
        $query = $this->db->query("SELECT * FROM producto where id =$Id");
        $registro = $query->row();
        return $registro;
    }
    
    
    public function obtenerProductosPorCategoria($Id)
    {   
        $query = $this->db->query("SELECT * FROM producto where idCategoria =$Id");
      return $query->result();
    }

}

/* End of file Productomodel.php */
