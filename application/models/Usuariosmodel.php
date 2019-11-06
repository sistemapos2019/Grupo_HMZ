<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuariosmodel extends CI_Model {
public function __construct(Type $var = null) {
    parent::__construct();     
}

public function obtenerMeseros()
{
    return $this->db->query("SELECT id, nombreCompleto as nombre FROM usuario WHERE rol ='M';")->result();
}
    

}

/* End of file Usuariosmodel.php */
