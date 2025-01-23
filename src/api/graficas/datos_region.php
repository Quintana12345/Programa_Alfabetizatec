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
        SELECT 
            r.id AS region_id,
            r.nombre AS region_nombre,
            t.id AS tecnologico_id,
            t.nombre AS tecnologico_nombre,
            SUM(COALESCE(p.meta, 0)) AS meta_total, -- Sumar metas por región
            COUNT(DISTINCT s.id_estudiante) AS estudiantes_aprobados, -- Contar estudiantes aprobados únicos
            COUNT(DISTINCT e.id) AS total_educadores -- Contar educadores únicos
        FROM regiones r
        LEFT JOIN estados e2 ON r.id = e2.id_region
        LEFT JOIN tecnologicos t ON e2.id = t.estado_id
        LEFT JOIN programas p ON t.id = p.id_tecnologico
        LEFT JOIN solicitudes s ON p.id = s.id_programa AND s.status = 'Aprobado'
        LEFT JOIN educadores e ON t.id = e.id_tecnologico
        GROUP BY r.id, r.nombre, t.id, t.nombre
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
            $tecnologicoId = $row['tecnologico_id'];
            $tecnologicoNombre = $row['tecnologico_nombre'];
            $metaTotal = $row['meta_total'];
            $estudiantesAprobados = $row['estudiantes_aprobados'];
            $totalEducadores = $row['total_educadores'];

            // Si la región aún no está en los datos, inicializarla
            if (!isset($data['regiones'][$regionId])) {
                $data['regiones'][$regionId] = [
                    'region_nombre' => $regionNombre,
                    'tecnologicos' => []
                ];
            }

            // Agregar la información del tecnológico a la región correspondiente
            $data['regiones'][$regionId]['tecnologicos'][] = [
                'tecnologico_id' => $tecnologicoId,
                'tecnologico_nombre' => $tecnologicoNombre,
                'meta_total' => $metaTotal,
                'estudiantes_aprobados' => $estudiantesAprobados,
                'total_educadores' => $totalEducadores
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
