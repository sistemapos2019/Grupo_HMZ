<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estadisticas extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('OrdenesModel','ordenes');
        
    }
    

    public function index()
    {        
        // $data['totalOrdenes'] = $this->manejadorordenes->ObtenerTotalVentasFecha();
        // $data['productosVendidos'] = $this->manejadorordenes->ObtenerProductosVendidos();
        $this->layout->load_view('estadisticas/index', []);
    }

    public function obtenerVentasDiarias()
    {
        $fecha = date("Y-m-d");
        echo json_encode($this->ordenes->obtenerVentas($fecha,$fecha));

        
    }

    public function obtenerVentasEntreFechas()
    {
        $fechai=$_POST['fechaI'];
        $fechaf=$_POST['fechaF'];
        echo json_encode($this->ordenes->obtenerVentas($fechai,$fechaf));

        
    }

    public function obtenerVentasMesActual()
    {
        echo json_encode($this->ordenes->ObtenerVentasMesActual());
    }

}

/* End of file Productos.php */
