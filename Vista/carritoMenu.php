<?php
require "../Controlador/ControlProductos.php";
session_start();

//print_r($_SESSION["carrito"]);
?>
<h1>Tienda informática</h1>
<h3>Tu Carrito</h3>
<p>Aqui estan todos los productos que has pedido</p>
<form action="../Controlador/ControlCarrito.php" method="post">
    <link rel="stylesheet" href="../CSS/carrito.css">

<table>
    <?php
    $mitad = count($_SESSION["carrito"])/2;
    $total = count($_SESSION["carrito"])-$mitad;
    $contador=0;

    print "<tr>";
    for ($i=0; $i < $total; $i++) {
        print '<td style="align-items: center">
                <img src="../Recursos/'.$_SESSION["carrito"][$contador]->getNombre().'.jpg" alt="Enviar" width="200" height="200">
                <button type="submit" value="'.$_SESSION["carrito"][$contador]->getId().'" name="productoEliminar">Eliminar '.$_SESSION["carrito"][$contador]->getNombre().'</button>
            </td>';
        $contador++;
    }
    print "</tr>";
    print "<tr>";


    for ($i=1; $i <= $mitad; $i++) {
        print '<td style="align-items: center">
                <img src="../Recursos/'.$_SESSION["carrito"][$contador]->getNombre().'.jpg" alt="Enviar" width="200" height="200">
                <button type="submit" value="'.$_SESSION["carrito"][$contador]->getId().'" name="productoEliminar">Eliminar '.$_SESSION["carrito"][$contador]->getNombre().'</button>
            </td>';
        $contador++;
    }
    print "</tr>";


    ?>


</table>
    <a href="inicioProductos.php">carrito</a>
    <footer>
        <p>&copy; 2024 Tienda de Informática. Todos los derechos reservados.</p>
    </footer>
</form>