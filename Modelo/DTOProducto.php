<?php

class DTOProducto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $id_Cliente;

    public function __construct($nombre, $descripcion, $precio) {
//        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
//        $this->id_Cliente = $idCliente; //esta en duda de como meter el id_cliente
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdCliente() {
        return $this->id_Cliente;
    }

    /**
     * @return mixed
     */
    public function getPrecio() {
        return $this->precio;
    }

    /**
     * @return mixed
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * @return mixed
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * @param mixed $id
     */
    public function setId($id){
        $this->id = $id;
    }
    public function setId_cliente($id_cliente){
        $this->id_Cliente = $id_cliente;
    }

    /**
     * @param mixed $descripcion
     */
    public function anadirADescripcion($descripcion) {
        $this->descripcion .= $descripcion;
    }

    public function mostrarInfo() {
        return "id: " . $this->id . ", nombre: " . $this->nombre . ", Descripcion: " . $this->descripcion . ", Precio: " . $this->precio;
    }



}