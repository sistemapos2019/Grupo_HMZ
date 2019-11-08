<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LibroCompras extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("LibroComprasModelo", "compras");
        $this->load->model("parametrosmodel","parametros");

    }
    public function index()
    {
        $data['parametros'] = $this->parametros->obtenerTodos();
        $this->layout->load_view("LibroCompras/index", $data);
    }
    public function getComprasMes()
    {
        $mes=$_POST['mes'];
        $compras=$this->compras->getComprasMes($mes);
        header('Content-Type: application/json');   
        echo json_encode($compras);
    }
    
}