<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Layout {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('Parametrosmodel','parametros');
    }

    public function load_view($view_name, $params = array()) {
        $path['parametros'] = $this->CI->parametros->obtenerTodos();
        $this->CI->load->view('layout/header',$path); /* DENTRO DE HEADER CARGA EL CORE LIBRARIES */
        $data['configuraciones']['modoEntorno']=$this->CI->parametros->obtenerModoAplicacion()->Valor;
        $this->CI->load->view('layout/sidebar',$data);
       
      //  $this->load_menu();

        $this->CI->load->view($view_name, $params);
        $this->CI->load->view('layout/footer');
    }

    public function load_view_blanco($view_name, $params = array()) {
        $this->CI->load->view('layout/blanco/header'); /* DENTRO DE HEADER CARGA EL CORE LIBRARIES */
        $this->CI->load->view($view_name, $params);
        $this->CI->load->view('layout/blanco/footer');
    }

    public function get_core_lib() {
        $this->CI->load->view('layout/core_libraries');
    }

    public function load_menu() {
        $this->CI->load->view('layout/menu/default.php');
    }

}
