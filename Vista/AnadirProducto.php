<?php
session_start();
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
$descripcion = isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : null;
$precio = isset($_REQUEST['precio']) ? $_REQUEST['precio'] : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>
        Almacenamiento de datos en sesión.
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/anadir.css">
</head>

<body>
<h1>Menú Trastienda</h1>
<div class="container">
<h3>Añadir Producto</h3>
<form action="../Controlador/AnadirProducto.php" method="post">
    <label for="nombre">Nombre:<input type="text" name="nombre"></label><?php if(!empty($nombre)) { print "<p style='color: red;'>$nombre</p>";}?><br>
    <br>
    <label for="descripcion">Descripcion:<input type="text" name="descripcion"></label> <?php if(!empty($descripcion)) {print "<p style='color: red;'> $descripcion</p>";}?><br>
    <br>
    <label for="precio">Precio:<input type="text" name="precio"></label><?php if(!empty($precio)) { print "<p style='color: red;'> $precio</p>";}?><br>
    <br>
    <button type="submit">Enviar</button>
    <button type="reset">Borrar</button>
    <p><a href="inicioTrastienda.html">Volver a la trastienda</a></p>
</form>
</div>
<footer>
    <p>&copy; 2024 Tienda de Informática. Todos los derechos reservados.</p>
</footer>
</body>
</html>

