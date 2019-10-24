<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
        $this->load->model("OrdenesModel", "ordenes");
    }

    public function ObtenerUltimoId()
    {
        $resultado= $this->ordenes->ObtenerUltimoId();
        echo json_encode($resultado);
    }
    public function obtenerCategorias()
    {
        $resultado= $this->ordenes->obtenerCategorias();
        echo json_encode($resultado);
    }
    public function obtenerMesas()
    {
        $resultado= $this->ordenes->obtenerMesas();
        echo json_encode($resultado);
    }
}
    