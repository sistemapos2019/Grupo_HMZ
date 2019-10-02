<?php
class Categoria
{
    public $Id;
    public $Nombre;

    
    public function __construct($Id="", $Nombre="")
    {
        $this->Id = $Id;
        $this->Nombre=$Nombre;   
    }
    
    
}
