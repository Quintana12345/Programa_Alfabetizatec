<?php
header('Content-Type: application/json');

// Incluir archivo de configuración de la base de datos
include '../config/conexionDB.php';

// Iniciar sesión para obtener el region_id desde la sesión
session_start();

// Obtener el region_id desde la sesión
$region_id = isset($_SESSION['id_region']) ? $_SESSION['id_region'] : 0;

$response = [
    'status' => false,
    'message' => 'Método no permitido o error en la solicitud',
    'data' => []
];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Verifica que el region_id esté en la sesión
    if ($region_id == 0) {
        $response['message'] = 'No se encontró region_id en la sesión';
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

    // Consulta SQL para obtener los estados filtrados por region_id
    $sql = "SELECT e.id 
            FROM estados e
            WHERE e.id_region = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $region_id);  // Filtrar por region_id
    $stmt->execute();
    $result = $stmt->get_result();

    $estado_ids = [];
    while ($row = $result->fetch_assoc()) {
        $estado_ids[] = $row['id'];
    }

    // Verifica si se encontraron estados
    if (empty($estado_ids)) {
        $response['message'] = 'No se encontraron estados para la región proporcionada';
        echo json_encode($response);
        exit;
    }

    // Convertir el arreglo de estado_ids a una lista separada por comas para usar en la consulta
    $estado_ids_placeholder = implode(',', array_fill(0, count($estado_ids), '?'));

    // Consulta SQL para obtener los tecnológicos filtrados por los estados de la región
    $sql = "SELECT t.id, t.nombre
            FROM tecnologicos t
            WHERE t.estado_id IN ($estado_ids_placeholder)";

    // Preparar los parámetros para la consulta
    $params = [];
    foreach ($estado_ids as $estado_id) {
        $params[] = $estado_id;
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat('i', count($params)), ...$params); // Vincula los valores de estado_ids
    $stmt->execute();
    $result = $stmt->get_result();

    $tecnologicos = [];
    while ($row = $result->fetch_assoc()) {
        $tecnologicos[] = [
            'id' => $row['id'],
            'nombre' => $row['nombre']
        ];
    }

    if (!empty($tecnologicos)) {
        $response['status'] = true;
        $response['message'] = 'Consulta exitosa';
        $response['data'] = $tecnologicos;
    } else {
        $response['message'] = 'No se encontraron tecnológicos para los estados de la región proporcionada';
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
    exit;
}

echo json_encode($response);
exit;
