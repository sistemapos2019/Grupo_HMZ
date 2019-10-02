<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estadisticas extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('manejadores/manejadorordenes');
    }
    

    public function index()
    {        
        $data['totalOrdenes'] = $this->manejadorordenes->ObtenerTotalVentasFecha();
        $data['productosVendidos'] = $this->manejadorordenes->ObtenerProductosVendidos();
        $this->layout->load_view('estadisticas/index', $data);
    }

}

/* End of file Productos.php */
