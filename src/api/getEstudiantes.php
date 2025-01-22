<?php
header('Content-Type: application/json');

// Incluir archivo de configuración de la base de datos
include '../config/conexionDB.php';

try {
    $conn = Database::getConnection();

    // Obtener el id del Instituto desde los parámetros de la solicitud
    $id_instituto = isset($_GET['id_instituto']) ? (int)$_GET['id_instituto'] : 0;

    if ($id_instituto > 0) {
        // Consulta para obtener los estudiantes asociados a un Instituto, utilizando la tabla 'solicitudes' y 'programas'
        $query = "
            SELECT 
                e.id, 
                e.nombre, 
                e.apellidos, 
                e.domicilio, 
                e.curp, 
                e.telefono, 
                e.correo
            FROM 
                estudiantes e
            INNER JOIN 
                solicitudes s ON e.id = s.id_estudiante
            INNER JOIN 
                programas p ON s.id_programa = p.id
            WHERE 
                p.id_tecnologico = ?
        ";

        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("i", $id_instituto); // Enlazar el parámetro
            $stmt->execute();

            // Obtener los resultados
            $result = $stmt->get_result();
            $estudiantes = $result->fetch_all(MYSQLI_ASSOC);

            // Devolver los resultados como JSON
            echo json_encode([
                'success' => true,
                'data' => $estudiantes
            ]);
        } else {
            throw new Exception("Error en la preparación de la consulta: " . $conn->error);
        }
    } else {
        // Si no se recibió un id_instituto válido
        echo json_encode([
            'success' => false,
            'error' => 'El ID del Instituto no es válido o no fue proporcionado.',
            'dato' => $id_instituto
        ]);
    }
} catch (Exception $e) {
    // Capturar cualquier error
    echo json_encode([
        'success' => false,
        'error' => 'Error: ' . $e->getMessage()
    ]);
} finally {
    // Cerrar conexión si fue abierta
    if (isset($conn) && $conn->ping()) {
        $conn->close();
    }
}
