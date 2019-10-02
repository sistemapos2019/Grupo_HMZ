<?php

class Manejadorcategoriatest extends TestCase
{
	public function __construct(Type $var = null) {
		$this->CI = & get_instance();
		$this->CI->load->library('Manejadores/Manejadorcategoria');
    }

    public function testObtener()
    {
        $this->assertNotNull($this->CI->manejadorcategoria->Obtener());
    }
}