<?php
require "../Modelo/DAOUsuario.php";
class ControlUsuarios {
    public function __construct(){
        $this->daousuario = new DAOUsuario();
    }
    public function registrarUsuario($usuario){
        if (preg_match("/^[0-9]{9}$/",$usuario->getTelefono()) &&
            preg_match("/^[a-zA-Z0-9]{1,20}$/",$usuario->getContrasena()) &&
            ctype_alpha($usuario->getNombre()) &&
            !($usuario->getDomicilio() === null || $usuario->getDomicilio() == "") &&
            !($usuario->getNombre() === null || $usuario->getNombre() == "") &&
            !($usuario->getUsuario() === null || $usuario->getUsuario() == "") &&
            !($usuario->getApellido() === null || $usuario->getApellido() == "") &&
            !($usuario->getTelefono() === null || $usuario->getTelefono() == "") &&
            !($usuario->getContrasena() === null || $usuario->getContrasena() == "")) {
            $this->daousuario->addUsuario($usuario);
            return true;
        } else{
            $arrayError=[];

            if (empty($domicilio)) {
                $arrayError[] = 1;
            }
            if (empty($telefono)) {
                $arrayError[] = 2;
            }elseif (!preg_match("/^[0-9]{9}$/",$telefono)) {
                $arrayError[] = 3;
            }
            if (empty($nickname)) {
                $arrayError[] = 4;
            }
            if (empty($contrasena)) {
                $arrayError[] = 5;
            }elseif (!preg_match("/^[a-zA-Z0-9]{1,20}$/",$contrasena)) {
                $arrayError[] = 6;
            }
            if (empty($nombre)) {
                $arrayError[] = 7;
            } elseif (!ctype_alpha($nombre)) {
                $arrayError[] = 8;
            }
            if (empty($apellido)) {
                $arrayError[] = 9;
            }
            return $arrayError;
        }


    }
    public function darId($usuario){
       return $this->daousuario ->obtenerid($usuario);
    }
    public function mostrarUsuarios(){
        return $this->daousuario->mostrarUsuarios();

    }


}