<?php
// Iniciar la sesión
require_once '../Modelo/DTOUsuario.php';

session_start();

// Incluir el archivo de la clase DTOUsuario

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Comprobar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];

    // Crear una nueva instancia de la clase DTOUsuario
    $nuevoUsuario = new DTOUsuario($usuario, $contrasena,"ads","ada","adasd","009809");

    // Guardar el objeto DTOUsuario en la sesión
    $_SESSION['usuario'] = $nuevoUsuario;

    header('Location: comprobar.php');
}
?>
