<?php
session_start();

// Establecer el tipo de respuesta como JSON
header('Content-Type: application/json');

try {
    // Incluir el archivo de conexión
    include('../../config/conexionDB.php');

    // Obtener la conexión
    $conn = Database::getConnection();

    // Consulta para obtener los datos agrupados por región
    $queryResumenPorRegion = "
       SELECT r.id AS region_id, r.nombre AS region_nombre, 
              SUM(p.meta) AS meta_total,
              COUNT(DISTINCT s.id_estudiante) AS estudiantes_aprobados,
              COUNT(DISTINCT edu.id) AS total_educadores
       FROM regiones r
       JOIN estados e ON r.id = e.id_region 
       JOIN tecnologicos t ON e.id = t.estado_id 
       LEFT JOIN programas p ON t.id = p.id_tecnologico
       LEFT JOIN solicitudes s ON s.id_programa = p.id AND s.status = 'Aprobado'
       LEFT JOIN educadores edu ON edu.id_tecnologico = t.id
       GROUP BY r.id, r.nombre;
    ";

    // Ejecutar la consulta
    $stmt = $conn->prepare($queryResumenPorRegion);
    $stmt->execute();
    $resultResumenPorRegion = $stmt->get_result();

    // Verificar si se obtuvieron resultados
    if ($resultResumenPorRegion->num_rows > 0) {
        $data = [
            'regiones' => []
        ];

        // Recorrer los resultados y construir el resumen por región
        while ($row = $resultResumenPorRegion->fetch_assoc()) {
            $regionId = $row['region_id'];
            $regionNombre = $row['region_nombre'];
            $estudiantesAprobados = $row['estudiantes_aprobados'];
            $totalEducadores = $row['total_educadores'];

            // Si la región aún no está en los datos, inicializarla
            if (!isset($data['regiones'][$regionId])) {
                $data['regiones'][$regionId] = [
                    'region_nombre' => $regionNombre,
                    'meta_total' => $row['meta_total'],
                    'estudiantes_aprobados' => $estudiantesAprobados,
                    'total_educadores' => $totalEducadores
                ];
            }
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

    // Cerrar la declaración preparada
    $stmt->close();
} catch (Exception $e) {
    // Manejo de errores
    echo json_encode([
        'success' => false,
        'message' => 'Hubo un error al procesar la solicitud.',
        'error_details' => $e->getMessage()
    ]);
}
?>
