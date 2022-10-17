<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class Vista_Producto {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function listarProductos($perfumes, $marcas) {
        $this->smarty->assign('perfumes', $perfumes);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('listaProductos.tpl');
    }
    
    function cargarFormulario($perfume, $marcas){
        $this->smarty->assign('perfume', $perfume);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('formCargadoProd.tpl');
    }

    function mostrarDetalle($perfume){
        $this->smarty->assign('perfume', $perfume);

        $this->smarty->display('mostrar_Detalle.tpl');
    }

    function mostrarFormAgregar($marcas){
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('formAgregarprod.tpl');
    }

}