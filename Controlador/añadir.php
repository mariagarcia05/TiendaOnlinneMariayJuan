<?php
session_start();

$dbname = "mi_tienda";
$servername = "localhost:3306";
$username = "root";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO producto (nombre, descripcion, precio) VALUES (:nombre, :descripcion, :precio)");
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];


        if (!empty($nombre) && !empty($descripcion) && !empty($precio)) {
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':precio', $precio);
            $stmt->execute();
            echo "Se ha añadido correctamente";
            exit();
        } else {
            echo "Por favor, llena todos los campos.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
