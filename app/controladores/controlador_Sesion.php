<?php
include_once './app/vistas/vista_Sesion.php';
include_once './app/modelos/modelo_Usuario.php';

class Controlador_Sesion {
    private $modeloUsuario;
    private $vistaSesion;

    public function __construct () {
        $this->modeloUsuario = new Modelo_Usuario;
        $this->vistaSesion = new Vista_Sesion;
    }

    public function mostrarFormLogin() {
        $this->vistaSesion->mostrarFormLogin();
    }

    public function validarUsuario(){
        $email = $_POST['email'];
        $contrasenia = $_POST['contrasenia'];

        $usuario = $this->modeloUsuario->traerUsuario($email);

        if ($usuario && password_verify($contrasenia, $usuario->contrasenia)) {

            session_start();
            $_SESSION['USER_ID'] = $usuario->id_usuario;
            $_SESSION['USER_EMAIL'] = $usuario->email;
            $_SESSION['IS_LOGGED'] = true;

            header("Location: " . BASE_URL);
        } 
        else {
           $this->vistaSesion->mostrarFormLogin("El usuario o la contraseña no existe.");
        }

    }

    public function desloguear() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }

    public function check (){
        session_start();
        var_dump($_SESSION);
    }

}