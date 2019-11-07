<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeguridadController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        
        $this->load->model('Seguridadmodel', 'seguridad');
        
    }

    public function index()
    {
        
        $this->load->view('seguridad/login');
        
    }
    public function ValidarLogin()
    {
        if($_POST['usuario'] !=null &&  $_POST['contra']!=null){
        $usuario = $_POST['usuario'];
        $contra = base64_encode($_POST['contra']);
        $usuariosEncontrados = $this->seguridad->ValidarUsuario($usuario, $contra);
         
            if(count($usuariosEncontrados)>0){
                        $dataSesion = array(
                                'usuario'  => $usuariosEncontrados[0]->login,
                                'rol'     =>  $usuariosEncontrados[0]->rol,
                                'nombre'     =>  $usuariosEncontrados[0]->nombreCompleto,
                                'logueado' => TRUE
                        );
                        echo "<script>alert('Inicio de sesión con exito');</script>";
                    $this->session->set_userdata($dataSesion);
                   
                    header('Location: '.base_url());
            }else{
                echo "<script>alert('Usuario No Encontrado');</script>";
               header('Location: '.base_url());

            }
        }
        else{
            echo "<script>alert('Credenciales incorrectas');</script>";
            header('Location: '.base_url());
        }
  
    }

    public function CerrarSesion()
    {
        $array_items = array('usuario', 'rol', 'nombre', 'logueado');
        $this->session->unset_userdata($array_items);
        header('Location: '.base_url());
    }

}

/* End of file Controllername.php */
