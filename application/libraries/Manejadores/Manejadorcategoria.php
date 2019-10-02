<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manejadorcategoria {
    public function __construct(Type $var = null) {
        $this->ci =& get_instance();
    }

    public function Obtener()
    {
        $registros = $this->ci->db->
    query("SELECT * FROM categorias;")->result();
        $categorias =[];

        foreach ($registros as $registro) {
            $categoria = new Categoria();
            $categoria->Id = $registro->id_categoria;
            $categoria->Nombre = $registro->nombre;
            array_push($categorias , $categoria);
        }
        return $categorias;
    }
}