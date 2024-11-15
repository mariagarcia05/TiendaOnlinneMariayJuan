<?php
require_once "db.php";
require_once "DTOUsuario.php";
class DAOUsuario {
    private $conexion;
    public function __construct() {
        $this->conexion = DB::getConnection();
    }
    public function addUsuario($usuario) {
        $stmt = $this->conexion -> prepare("INSERT INTO cliente (nombre, apellido,nickname,password,telefono,domicilio)
VALUES (:nombre, :apellido,:nickname, :password,:telefono, :domicilio)");
        $stmt->bindParam(":nombre",$usuario->getNombre());
        $stmt->bindParam(":apellido",$usuario->getApellido());
        $stmt->bindParam(":nickname",$usuario->getUsuario());
        $stmt->bindParam(":password",$usuario->getContrasena());
        $stmt->bindParam(":telefono",$usuario->getTelefono());
        $stmt->bindParam(":domicilio",$usuario->getDomicilio());
        $stmt->execute();
    }
    public function obtenerid($usuario) {
        $stmt = $this->conexion -> prepare("SELECT id FROM cliente WHERE nickname=:nickname and password=:password");
        $nickname = $usuario->getUsuario();
        $password = $usuario->getContrasena();

        $stmt->bindParam(":nickname", $nickname);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($resultado && isset($resultado["id"])) {
            return $resultado["id"];
        } else {
            return null;
        }

    }
    public function mostrarUsuarios(){
        $stmt = $this->conexion -> prepare("SELECT * FROM cliente");
        if($stmt->execute()){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
    }


}