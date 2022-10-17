<?php

include_once './app/modelos/modelo_Marca.php';
include_once './app/vistas/vista_Marca.php';
include_once './app/helpers/helper_sesion.php';

class Controlador_Marca {
    private $modeloMarca;
    private $vistaMarca;
    private $helper;

    //constructor
    public function __construct(){
        $this->vistaMarca = new Vista_Marca();
        $this->modeloMarca = new Modelo_Marca();
        $this->helper = new HelperSesion();
    }

    function listarMarcas(){
        session_start();
        $marcas = $this->modeloMarca->traerMarcas();
        $this->vistaMarca->listarMarcas($marcas);
    }

    function agregarMarca(){
        $this->helper->checkLoggedIn();
        $marca = $_POST ['marca'];
        $origen = $_POST ['origen'];
        $crueltyFree = $_POST ['crueltyFree'];

        $this->modeloMarca->agregarMarca($marca, $origen, $crueltyFree);

        header("Location: " . BASE_URL .'listarMarcas');
    }

    function formAgregarMarca(){
        $this->helper->checkLoggedIn();
        $this->vistaMarca->formAgregarMarca();

    }

    function eliminarMarca($id){
        $this->helper->checkLoggedIn();
        $this->modeloMarca->eliminarMarca($id);

        header("Location: " .  BASE_URL .'listarMarcas');
    }
    
    function  cargarFormulario($id){
        $this->helper->checkLoggedIn();
        $marca = $this->modeloMarca->traerMarca($id);
        $this->vistaMarca->cargarFormulario($marca);
    }

    function modificarMarca($id){
        $this->helper->checkLoggedIn();
        $marca = $_POST ['marca'];
        $origen = $_POST ['origen'];
        $crueltyFree = $_POST ['crueltyFree'];

        $this->modeloMarca->modificarMarca($marca, $origen, $crueltyFree, $id);

        header("Location: " . BASE_URL .'listarMarcas'); 
    }


}