<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrdenesModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
    }

    public function ObtenerUltimoId()
    {
      return  $this->db->query("SELECT MAX(orden.id)+1 AS id FROM orden; ")->row();
    }
    public function obtenerCategorias()
    {
        return $this->db->query("SELECT * FROM categoria;")->result();
    }
    public function obtenerMesas()
    {
        return $this->db->query("SELECT * FROM mesa;")->result();
    }
    
    public function crearOrden($orden)
    { 
            $this->db->insert('orden', $orden);
            $insert_id = $this->db->insert_id();
         
            return  $insert_id;
        
    }

    public function guardarDetalleOrden($id, $orden)
    { 
      
            foreach ($orden as  $producto) {
                if($producto->cantidad>0){
                $this->db->insert('detalleorden',  array('idOrden' => $id, 'idProducto'=>$producto->id, 'cantidad'=>
                 $producto->cantidad, 'precioUnitario'=>
                 ($producto->total/number_format($producto->cantidad,2))));
                }
            }        
    }

    public function obtenerOrden($id)
    {
       return $this->db->query("SELECT * FROM orden where id=$id;")->result();
    }

    public function obtenerDetalleOrden($id)
    {
        return $this->db->query("SELECT detalleorden.*, producto.nombre, producto.idCategoria FROM detalleorden INNER JOIN producto ON detalleorden.idProducto = producto.id
        WHERE detalleOrden.idOrden =$id")->result();
    }

    public function buscarProductoEnOrden($idOrden, $idProducto)
    {
        return $this->db->query("SELECT * FROM detalleorden WHERE idOrden =$idOrden  AND idProducto =$idProducto")->result();
    }

    public function ActualizarCantidadProductoEnOrden($idOrden, $idProducto, $cantidad)
    {
        $this->db->query("UPDATE detalleorden SET cantidad = $cantidad WHERE idOrden = $idOrden AND idProducto = $idProducto;");
    }

    public function AgregarProductoAOrden($id, $producto)
    {
        $this->db->insert('detalleorden',  array('idOrden' => $id, 'idProducto'=>$producto->id, 'cantidad'=>
                 $producto->cantidad, 'precioUnitario'=>
                 ($producto->total/number_format($producto->cantidad,2))
                ));
    }

    public function ActualizarRegistroOrden($id,$orden)
    {                
        $this->db->where('id', $id);
        $this->db->update('orden', $orden);
    }
    
    
    public function TiempoPreparadoNull($id)
    {
        return $this->db->query("UPDATE orden SET TiempoPreparado = NULL WHERE id = $id");
    }

    public function TiempoRapidoNull($id)
    {
        return $this->db->query("UPDATE orden SET TiempoRapido = NULL WHERE id = $id");
    }
}