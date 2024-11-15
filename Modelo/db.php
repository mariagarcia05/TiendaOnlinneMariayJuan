<?php
class db {
    private static $host = 'localhost:3306';
    private static $dbName = 'mi_tienda';
    private static $username = 'root'; // Cambia según tu configuración
    private static $password = '';     // Cambia según tu configuración
    private static $conexion = null;

    public static function getConnection() {
        if (self::$conexion === null) {
            try {
                self::$conexion = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbName, self::$username, self::$password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return self::$conexion;
    }
}
?>