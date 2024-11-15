<?php
require_once 'ControlUsuarios.php';
session_start();
    $control = new ControlUsuarios();
    if (isset($_SESSION['usuario'])) {
        $resultado = $control->mostrarUsuarios();
        $tnickname = false;
        $tcontrasena = false;
        $nombre =$_SESSION['usuario']->getUsuario();
        $contrasena=$_SESSION['usuario']->getContrasena();
//        print $nombre ."sfs";
//        print $contrasena;
        foreach ($resultado as $fila) {
            if ($fila["nickname"] == $nombre) {
                $tnickname = true;
            }
            if ($fila["password"] == $contrasena) {
                $tcontrasena = true;
            }
        }
        if (!$tnickname && !$tcontrasena) {
            header("Location: ../Vista/registrar.php");
            exit();
        } elseif (!$tnickname || !$tcontrasena) {
            $aviso = "No se han puesto bien el nickname o la contraseña";
            header("Location: ../Vista/inicio.php?mensaje=$aviso");
            exit();
        } else {
            header("Location: ../Vista/inicioProductos.php");//Falta poner la pagina
            exit();
        }
}

?>