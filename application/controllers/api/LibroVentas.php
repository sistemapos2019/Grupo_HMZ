<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LibroVentas extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("LibroVentasModel", "ventas");

    }
    public function index()
    {
       $this->load->view("LibroVentas/index");
    }
    public function getVentasMes()
    {
        $mes=$_POST['mes'];
        $ventas=$this->ventas->getVentasMes($mes);
        header('Content-Type: application/json');   
        echo json_encode($ventas);
    }
    
}