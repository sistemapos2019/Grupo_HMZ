<?php
class Seguridad
{
    private $CI;
 
    function __construct()
    {
        $this->CI = & get_instance();

    }
    
    public function ValidarSesion()
    {
        $controlador = $this->CI->uri->segment(1); 
        $rutasPermitidas =array(0 => "SeguridadController" );
      
        if($this->CI->session->userdata('logueado')==null){
            if(!in_array($controlador, $rutasPermitidas)){
                 header('Location: '.base_url()."SeguridadController");
             }
    }

    }

    public function GenerarLogBitacora()
    {
       
    }
    
}
