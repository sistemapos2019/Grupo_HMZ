<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LibroCompras extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("LibroComprasModelo", "compras");

    }
    public function index()
    {
       $this->load->view("LibroCompras/index");
    }
    public function getVentasMes()
    {
        $mes=$_POST['mes'];
        $compras=$this->compras->getComprasMes($mes);
        header('Content-Type: application/json');   
        echo json_encode($compras);
    }
    
}