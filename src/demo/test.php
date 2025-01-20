<?php

// Incluir el archivo de conexión
include('../config/conexionDB.php');

// Obtener la conexión
$conn = Database::getConnection();

// Consulta de prueba
$query = "SELECT * FROM estados";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Estado: " . $row['nombre'] . "<br>";
    }
} else {
    echo "No hay resultados.";
}

// Cerrar la conexión
$conn->close();

?>
