<?php
//require '../Modelo/DTOUsuario.php';
//require '../Modelo/DTOProducto.php';
require 'ControlProductos.php';
require 'ControlUsuarios.php';
session_start();

$controlProductos = new ControlProductos();
$controlUsuarios = new ControlUsuarios();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_Cliente= $controlUsuarios->darId($_SESSION["usuario"]);
    $id = isset($_POST["productoAnadir"]) ? $_POST["productoAnadir"] : null;
    $idEli = isset($_POST["productoEliminar"]) ? $_POST["productoEliminar"] : null;
    if (isset($id)) {
    $controlProductos->anadirProducto($id,$id_Cliente);


    $_SESSION["carrito"][] = $controlProductos->darProducto($id);
    //podemos coger todos los datos haciendo una consulta del producto
    //y se puede crear aqui la sesion del carrito
    header("Location: ../Vista/inicioProductos.php");
    } elseif (isset($idEli)) {
        $controlProductos->modificarProductoANull($idEli);
        for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
            if ($_SESSION["carrito"][$i]->getId() == $idEli) {
                unset($_SESSION["carrito"][$i]);
                sort($_SESSION["carrito"]);
                header("Location: ../Vista/carritoMenu.php");
                exit();
            }
        }
//        unset($_SESSION["carrito"]->getId,$idEli);

    }
}



?>