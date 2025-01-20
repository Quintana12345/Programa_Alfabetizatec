<?php
header('Content-Type: application/json');

// Incluir archivo de configuración de la base de datos
include '../config/conexionDB.php';

$response = [
    'status' => false,
    'message' => 'Método no permitido o error en la solicitud',
    'data' => []
];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_tecnologico = isset($_GET['id_tecnologico']) ? intval($_GET['id_tecnologico']) : 0;

    if ($id_tecnologico === 0) {
        $response['message'] = 'ID Tecnológico no válido';
        echo json_encode($response);
        exit;
    }

    // Obtener la conexión a la base de datos utilizando la clase Database
    $conn = Database::getConnection();

    if ($conn->connect_error) {
        $response['message'] = 'Error al conectar a la base de datos';
        echo json_encode($response);
        exit;
    }

    // Consulta SQL para obtener los docentes y sus detalles de nombre y apellido
    $sql = "SELECT e.id, e.id_usuario, e.modalidad, u.nombre, u.apellido 
            FROM educadores e
            INNER JOIN usuarios u ON e.id_usuario = u.id
            WHERE e.id_tecnologico = ? AND e.tipo_participante = 'Docente'";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_tecnologico);
    $stmt->execute();
    $result = $stmt->get_result();

    $educadores = [];
    while ($row = $result->fetch_assoc()) {
        $educadores[] = [
            'id' => $row['id'],
            'id_usuario' => $row['id_usuario'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'modalidad' => $row['modalidad']
        ];
    }

    if (!empty($educadores)) {
        $response['status'] = true;
        $response['message'] = 'Consulta exitosa';
        $response['data'] = $educadores;
    } else {
        $response['message'] = 'No se encontraron docentes para el ID tecnológico proporcionado';
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
    exit;
}

echo json_encode($response);
exit;
