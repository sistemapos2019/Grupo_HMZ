<?php
require_once(ENTITIES_PATH  . "Categoria.php");

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoriasmodel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function obtenerCategorias()
    {
       $data[0] = new Categoria(1,"Snacks");
       $data[1] = new Categoria(2,"Sodas");
       $data[2] = new Categoria(3,"Bebidas Alcoholicas");
       return $data;
    }


}

/* End of file Categoriasmodel.php */
