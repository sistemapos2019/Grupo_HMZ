<?php
require_once(ENTITIES_PATH  . "Producto.php");

defined('BASEPATH') OR exit('No direct script access allowed');

class Productomodel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
    }
    

    public function obtenerProductoPorId($Id)
    {   
        $query = $this->db->query("SELECT * FROM productos where id =$Id");
        $registro = $query->row();
        if($registro==null){
        return new Producto();
        }
        else{
            return new Producto($registro->id, $registro->nombre, $registro->precio,$registro->categoria, $registro->esPreparado);
        }
    }
    

}

/* End of file Productomodel.php */
