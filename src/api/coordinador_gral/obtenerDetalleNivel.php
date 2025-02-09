<?php
session_start();

// Establecer el tipo de respuesta como JSON
header('Content-Type: application/json');

try {
    // Incluir el archivo de conexión a la base de datos
    include('../../config/conexionDB.php');

    // Obtener la conexión a la base de datos
    $conn = Database::getConnection();

    // Validar y obtener los parámetros de la URL (GET)
    $nivel = isset($_GET['nivel']) ? trim($_GET['nivel']) : '';
    $idTecnologico = isset($_GET['id_tecnologico']) ? intval($_GET['id_tecnologico']) : 0;

    // Validar que los parámetros requeridos estén presentes
    if (empty($nivel) || $idTecnologico <= 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Parámetros inválidos o faltantes. Se requieren "nivel" y "id_tecnologico".'
        ]);
        exit();
    }

    // Consulta SQL para obtener los educadores según el nivel y el id_tecnologico
    $queryEducadores = "
        SELECT 
            u.id AS usuario_id, 
            u.nombre, 
            u.apellido, 
            u.correo, 
            u.telefono, 
            n.nombre AS nivel_educativo 
        FROM 
            educadores e 
        LEFT JOIN 
            usuarios u ON e.id_usuario = u.id 
        LEFT JOIN 
            programas p ON e.id_tecnologico = p.id_tecnologico 
        LEFT JOIN 
            niveles n ON p.id_nivel = n.id 
        WHERE 
            n.nombre = ? 
            AND e.id_tecnologico = ?;
    ";

    // Preparar y ejecutar la consulta
    $stmtEducadores = $conn->prepare($queryEducadores);
    if (!$stmtEducadores) {
        throw new Exception("Error al preparar la consulta: " . $conn->error);
    }

    $stmtEducadores->bind_param("si", $nivel, $idTecnologico);
    $stmtEducadores->execute();
    $resultEducadores = $stmtEducadores->get_result();

    // Verificar si se obtuvieron resultados
    if ($resultEducadores->num_rows > 0) {
        $educadores = [];
        while ($educador = $resultEducadores->fetch_assoc()) {
            $educadores[] = $educador;
        }

        // Respuesta exitosa con los datos de los educadores
        echo json_encode([
            'success' => true,
            'data' => $educadores
        ]);
    } else {
        // Respuesta si no se encontraron educadores
        echo json_encode([
            'success' => false,
            'message' => 'No se encontraron educadores para el nivel y tecnológico especificados.'
        ]);
    }

    // Cerrar la conexión y liberar recursos
    $stmtEducadores->close();
    $conn->close();

} catch (Exception $e) {
    // Manejo de errores
    echo json_encode([
        'success' => false,
        'message' => 'Hubo un error al procesar la solicitud.',
        'error_details' => $e->getMessage()
    ]);
}
?>