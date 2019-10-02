<?php
include(APPPATH."/entities/Producto.php");
include(APPPATH."/entities/Categoria.php");
defined('BASEPATH') OR exit('No direct script access allowed');

class Manejadorproductos {
    public function __construct(Type $var = null) {
        $this->ci =& get_instance();
    }

    public function ObtenerxCategoria($idCat)
    {
        $registros = $this->ci->db->
        query("SELECT producto.id, producto.nombre, producto.precio, producto.esPreparado, categoria.id_categoria, categoria.nombre categoria
                FROM productos producto 
                INNER JOIN categorias categoria ON producto.id_categoria = categoria.id_categoria
                where categoria.id_categoria = $idCat
                ")->result();
        $productos =[];

        foreach ($registros as $registro) {
            $producto = new Producto();
            $producto->Categoria = new Categoria($registro->id_categoria, $registro->categoria);
            $producto->Id = $registro->id;
            $producto->Nombre = $registro->nombre;
            $producto->Precio = $registro->precio;            
            $producto->EsPreparado = $registro->esPreparado;
            array_push($productos , $producto);
        }
        return $productos;
    }
    
    public function Obtener($id)
    {
        $registro = $this->ci->db->
        query("SELECT producto.id, producto.nombre, producto.precio, producto.esPreparado, categoria.id_categoria, categoria.nombre categoria
        FROM productos producto 
        INNER JOIN categorias categoria ON producto.id_categoria = categoria.id_categoria
        where producto.id = $id
        ")->row();

        $producto = new Producto();
            $producto->Categoria = new Categoria($registro->id_categoria, $registro->categoria);
            $producto->Id = $registro->id;
            $producto->Nombre = $registro->nombre;
            $producto->Precio = $registro->precio;            
            $producto->EsPreparado = $registro->EsPreparado;
            return $producto;
    }
}