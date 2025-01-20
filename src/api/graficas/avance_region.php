<?php
session_start();

// Establecer el tipo de respuesta como JSON
header('Content-Type: application/json');

try {
    // Incluir el archivo de conexión
    include('../../config/conexionDB.php');

    // Obtener la conexión
    $conn = Database::getConnection();

    // Verificar si se recibió el parámetro de la región
    if (!isset($_GET['region_nombre']) || empty($_GET['region_nombre'])) {
        echo json_encode([
            'success' => false,
            'message' => 'El nombre de la región es obligatorio.'
        ]);
        exit;
    }

    // Obtener el nombre de la región del parámetro GET
    $regionNombre = $_GET['region_nombre'];

    // Consulta para obtener las metas, los nombres de los tecnológicos, y los estudiantes aprobados en la región
    $queryMetasEstudiantesAprobadosPorTecnologico = "
      SELECT 
        t.id AS tecnologico_id, 
        t.nombre AS tecnologico_nombre,
        SUM(COALESCE(p.meta, 0)) AS meta_total,  -- Sumar las metas de los programas por cada tecnológico
        COUNT(s.id_estudiante) AS estudiantes_aprobados  -- Contar los estudiantes con status 'Aprobado'
      FROM tecnologicos t
      LEFT JOIN programas p ON t.id = p.id_tecnologico  -- LEFT JOIN para incluir tecnológicos sin programas
      LEFT JOIN estados e2 ON t.estado_id = e2.id
      LEFT JOIN regiones r ON e2.id_region = r.id
      LEFT JOIN solicitudes s ON p.id = s.id_programa AND s.status = 'Aprobado'  -- Filtrar por estudiantes aprobados
      WHERE r.nombre = ?  -- Filtrar por el nombre de la región
      GROUP BY t.id, t.nombre  -- Agrupar por tecnológico
    ";

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conn->prepare($queryMetasEstudiantesAprobadosPorTecnologico);
    $stmt->bind_param('s', $regionNombre);  // 's' indica que es una cadena

    // Ejecutar la consulta
    $stmt->execute();
    $resultMetasEstudiantesAprobadosPorTecnologico = $stmt->get_result();

    // Verificar si se obtuvieron resultados
    if ($resultMetasEstudiantesAprobadosPorTecnologico->num_rows > 0) {
        $data = [
            'tecnologicos' => []
        ];

        // Almacenar los datos de los tecnológicos con la meta total y estudiantes aprobados
        while ($row = $resultMetasEstudiantesAprobadosPorTecnologico->fetch_assoc()) {
            $tecnologicoId = $row['tecnologico_id'];
            $tecnologicoNombre = $row['tecnologico_nombre'];
            $metaTotal = $row['meta_total'];
            $estudiantesAprobados = $row['estudiantes_aprobados'];

            // Agregar la información del tecnológico a la respuesta
            $data['tecnologicos'][] = [
                'tecnologico_id' => $tecnologicoId,
                'tecnologico_nombre' => $tecnologicoNombre,
                'meta_total' => $metaTotal,
                'estudiantes_aprobados' => $estudiantesAprobados
            ];
        }

        // Enviar la respuesta JSON con los datos
        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    } else {
        // Si no se encontraron resultados, enviar los tecnológicos aunque no haya datos
        $data = [
            'tecnologicos' => []
        ];
        
        // Obtener todos los tecnológicos para la región
        $queryTecnologicos = "
            SELECT t.id AS tecnologico_id, t.nombre AS tecnologico_nombre
            FROM tecnologicos t
            LEFT JOIN estados e2 ON t.estado_id = e2.id
            LEFT JOIN regiones r ON e2.id_region = r.id
            WHERE r.nombre = ?
        ";
        
        $stmtTecnologicos = $conn->prepare($queryTecnologicos);
        $stmtTecnologicos->bind_param('s', $regionNombre);
        $stmtTecnologicos->execute();
        $resultTecnologicos = $stmtTecnologicos->get_result();
        
        // Agregar los tecnológicos sin programas o solicitudes
        while ($row = $resultTecnologicos->fetch_assoc()) {
            $tecnologicoId = $row['tecnologico_id'];
            $tecnologicoNombre = $row['tecnologico_nombre'];
            
            // Agregar el tecnológico con valores nulos
            $data['tecnologicos'][] = [
                'tecnologico_id' => $tecnologicoId,
                'tecnologico_nombre' => $tecnologicoNombre,
                'meta_total' => 0,
                'estudiantes_aprobados' => 0
            ];
        }

        // Enviar la respuesta JSON
        echo json_encode([
            'success' => true,
            'data' => $data
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
