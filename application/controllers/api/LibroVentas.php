<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LibroVentas extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);

    }
    public function index()
    {
       $this->load->view("LibroVentas/index");
    }
    
}