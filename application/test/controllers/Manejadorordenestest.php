<?php

class Manejadorordenestest extends TestCase
{
	public function __construct(Type $var = null) {
		$this->CI = & get_instance();
		$this->CI->load->library('Manejadores/manejadorordenes');
	}

	public function testObtenerActivas()
	{
		$this->assertNotEmpty($this->CI->manejadorordenes->obtenerActivas());
		
	}
}
