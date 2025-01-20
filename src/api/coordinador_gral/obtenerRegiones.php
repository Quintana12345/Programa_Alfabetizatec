<?php
session_start();

// Establecer el tipo de respuesta como JSON
header('Content-Type: application/json');

try {
    // Incluir el archivo de conexión
    include('../../config/conexionDB.php');

    // Obtener la conexión
    $conn = Database::getConnection();

    // Consulta para contar los estados por región
    $queryEstadosPorRegion = "
        SELECT r.id AS region_id, r.nombre AS region_nombre, COUNT(e.id) AS total_estados
        FROM regiones r
        LEFT JOIN estados e ON r.id = e.id_region
        GROUP BY r.id, r.nombre
    ";
    $resultEstadosPorRegion = $conn->query($queryEstadosPorRegion);

    // Consulta para contar los tecnológicos por región
    $queryTecnologicosPorRegion = "
        SELECT r.id AS region_id, COUNT(t.id) AS total_tecnologicos
        FROM regiones r
        LEFT JOIN estados e ON r.id = e.id_region
        LEFT JOIN tecnologicos t ON e.id = t.estado_id
        GROUP BY r.id
    ";
    $resultTecnologicosPorRegion = $conn->query($queryTecnologicosPorRegion);

    // Verificar si se obtuvieron resultados
    if ($resultEstadosPorRegion->num_rows > 0) {
        $data = [
            'estados_por_region' => []
        ];

        // Almacenar los tecnológicos por región en un array temporal
        $tecnologicosPorRegion = [];
        while ($row = $resultTecnologicosPorRegion->fetch_assoc()) {
            $tecnologicosPorRegion[$row['region_id']] = $row['total_tecnologicos'];
        }

        // Almacenar los datos de estados y tecnológicos por región
        while ($row = $resultEstadosPorRegion->fetch_assoc()) {
            $regionId = $row['region_id'];
            $data['estados_por_region'][] = [
                'region_id' => $regionId,
                'region_nombre' => $row['region_nombre'],
                'total_estados' => $row['total_estados'],
                'total_tecnologicos' => $tecnologicosPorRegion[$regionId] ?? 0
            ];
        }

        // Enviar la respuesta JSON con los datos
        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    } else {
        // Si no hay datos encontrados
        echo json_encode([
            'success' => false,
            'message' => 'No se encontraron datos.'
        ]);
    }
} catch (Exception $e) {
    // Manejo de errores
    echo json_encode([
        'success' => false,
        'message' => 'Hubo un error al procesar la solicitud.',
        'error_details' => $e->getMessage()
    ]);
}
?>
