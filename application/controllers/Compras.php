<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('pos',true);
        $this->load->library('grocery_CRUD');
        $this->id=0;
    }
   
    public function index(){
        $crud = new grocery_CRUD();
        $crud->set_table("compra");
        $crud->set_language("spanish");
        $crud->unset_delete();
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_clone();
        $crud->add_action('Detalle de orden', base_url().'/assets/grocery_crud/themes/flexigrid/css/images/add.png', '','',array($this,'enviar_a_detalle'));
        $crud->required_fields('fecha', 'nombreProveedor', 'montoInterno', 'iva', 'percepcion', 'total');
        $output =$crud->render();
        $this->layout->load_view('compras/index',$output);
    }
    function enviar_a_detalle($primary_key , $row)
{
    return site_url('compras/detalleCompra/').$row->id;
}
    public function detalleCompra($id="")
    {
        if($id!=""){
            $this->id= $id;
        $crud = new grocery_CRUD();
        $crud->set_table("detallecompra");
        $crud->set_language("spanish");
        $crud->where('idCompra',$id); 
        $crud->unset_delete();
        $crud->display_as('idProducto','Producto');
        $crud->set_relation('idProducto','producto','nombre');
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_clone();
        $crud->callback_add_field('idCompra',function () {
            return '<input type="hidden" id="field-idCompra" maxlength="50" value="'. $this->id.'" name="idCompra">';
        });
        
        $output =$crud->render();
        $output->id = $this->id;
        $this->layout->load_view('compras/detalle_compra',$output);
        }
    }

    public function callback_set_idCompra($post_array)
    {
        $post_array['idCompra']  = $this->id;
        return $post_array;
    }
   
}