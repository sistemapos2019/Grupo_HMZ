<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manejadorordenes {
    public function __construct(Type $var = null) {
        $this->ci =& get_instance();
    }
    
    public function obtenerActivas()
    {
        return ($this->ci->db->query("SELECT * FROM ordenes WHERE estado =1;")->result());
    }

    public function obtenerOrden($id)
    {
        return ($this->ci->db->query("SELECT * FROM ordenes WHERE id=$id;")->result());
    }
    public function actualizar($orden = null)
    {
       if($orden!=null){
        $data = array(
            'fecha' => date("Y-m-d H:i:s"),
            'estado' => $orden->Estado
    );
    
    $this->ci->db->where('id', $orden->Id);
    $this->ci->db->update('ordenes', $data);
    return true;
       }else{
           return false;
       }
    }

    public function buscarActivas($valor=null)
    {
        # code...
    }

    public function insertar($orden = null)
    {
        $data = array(
            'fecha' => $orden->Fecha,
            'mesero' => $orden->Mesero,
            'mesa'=>$orden->Mesa,
            'cliente'=> $orden->Cliente,
            'observacion'=>$orden->Observacion,
            'total'=>$orden->Total,
            'estado'=>1,
    );
    
    $this->ci->db->insert('ordenes', $data);
    $insertId = $this->ci->db->insert_id();

    foreach ($orden->DetalleOrden as $producto) {
        $this->ci->db->insert('detalleorden', array(
            'orden'=>$insertId,
            'producto'=>$producto->id,
            'cantidad'=>$producto->cantidad,
            'precio'=>$producto->total
        ));

    }
    
    return $insertId;

    }
    
    public function eliminar($id)
    {
        # code...
    }
    public function obtenerVentasFecha($fecha)
    {
        # code...
    }
    public function obtenerVentas($fechai, $fechaf)
    {
        # code...
    }

    public function obtenerID()
    {
      $registro = $this->ci->db->query("SELECT MAX(id) id FROM ordenes;")->row();
      if($registro!=null){
          return $registro->id+1;
      }else{
          return 1;
      }
    }

    public function ObtenerDetalleVenta($id)
    {
        return $this->ci->db->query("SELECT productos.nombre, detalleorden.cantidad, productos.esPreparado, productos.precio,(productos.precio * detalleorden.cantidad) total FROM detalleorden INNER JOIN productos ON productos.id = detalleorden.producto WHERE orden= $id")->result();
    }
    
    public function ObtenerTotalVentasFecha()
    {
        return $this->ci->db->query("SELECT CAST(fecha AS DATE) fecha, SUM(total) total FROM ordenes GROUP BY CAST(fecha AS DATE);")->result();
    }

    public function ObtenerProductosVendidos()
    {
        return $this->ci->db->query("SELECT SUM(orden.cantidad) total, productos.nombre

        FROM detalleorden orden
        INNER JOIN productos ON orden.producto = productos.id
        GROUP BY productos.nombre ORDER BY total DESC;")->result();
    }

}
