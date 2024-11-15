<?php
session_start();
$domicilio = isset($_REQUEST['domicilio']) ? $_REQUEST['domicilio'] : null;
$telefono = isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : null;
$nickname = isset($_REQUEST['nickname']) ? $_REQUEST['nickname'] : null;
$contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : null;
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
$apellido = isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>
        Almacenamiento de datos en sesión.
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/registro.css">
</head>

<body>
<div class="formulario">
    <h1>Registro</h1><br>
    <form action="../Controlador/Registro.php" method="post">
        <label for="nickname">Nickname:</label>
        <input type="text" name="nickname"><?php if(!empty($nickname)) {print "<p style='color: red;'> $nickname</p>";}?><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="text" name="contrasena"><?php if(!empty($contrasena)) { print "<p style='color: red;'> $contrasena</p>";}?><br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><?php if(!empty($nombre)) { print "<p style='color: red;'>$nombre</p>";}?><br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido"><?php if(!empty($apellido)) { print "<p style='color: red;'> $apellido</p>";}?><br><br>
        <label for="domicilio">Domicilio:</label>
        <input type="text" name="domicilio"><?php if(!empty($domicilio)) { print "<p style='color: red;'> $domicilio</p>";}?><br><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono"><?php if(!empty($telefono)) { print "<p style='color: red;'> $telefono</p>";}?><br><br>
        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>
</div>
</body>
</html>