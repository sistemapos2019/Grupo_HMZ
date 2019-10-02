<?php
class Producto
{
    public $Id;
    public $Nombre;
    public $Precio;
    public $Categoria;
    public $EsPreparado;

    public function __construct($Id="",$Nombre="",$Precio="",$Categoria="", $EsPreparado="") {
       $this->Id=$Id;
       $this->Nombre=$Nombre;
       $this->Precio=$Precio;
       $this->Categoria= $Categoria;
       $this->EsPreparado = $EsPreparado;
    }
}
