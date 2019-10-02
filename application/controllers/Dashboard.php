<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('Productomodel','productos');
      $this->load->model('Parametrosmodel','parametros');
      $this->load->library('Manejadores/manejadorordenes');
            //Do your magic here
    }
 
    public function index()
    {
        
        $data['ordenesActivas'] =$this->manejadorordenes->obtenerActivas();
        $this->layout->load_view('dashboard/modo_caja/index',$data);
        
    }

}

/* End of file Dashboard.php */
