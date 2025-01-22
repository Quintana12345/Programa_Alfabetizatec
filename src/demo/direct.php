<?php
$conn = new mysqli('localhost', 'root', 'SMEhpA6j2EAykq3', 'Alfabetizatec');

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
} else {
    echo 'Conexión exitosa';
}

$conn->close();
?>
