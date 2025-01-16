<?php
include_once('../conexion.php');

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$sql = "
    SELECT 
        t.id, 
        t.nombre, 
        t.imagen, 
        t.estado, 
        t.director, 
        rc.nombre AS coordinador 
    FROM tecnologicos t
    LEFT JOIN registros_coordinadores rc ON t.id = rc.tecnologico
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'imagen' => $row['imagen'],
            'estado' => $row['estado'],
            'director' => $row['director'],
            'coordinador' => $row['coordinador'] 
        ];
    }

    // Enviar los datos como JSON
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([]);
}

// Cerrar la conexión
$conn->close();
?>
