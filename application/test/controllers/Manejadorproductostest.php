<?php

class Manejadorproductostest extends TestCase
{
	public function __construct(Type $var = null) {
		$this->CI = & get_instance();
		$this->CI->load->library('Manejadores/manejadorproductos');
    }
    public function testObtenerxCategoria()
    {
        $this->assertNotEmpty($this->CI->manejadorproductos->ObtenerxCategoria(1));
    }

    public function testObtener()
    {
        $this->assertNotNull($this->CI->manejadorproductos->Obtener(1));
    }
}