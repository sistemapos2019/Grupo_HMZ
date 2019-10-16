<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboardmodel',"dashboard");
        
    }

    public function GetDashboardPrincipal()
    {
        $registros = $this->dashboard->obtenerDashboardPrincipal();
        echo json_encode($registros);
    }

    public function GetDashboardParaLlevar()
    {
        $registros = $this->dashboard->obtenerDashboardParaLlevar();
        echo json_encode($registros);
    }
}