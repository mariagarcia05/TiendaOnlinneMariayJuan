<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>
        Almacenamiento de datos en sesión.
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/inicioSesion.css">
</head>

<body>
<div class="formulario">
    <form action="../Controlador/login.php" method="post">
        <h1>Iniciar Sesión</h1><br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario"><br><br>
        <label for="password">Contraseña:</label>
        <input type="text" name="password"><br><br>
        <?php if (isset($mensaje)){
            print "<p style='color: red'>$mensaje</p>";
        } ?>

        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
        <br><br>
        <a href="../Vista/Registrar.php">Registrar</a>

    </form>
</div>

</body>
</html>