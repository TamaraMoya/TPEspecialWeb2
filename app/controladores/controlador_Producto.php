<?php
include_once './app/modelos/modelo_Producto.php';
include_once './app/modelos/modelo_Marca.php';
include_once './app/vistas/vista_Producto.php';
include_once './app/helpers/helper_sesion.php';

class Controlador_Producto {
    private $modeloProducto;
    private $modeloMarca;
    private $vistaProducto;
    private $helper;

    //constructor
    public function __construct(){
        $this->modeloProducto = new Modelo_Producto();
        $this->vistaProducto = new Vista_Producto();
        $this->modeloMarca = new Modelo_Marca();
        $this->helper = new HelperSesion();
    }

    function listarProductos(){
        session_start();
        $perfumes = $this->modeloProducto->traerProductos();
        $marcas = $this->modeloMarca->traerMarcas();
        $this->vistaProducto->listarProductos($perfumes, $marcas);
    }

    function agregarProducto(){
        $this->helper->checkLoggedIn();
        $nombre = $_POST ['nombre'];
        $marca = $_POST ['marca'];
        $tipo = $_POST ['tipo'];
        $tamanio = $_POST ['tamanio'];
        $genero = $_POST ['genero'];
        $precio = $_POST ['precio'];

        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png"){
            $this->modeloProducto->agregarProducto($nombre, $marca, $tipo, $tamanio, $genero, $precio, $_FILES['imagen']['tmp_name']);
        }
        else {
            $this->modeloProducto->agregarProducto($nombre, $marca, $tipo, $tamanio, $genero, $precio);
        }

        header("Location: " . BASE_URL);
    }

    function mostrarFormAgregar(){
        $this->helper->checkLoggedIn();
        $marcas = $this->modeloMarca->traerMarcas();
        $this->vistaProducto->mostrarFormAgregar($marcas);
    }


    function eliminarProducto($id){
        $this->helper->checkLoggedIn();
        $this->eliminarImg ($id);
        $this->modeloProducto->eliminarProducto($id);

        header("Location: " . BASE_URL);
    }

    function cargarFormulario($id){
        $this->helper->checkLoggedIn();
        $perfume = $this->modeloProducto->traerProducto($id);
        $marcas = $this->modeloMarca->traerMarcas();
        $this->vistaProducto->cargarFormulario($perfume, $marcas);
    }

    function modificarProducto($id){
        $this->helper->checkLoggedIn();
        $nombre = $_POST ['nombre'];
        $marca = $_POST ['marca'];
        $tipo = $_POST ['tipo'];
        $tamanio = $_POST ['tamanio'];
        $genero = $_POST ['genero'];
        $precio = $_POST ['precio'];

        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png"){
            $this->eliminarImg ($id);
            $this->modeloProducto->modificarProducto($nombre, $marca, $tipo, $tamanio, $genero, $precio, $_FILES['imagen']['tmp_name'], $id);
        }
        else {
            $this->modeloProducto->modificarProductoSinImg($nombre, $marca, $tipo, $tamanio, $genero, $precio,$id);
        }

        header("Location: " . BASE_URL);
    }

    function mostrarDetalle($id){
        session_start();
        $perfume = $this->modeloProducto->traerProducto($id);
        $this->vistaProducto->mostrarDetalle($perfume);
    }

    function filtrar(){
        session_start();
        $marca = $_POST ['marca'];
        $perfumes = $this->modeloProducto->traerProdMarca($marca);
        $marcas = $this->modeloMarca->traerMarcas();
        $this->vistaProducto->listarProductos($perfumes, $marcas);
    }

    function eliminarImg ($id){
        $perfume = $this->modeloProducto->traerProducto($id);
        unlink($perfume->imagen);
    }
}