<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardllevarmodel extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
    }

    public function obtenerDashboardLlevar()
    {
        return $this->db->query("SELECT * FROM dashboardllevar;")->result();
    }
}