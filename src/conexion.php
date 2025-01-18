<?php
// Parámetros de conexión a la base de datos
$host = 'localhost';       // Cambiar si es necesario
$user = 'root';            // Cambiar si usas otro usuario
$password = '';            // Cambiar si usas otra contraseña
$dbname = 'alfabetizatec';  // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
