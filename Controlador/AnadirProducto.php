<?php
require "ControlProductos.php";
session_start();
$control = new ControlProductos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre= isset($_POST["nombre"])?$_POST["nombre"]:null;
    $precio= isset($_POST["precio"])?$_POST["precio"]:null;
    $descripcion= isset($_POST["descripcion"])?$_POST["descripcion"]:null;
    $avisoNombre = null;
    $avisoPrecio = null;
    $avisoDescripcion = null;

    $producto = new DTOProducto($nombre,$descripcion, $precio);
    $productos=$control->guardarProducto($producto);
    if (is_array($productos)){

        for ($i = 0; $i < count($productos); $i++){
            switch ($productos[$i]){
                case 1: $avisoNombre="Nombre es Obligatorio"; break;
                case 2: $avisoNombre="El nombre ya existe"; break;
                case 3: $avisoNombre = "el nombre esta mal puesto"; break;
                case 4: $avisoPrecio="Precio es Obligatorio"; break;
                case 5: $avisoPrecio="El precio debe ser mayor a 0"; break;
                case 6: $avisoDescripcion="Descripcion es Obligatorio"; break;
            }
        }


    if (!empty($avisoNombre) || !empty($avisoPrecio) || !empty($avisoDescripcion) ){
        header("Location: ../Vista/AnadirProducto.php?nombre=$avisoNombre&precio=$avisoPrecio&descripcion=$avisoDescripcion");
        exit();
    }
    }else {
        header("Location: ../Vista/inicioTrastienda.html");
    }

}


