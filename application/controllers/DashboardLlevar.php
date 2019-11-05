<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardLlevar extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Dashboardllevarmodel',"dashboardllevar");
    }

    public function index(){

        $data['ordenesActivas'] = $this->dashboardllevar->obtenerDashboardLlevar();
        foreach ($data['ordenesActivas'] as $orden) {
            $orden->TiempoPreparado = $this->getValor($orden->TiempoPreparado);
        }
        $this->layout->load_view('dashboardllevar/modo_caja/index', $data);
    }

    public function getValor($value){
        $num=(($value*100)-(($value*100)%100))/100;
        $otro=((($value*100)%100)/100)*60;
        $otro = ($otro<59)?"".$otro: '';
        $num = ($num<59)?"".$num: '';
        return $num.":".$otro." min ";
    }

}