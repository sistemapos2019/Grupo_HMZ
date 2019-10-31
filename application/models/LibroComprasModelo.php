<?php

define('BASEPATH') OR exit('No direct script access allowed');

class LibroComprasModel extends CI_Model {
    public function _construct(){
        parent::__construct();
        $this->db = $this->load->database('pos',true);
    }
    public function getComprasMes($mes)
    {
        return $this->db->query("SELECT cpr.*, GROUP_CONCAT(cpr.id) as ids,
		(SUM(cpr.montoInterno)*(cpr.iva)) as creditoFiscal,
        SUM(cpr.montoInterno) as internas,  
        SUM(cpr.montoInterno)+ (SUM(cpr.montoInterno)*(cpr.iva)) totalCompra FROM compra cpr 
        where cpr.fecha LIKE '$mes%'  GROUP BY cpr.fecha")->result();
      
    }
}