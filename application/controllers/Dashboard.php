<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('Dashboardmodel',"dashboard");
            //Do your magic here
    }
 
    public function index()
    {
        
        $data['ordenesActivas'] = $this->dashboard->obtenerDashboardPrincipal();
        foreach ($data['ordenesActivas'] as $orden){
            $orden->TiempoPreparado = $this->getValor($orden->TiempoPreparado);
            $orden->TiempoRapido = $this->getValor($orden->TiempoRapido);
        } 
        $this->layout->load_view('dashboard/modo_caja/index',$data);
        
    }

    public function getValor($value){
        $num=(($value*100)-(($value*100)%100))/100;
        $otro=((($value*100)%100)/100)*60;
        $otro = ($otro<59)?"".$otro: '';
        $num = ($num<59)?"".$num: '';
        return $num.":".$otro." min ";
    }

}

/* End of file Dashboard.php */
