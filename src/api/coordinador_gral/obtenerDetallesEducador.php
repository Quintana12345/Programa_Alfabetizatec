<?php
session_start();

// Establecer el tipo de respuesta como JSON
header('Content-Type: application/json');

try {
    // Incluir el archivo de conexión
    include('../../config/conexionDB.php');

    // Obtener la conexión
    $conn = Database::getConnection();

    // Obtener el id del educador (coordinador) desde la URL (GET)
    $educadorId = isset($_GET['id']) ? $_GET['id'] : ''; // Obtener el ID del educador

    // Si no se proporciona el id del educador, devolver error
    if (empty($educadorId)) {
        echo json_encode([
            'success' => false,
            'message' => 'No se proporcionó el ID del educador.'
        ]);
        exit();
    }

    // Si se proporciona el ID del educador, obtener los programas asociados a ese educador
    $queryProgramasEducador = "
        SELECT p.id, p.nombre, p.descripcion, p.inicio_periodo, p.fin_periodo, p.id_nivel, p.id_coordinador
        FROM programas p
        WHERE p.id_coordinador = ?
    ";

    $stmtProgramasEducador = $conn->prepare($queryProgramasEducador);
    $stmtProgramasEducador->bind_param("i", $educadorId);
    $stmtProgramasEducador->execute();
    $resultProgramasEducador = $stmtProgramasEducador->get_result();

    $programas = [];
    while ($programa = $resultProgramasEducador->fetch_assoc()) {
        // Obtener el nombre del nivel asociado al programa
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

        // Agregar el nombre del nivel al programa
        $programa['nivel'] = $nivelNombre;

        // Consultar los estudiantes asociados a ese programa
        $queryEstudiantes = "
            SELECT e.id, 
                   e.nombre, 
                   CONCAT(e.apellidos, ' ', e.segundo_apellido) AS apellidos, 
                   e.domicilio, 
                   e.curp, 
                   e.telefono, 
                   e.correo, 
                   s.status
            FROM estudiantes e
            JOIN solicitudes s ON e.id = s.id_estudiante
            WHERE s.id_programa = ?
        ";

        $stmtEstudiantes = $conn->prepare($queryEstudiantes);
        $stmtEstudiantes->bind_param("i", $programa['id']); // Bindeamos el id del programa
        $stmtEstudiantes->execute();
        $resultEstudiantes = $stmtEstudiantes->get_result();

        $estudiantes = [];
        while ($estudiante = $resultEstudiantes->fetch_assoc()) {
            $estudiantes[] = $estudiante; // Almacenamos cada estudiante en un array
        }

        // Agregar la lista de estudiantes al programa
        $programa['estudiantes'] = $estudiantes;

        // Obtener el nombre del educador (coordinador)
        $queryEducador = "SELECT nombre, apellido FROM usuarios WHERE id = ?";
        $stmtEducador = $conn->prepare($queryEducador);
        $stmtEducador->bind_param("i", $educadorId); // Bindeamos el id del educador
        $stmtEducador->execute();
        $resultEducador = $stmtEducador->get_result();

        $educadorNombre = '';
        if ($resultEducador->num_rows > 0) {
            $educador = $resultEducador->fetch_assoc();
            $educadorNombre = $educador['nombre'] . ' ' . $educador['apellido'];
        }

        // Agregar el nombre del educador al programa
        $programa['educador'] = $educadorNombre;

        $programas[] = $programa; // Almacenamos el programa y su información
    }

    // Enviar la respuesta JSON con los programas, sus estudiantes y el educador
    echo json_encode([
        'success' => true,
        'data' => $programas
    ]);

} catch (Exception $e) {
    // Manejo de errores
    echo json_encode([
        'success' => false,
        'message' => 'Hubo un error al procesar la solicitud.',
        'error_details' => $e->getMessage()
    ]);
}
