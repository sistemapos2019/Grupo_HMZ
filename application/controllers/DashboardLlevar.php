<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardLlevar extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Dashboardllevarmodel',"dashboardllevar");
    }

    public function index(){

        $data['ordenesActivas'] = $this->dashboardllevar->obtenerDashboardLlevar();
        $this->layout->load_view('dashboardllevar/modo_caja/index', $data);
    }

}