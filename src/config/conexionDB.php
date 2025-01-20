
<?php

// Cargar el autoload de Composer
require_once __DIR__ . '/../../vendor/autoload.php'; // Asegúrate de que esta ruta sea correcta

// Cargar las variables de entorno desde el archivo .env en la raíz
use Dotenv\Dotenv;

// Cambiar la ruta del .env para que apunte a la raíz del proyecto
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../'); // Asegúrate que apunta a la raíz del proyecto
$dotenv->load();

// Clase Database para gestionar la conexión
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    private static $instance;

    private function __construct() {
        // Obtiene las variables del entorno cargadas por dotenv
        $this->host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];

        // Establece la conexión con MySQL usando mysqli
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Verifica si hay errores de conexión
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    // Obtiene la conexión (singleton)
    public static function getConnection() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->conn;
    }
}

?>
