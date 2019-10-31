<?php
require_once(ENTITIES_PATH  . "Parametro.php");

defined('BASEPATH') OR exit('No direct script access allowed');

class Parametrosmodel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
    }

    public function obtenerModoAplicacion()
    {
        return new Parametro(1,"ModoEntorno","CAJA");
    }

    public function obtenerTodos()
    {
         $resultados= $this->db->query("SELECT * FROM parametro;")->result();

         $params = [];
         foreach ($resultados as $resultado) {
            
            $params[$resultado->nombre] = $resultado->valor;
         }
         return $params;
    }

}
