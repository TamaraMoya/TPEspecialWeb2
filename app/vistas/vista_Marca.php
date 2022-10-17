<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class Vista_Marca {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function listarMarcas($marcas) {
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('listaMarcas.tpl');
    }

    function cargarFormulario($marca){
        $this->smarty->assign('marca', $marca);
        $this->smarty->display('formCargadoMarca.tpl');
    }
    
    function formAgregarMarca(){
        $this->smarty->display('formAgregarMarca.tpl');
    }

}