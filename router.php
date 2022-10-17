<?php
require_once './app/controladores/controlador_Producto.php';
require_once './app/controladores/controlador_Marca.php';
require_once './app/controladores/controlador_Sesion.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    //CASE SESION
    case 'check':
        $controlador_Sesion = new Controlador_Sesion();
        $controlador_Sesion->check();
        break;

    case 'login':
        $controlador_Sesion = new Controlador_Sesion();
        $controlador_Sesion->mostrarFormLogin();
        break;
    
    case 'validar':
        $controlador_Sesion = new Controlador_Sesion();
        $controlador_Sesion->validarUsuario();
        break;

    case 'logout':
        $controlador_Sesion = new Controlador_Sesion();
        $controlador_Sesion->desloguear();
        break;

    //CASE PRODUCTOS
    case 'listar':
        $controlador_Producto = new controlador_Producto();
        $controlador_Producto->listarProductos();
        break;
    case 'agregarProducto':
        $controlador_Producto = new controlador_Producto();
        $controlador_Producto->agregarProducto();
        break;
    
     case 'formAgregarProd':
        $controlador_Producto = new controlador_Producto();
        $controlador_Producto->mostrarFormAgregar();
        break;

    case 'eliminarProducto':
        $controlador_Producto = new controlador_Producto();
        $id = $params[1];
        $controlador_Producto->eliminarProducto($id);
        break;

    case 'formModificarProd':
        $controlador_Producto = new controlador_Producto();
        $id = $params[1];
        $controlador_Producto->cargarFormulario($id);
        break;

    case 'modificarProducto':
        $controlador_Producto = new controlador_Producto();
        $id = $params[1];
        $controlador_Producto->modificarProducto($id);
        break;

    case 'mostrarDetalle':
        $controlador_Producto = new controlador_Producto();
        $id = $params[1];
        $controlador_Producto->mostrarDetalle($id);
        break;

    case 'filtrar':
        $controlador_Producto = new controlador_Producto();
        $controlador_Producto->filtrar();
        break;

    //CASE DE MARCAS
    case 'listarMarcas':
        $controlador_Marca = new controlador_Marca();
        $controlador_Marca->listarMarcas();
        break;
    
    case 'agregarMarca':
        $controlador_Marca = new controlador_Marca();
        $controlador_Marca->agregarMarca();
        break;

    case 'eliminarMarca':
         $controlador_Marca = new controlador_Marca();
         $id = $params[1];
         $controlador_Marca->eliminarMarca($id);
        break;

    case 'formModificarMarca':
        $controlador_Marca = new controlador_Marca();
        $id = $params[1];
        $controlador_Marca->cargarFormulario($id);
        break;
    
    case 'modificarMarca':
        $controlador_Marca = new controlador_Marca();
        $id = $params[1];
        $controlador_Marca->modificarMarca($id);
        break;
    
    case 'formAgregarMarca':
        $controlador_Marca = new controlador_Marca();
        $controlador_Marca->formAgregarMarca();
        break;
    
    default:
        echo('404 Page not found');
        break;
}
 