<?php
 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardmodel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
    
    }

    public function obtenerDashboardPrincipal()
    {
        return $this->db->query("SELECT * FROM dashboardprincipal;")->result();
    }

    public function obtenerDashboardParaLlevar()
    {
        return $this->db->query("SELECT * FROM dashboardllevar;")->result();
    }

}