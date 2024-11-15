<?php
require_once 'ControlUsuarios.php';
session_start();
$control = new ControlUsuarios();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $domicilio = isset($_POST['domicilio']) ? $_POST['domicilio'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : null;
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
    $avisoDomicilio = $avisoTelefono = $avisoNickname = $avisoContrasena = $avisoNombre = $avisoApellido = null;
    $usuario = new DTOUsuario($nickname,$contrasena,$nombre,$apellido,$domicilio,$telefono);
    $comprobar =$control->registrarUsuario($usuario);
    if (is_array($comprobar)){
        for ($i = 0; $i < count($comprobar); $i++){
            switch ($comprobar[$i]){
                case 1: $avisoDomicilio = "El domicilio es obligatorio"; break;
                case 2: $avisoTelefono = "El telefono es obligatorio"; break;
                case 3: $avisoTelefono = "El telefono tiene que estar completo"; break;
                case 4: $avisoNickname = "El nickname es obligatorio"; break;
                case 5: $avisoContrasena= "El contrasena es obligatorio"; break;
                case 6: $avisoContrasena= "No se a puesto correctamente la contrasena"; break;
                case 7: $avisoNombre = "El nombre es obligatorio"; break;
                case 8: $avisoNombre = "el nombre esta mal puesto"; break;
                case 9: $avisoApellido = "El apellido es obligatorio"; break;
            }
        }

    if (!empty($avisoDomicilio) || !empty($avisoTelefono) || !empty($avisoNickname) || !empty($avisoContrasena) || !empty($avisoNombre) || !empty($avisoApellido)) {
        header("Location: ../Vista/Registrar.php?" .
            "domicilio=$avisoDomicilio" .
            "&telefono=$avisoTelefono" .
            "&nickname=$avisoNickname" .
            "&contrasena=$avisoContrasena" .
            "&nombre=$avisoNombre" .
            "&apellido=$avisoApellido");
        exit();
    } }else {
//        $control->registrarUsuario($usuario);
        header("Location: ../Vista/inicio.php");

    }
}




?>