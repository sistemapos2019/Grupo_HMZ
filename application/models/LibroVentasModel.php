<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LibroVentasModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
    }

    public function getVentasMes($mes)
    {
        return $this->db->query("SELECT ord.fecha, GROUP_CONCAT(ord.id) as ids, 
        SUM(ord.total) as total, SUM(ord.propina) as propina, 
        SUM(ord.total)+SUM(ord.propina) as venta FROM orden ord 
        where ord.fecha LIKE '$mes%'  GROUP BY ord.fecha")->result();
      
    }
}