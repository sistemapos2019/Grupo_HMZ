<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrdenesModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
    }

    public function ObtenerUltimoId()
    {
      return  $this->db->query("SELECT MAX(orden.id)+1 AS id FROM orden; ")->row();
    }
    public function obtenerCategorias()
    {
        return $this->db->query("SELECT * FROM categoria;")->result();
    }
    public function obtenerMesas()
    {
        return $this->db->query("SELECT * FROM mesa;")->result();
    }
}