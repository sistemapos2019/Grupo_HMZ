<?php
class Parametro
{
    public $Id;
    public $Nombre;
    public $Valor;

    //Constructor 
    public function __construct($Id="", $Nombre="", $Valor="")
    {
        $this->Id = $Id;
        $this->Nombre = $Nombre;
        $this->Valor = $Valor;
    }
    
    
}
