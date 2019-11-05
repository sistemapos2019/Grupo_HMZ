<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LibroVentas extends CI_Controller {
    public function __construct()
    
    {
        parent::__construct();
        $this->load->model("LibroVentasModel", "ventas");
        $this->load->model("parametrosmodel","parametros");

    }
    public function index()
    {
        $data['parametros'] = $this->parametros->obtenerTodos();
       $this->layout->load_view("LibroVentas/index", $data);

    }
    public function getVentasMes()
    {
        $mes=$_POST['mes'];
        $ventas=$this->ventas->getVentasMes($mes);
        header('Content-Type: application/json');   
        echo json_encode($ventas);
    }
    
}