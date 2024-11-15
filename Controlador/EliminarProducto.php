<?php
require "ControlProductos.php";
session_start();
$control = new ControlProductos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id= isset($_POST["id"])?$_POST["id"]:null;
    $avisoId = null;
    $comprobar =$control->eliminarProductoId($id);
if ($comprobar) {
        $avisoId="Id es Obligatorio";
        header("Location: ../Vista/EliminarProducto.php?id=$avisoId");
        exit();

}else {


//        $control->eliminarProductoId($id);

        header("Location: ../Vista/inicioTrastienda.html");
    }

}
