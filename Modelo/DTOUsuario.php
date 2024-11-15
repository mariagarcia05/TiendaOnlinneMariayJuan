<?php
// Archivo DTOUsuario.php

class DTOUsuario {
    private $usuario;
    private $contrasena;
    private $nombre;
    private $apellido;
    private $domicilio;
    private $telefono;

    public function __construct($usuario, $contrasena,$nombre,$apellido,$domicilio,$telefono) {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->domicilio = $domicilio;
        $this->telefono = $telefono;
    }

    public function getUsuario() {
        return $this->usuario;
    }
    public function getContrasena() {
        return $this->contrasena;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getDomicilio() {
        return $this->domicilio;
    }
    public function getTelefono() {
        return $this->telefono;
    }



    // Método solo para prueba; no deberías mostrar contraseñas en producción.
    public function mostrarInfo() {
        return "DTOUsuario: " . $this->usuario . ", Contraseña: " . $this->contrasena;
    }
}
?>
