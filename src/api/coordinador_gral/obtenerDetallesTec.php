<?php
session_start();

// Establecer el tipo de respuesta como JSON
header('Content-Type: application/json');

try {
    // Incluir el archivo de conexión
    include('../../config/conexionDB.php');

    // Obtener la conexión
    $conn = Database::getConnection();

    // Obtener el id del tecnológico desde la URL (GET)
    $tecnologicoId = isset($_GET['id']) ? $_GET['id'] : '';

    // Si no se proporciona el id del tecnológico, devolver error
    if (empty($tecnologicoId)) {
        echo json_encode([
            'success' => false,
            'message' => 'No se proporcionó el ID del tecnológico.'
        ]);
        exit();
    }

    // Consulta para obtener los detalles de un tecnológico por su id
    $queryTecnologico = "
        SELECT t.id AS tecnologico_id, t.nombre AS tecnologico_nombre, e.id AS estado_id, e.nombre AS estado_nombre,
               t.director, t.modalidad
        FROM tecnologicos t
        LEFT JOIN estados e ON t.estado_id = e.id
        WHERE t.id = ?
    ";

    $stmt = $conn->prepare($queryTecnologico);
    $stmt->bind_param("i", $tecnologicoId); // Bindeamos el id del tecnológico
    $stmt->execute();
    $resultTecnologico = $stmt->get_result();

    // Verificar si se obtuvo el resultado
    if ($resultTecnologico->num_rows > 0) {
        $data = $resultTecnologico->fetch_assoc(); // Obtener los datos del tecnológico

        // Obtener los programas asociados al tecnológico
        $queryProgramas = "
            SELECT p.id, p.nombre, p.descripcion, p.inicio_periodo, p.fin_periodo, p.id_nivel
            FROM programas p
            WHERE p.id_tecnologico = ?
        ";

        $stmtProgramas = $conn->prepare($queryProgramas);
        $stmtProgramas->bind_param("i", $tecnologicoId); // Bindeamos el id del tecnológico
        $stmtProgramas->execute();
        $resultProgramas = $stmtProgramas->get_result();

        // Almacenar los programas en un array
        $programas = [];
        while ($programa = $resultProgramas->fetch_assoc()) {
            // Obtener el nombre del nivel
            $nivelId = $programa['id_nivel'];
            $queryNivel = "SELECT nombre FROM niveles WHERE id = ?";
            $stmtNivel = $conn->prepare($queryNivel);
            $stmtNivel->bind_param("i", $nivelId); // Bindeamos el id del nivel
            $stmtNivel->execute();
            $resultNivel = $stmtNivel->get_result();

            $nivelNombre = '';
            if ($resultNivel->num_rows > 0) {
                $nivel = $resultNivel->fetch_assoc();
                $nivelNombre = $nivel['nombre'];
            }

            // Aquí agregamos el nombre del nivel al array de cada programa
            $programas[] = [
                'id' => $programa['id'],
                'nombre' => $programa['nombre'],
                'descripcion' => $programa['descripcion'],
                'inicio_periodo' => $programa['inicio_periodo'],
                'fin_periodo' => $programa['fin_periodo'],
                'nivel' => $nivelNombre, // Nombre del nivel
            ];
        }

        // Agregar los programas a la respuesta
        $data['programas'] = $programas;

        // Enviar la respuesta JSON con los datos
        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    } else {
        // Si no se encuentran resultados para el id proporcionado
        echo json_encode([
            'success' => false,
            'message' => 'No se encontró el tecnológico solicitado.'
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
