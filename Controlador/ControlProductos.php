<?php
require '../Modelo/DAOProducto.php';
class ControlProductos {

    public function __construct() {
        $this->productos = new DAOProducto();
    }
    public function anadirProducto($id,$id_Cliente) {
        $this->productos->ActualizarProducto($id,$id_Cliente);
        return true;
    }
    public function modificarProductoANull($id) {
        $this->productos->ActualizarProducto($id,null);
        return true;
    }
    public function eliminarProducto($id,$id_Cliente) {

    }
    public function mostrarProducto($id,$id_Cliente) {

    }
    public function cogerProductos(){
        return $this->productos->cogerProductosNull();
    }
    public function darProducto($id) {
        return $this->productos->dameProducto($id);
    }
    public function mostrarProductos() {
        return $this->productos->mostrarProductos();
    }
    public function buscarNombre($nombre){
    return $this->productos->buscarNombre($nombre);
    }
//    public function guardarProducto($nombre,$precio,$descripcion){
////        if($precio<100)
//        $this->productos->guardarProducto($nombre,$precio,$descripcion);
//        return true;
//    }
    public function guardarProducto($producto){
        if ($producto->getPrecio() > 0 && !($this->buscarNombre($producto->getNombre())) && ctype_alpha($producto->getNombre())
        && !($producto->getPrecio() === null || $producto->getPrecio() == "") &&
            !($producto->getNombre() === null || $producto->getNombre() == "") &&
            !($producto->getDescripcion() === null || $producto->getDescripcion() == "")) {


            if ($producto->getPrecio() < 10){
                 $producto-> anadirADescripcion(" || producto de oferta ");
            } elseif ($producto->getPrecio() >= 200){
                $producto-> anadirADescripcion(" || producto de calidad ");
            }

            $this->productos->guardarProducto($producto);
            return true;
        } else {
            $arrayError=[];
            $nombre = $producto->getNombre();
            $precio = $producto->getPrecio();
            $descripcion = $producto->getDescripcion();

                if (!isset($nombre) || $nombre == ""){
                    $arrayError[] = 1;
                } elseif ($this->buscarNombre($nombre)){
                    $arrayError[] = 2;
                } elseif (!ctype_alpha($nombre)) {
                    $arrayError[] = 3;
                }

                if (!isset($precio) || $precio == ""){
                    $arrayError[] = 4;
                } elseif ($precio < 0){
                    $arrayError[] = 5;
                }

                if (!isset($descripcion) || $descripcion == ""){
                    $arrayError[] = 6;
                }
            return $arrayError;
        }
    }

    public function eliminarProductoId($id){
        if (!empty($id)){
        $this->productos->eliminarProductoId($id);
        return true;
        }else{
            return false;
        }
    }
}