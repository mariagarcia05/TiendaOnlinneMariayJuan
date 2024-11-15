<?php
require "DTOProducto.php";
require "db.php";
class DAOProducto {
    private $conexion;
    public function __construct() {
        $this->conexion = DB::getConnection();
    }

//    public function GuardarProducto($nombre,$descripcion,$precio) {
//        $stmt = $this->conexion->prepare("INSERT INTO producto (nombre,descripcion,precio,cliente_id)
//        VALUES (:nombre,:descripcion,:precio,:cliente_id)");
//        $cliente_id = null;
//        $stmt->bindParam(":nombre", $nombre);
//        $stmt->bindParam(":descripcion", $descripcion);
//        $stmt->bindParam(":precio", $precio);
//        $stmt->bindParam(":cliente_id", $cliente_id);
//        $stmt->execute();
//    }


    public function GuardarProducto($producto) {
        $stmt = $this->conexion->prepare("INSERT INTO producto (nombre,descripcion,precio,cliente_id)
        VALUES (:nombre,:descripcion,:precio,:cliente_id)");
        $cliente_id = null;
        $stmt->bindParam(":nombre", $producto->getNombre());
        $stmt->bindParam(":descripcion", $producto->getDescripcion());
        $stmt->bindParam(":precio", $producto->getPrecio());
        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->execute();
    }
    public function ActualizarProducto($id,$id_Cliente) {
        $stmt = $this->conexion->prepare("UPDATE producto SET cliente_id = :cliente_id WHERE id = :id");
        $stmt->bindParam(":cliente_id", $id_Cliente);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function cogerProductosNull(){
        $arrayProductos = [];
        $stmt = $this->conexion->prepare("SELECT * FROM producto WHERE cliente_id IS NULL");
        if ($stmt->execute()) {
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $fila){
                $producto = new DTOProducto($fila["nombre"],$fila["descripcion"],$fila["precio"]);
                $producto->setId($fila["id"]);
                $arrayProductos[] = $producto;
            }

        }
        return $arrayProductos;
    }
    public function dameProducto($id){
        $stmt = $this->conexion->prepare("SELECT * FROM producto WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $producto = new DTOProducto($resultado[0]["nombre"],$resultado[0]["descripcion"],$resultado[0]["precio"]);
        $producto->setId($resultado[0]["id"]);
        return $producto;
    }
    public function eliminarProductoId($id){
        $stmt = $this->conexion->prepare("DELETE FROM producto WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }


    public function mostrarProductos(){
        $stmt = $this->conexion->prepare("SELECT * FROM producto");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function buscarNombre($nombre)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM producto WHERE nombre = :nombre");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$resultado) {
            return false;
        } else {
            return true;
        }
    }



}