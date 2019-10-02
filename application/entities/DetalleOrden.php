<?php
class DetalleOrden
{
    public $Id;
    public $OrdenId;
    public $ProductoId;
    public $Cantidad;
    public $Precio;
    public function __construct($Id="", $OrdenId="",$ProductoId="",$Cantidad="", $Precio="")
    {
        $this->Id = $Id;
        $this->OrdenId=$OrdenId;
        $this->ProductoId = $ProductoId;
        $this->Cantidad = $Cantidad;
        $this->Precio=$Precio;
    }
    
}
