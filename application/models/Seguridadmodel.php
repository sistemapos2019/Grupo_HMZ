<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Seguridadmodel extends CI_Model {
    public function __construct(Type $var = null) {
        parent::__construct();
    }
     
    public function ValidarUsuario($usuario, $contra)
    {
        return $this->db->query("SELECT * from usuario where login ='$usuario' and clave='$contra';")->result();
    }

}

/* End of file Seguridadmodel.php */
