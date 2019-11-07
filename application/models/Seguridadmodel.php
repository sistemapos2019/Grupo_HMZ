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

    public function GuardarSucesoBitacora($suceso, $idUsuario)
    {
        $data = array('idUsuario' =>  $idUsuario, 'suceso' =>$suceso, 'fecha'=>date("Y-m-d H:i:s") );
       
            $this->db->insert('bitacora', $data);
    }
}

/* End of file Seguridadmodel.php */
