<?php
require "../Controlador/ControlProductos.php";
session_start();
$control = new ControlProductos();
$resultado = $control->mostrarProductos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Almacenamiento de datos en sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/MostrarProducto.css">
</head>

<body>

<table>
    <caption>Tabla de productos</caption>
    <thead>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DESCRIPCIÓN</th>
        <th>PRECIO</th>
        <th>CLIENTE_ID</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($resultado as $producto) {
        echo "<tr>";
        echo "<td>" . $producto["id"] . "</td>";
        echo "<td>" . $producto["nombre"] . "</td>";
        echo "<td>" . $producto["descripcion"] . "</td>";
        echo "<td>" . $producto["precio"] . "</td>";
        echo "<td>" . ($producto["cliente_id"] ?? "NULL") . "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
<p><a href="inicioTrastienda.html">Volver a la trastienda</a></p>

</body>
</html>
