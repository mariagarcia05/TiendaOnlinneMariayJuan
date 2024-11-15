<?php
session_start();
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>
        Almacenamiento de datos en sesión.
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/eliminar.css">
</head>

<body>
<h1>Menú Trastienda</h1>
<h3>Eliminar Producto</h3>
<form action="../Controlador/EliminarProducto.php" method="post">
    <label for="id">ID Producto:<input type="text" name="id"></label><?php if(!empty($id)) { print "<p style='color: red;'>$id</p>";}?><br>
    <br>
    <button type="submit">Enviar</button>
    <button type="reset">Borrar</button>
    <p><a href="inicioTrastienda.html">Volver a la trastienda</a></p>

</form>
<footer>
    <p>&copy; 2024 Tienda de Informática. Todos los derechos reservados.</p>
</footer>
</body>
</html>