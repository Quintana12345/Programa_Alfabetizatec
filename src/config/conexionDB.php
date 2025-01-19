<?php
class Database {
    private $host = "localhost"; // Cambia según tu servidor
    private $db_name = "Alfabetizatec"; // Cambia por el nombre de tu base de datos
    private $username = "root"; // Cambia por tu usuario
    private $password = "SMEhpA6j2EAykq3"; // Cambia por tu contraseña
    private $conn;

    // Singleton: Asegura que solo haya una instancia activa de la conexión
    private static $instance;

    // Constructor privado para evitar instanciación directa
    private function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Verifica si hay errores de conexión
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    // Método para obtener la instancia de la conexión
    public static function getConnection() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->conn;
    }
}
?>
