<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class Vista_Sesion {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function mostrarFormLogin($error = null) {
        $this->smarty->assign("error", $error);
        $this->smarty->display('formLogin.tpl');
    }

}