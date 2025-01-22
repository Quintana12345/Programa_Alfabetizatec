<?php
// Incluir el archivo de conexión a la base de datos
include '../config/conexionDB.php';
session_start(); // Asegúrate de iniciar la sesión en el backend

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Leer los datos JSON enviados
    $data = json_decode(file_get_contents("php://input"), true);

    // Verificar si los datos fueron recibidos correctamente
    if ($data === null) {
        echo json_encode([
            'success' => false,
            'message' => 'No se recibieron datos válidos.'
        ]);
        exit;
    }

    // Obtener los datos del formulario
    $nombre = isset($data['nombre']) ? $data['nombre'] : '';
    $apellidos = isset($data['apellidos']) ? $data['apellidos'] : '';
    $domicilio = isset($data['domicilio']) ? $data['domicilio'] : '';
    $curp = isset($data['curp']) ? $data['curp'] : '';
    $telefono = isset($data['telefono']) ? $data['telefono'] : '';
    $correo = isset($data['correo']) ? $data['correo'] : null;
    $id_programa = isset($data['programa_estudiante']) ? $data['programa_estudiante'] : null;

    // Validación de campos obligatorios
    $missing_fields = [];

    if (!$nombre) {
        $missing_fields[] = 'nombre';
    }
    if (!$apellidos) {
        $missing_fields[] = 'apellidos';
    }
    if (!$domicilio) {
        $missing_fields[] = 'domicilio';
    }
    if (!$curp) {
        $missing_fields[] = 'curp';
    }
    if (!$telefono) {
        $missing_fields[] = 'telefono';
    }
    if (!$id_programa) {
        $missing_fields[] = 'programa_estudiante';
    }

    // Si hay campos faltantes, devolver error
    if (!empty($missing_fields)) {
        echo json_encode([
            'success' => false,
            'message' => 'Faltan los siguientes campos: ' . implode(', ', $missing_fields)
        ]);
        exit;
    }

    // Obtener la conexión a la base de datos
    $conn = Database::getConnection();

    // Iniciar la transacción
    $conn->begin_transaction();

    try {
        // Insertar los datos en la tabla 'estudiantes'
        $query_estudiante = "INSERT INTO estudiantes (nombre, apellidos, domicilio, curp, telefono, correo)
                             VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_estudiante = $conn->prepare($query_estudiante);
        $stmt_estudiante->bind_param('ssssss', $nombre, $apellidos, $domicilio, $curp, $telefono, $correo);
        $stmt_estudiante->execute();

        // Obtener el ID del estudiante recién creado
        $id_estudiante = $stmt_estudiante->insert_id;

        // Insertar los datos en la tabla 'solicitudes'
        $status = 'pendiente';
        $fecha = date('Y-m-d'); // Fecha actual
        $query_solicitud = "INSERT INTO solicitudes (status, id_programa, id_estudiante, fecha)
                            VALUES (?, ?, ?, ?)";
        $stmt_solicitud = $conn->prepare($query_solicitud);
        $stmt_solicitud->bind_param('siss', $status, $id_programa, $id_estudiante, $fecha);
        $stmt_solicitud->execute();

        // Confirmar la transacción
        $conn->commit();

        // Respuesta exitosa
        echo json_encode([
            'success' => true,
            'message' => 'Estudiante y solicitud registrados correctamente.'
        ]);
    } catch (Exception $e) {
        // En caso de error, revertir la transacción
        $conn->rollback();
        echo json_encode([
            'success' => false,
            'message' => 'Error al insertar los datos: ' . $e->getMessage()
        ]);
    }

    // Cerrar las declaraciones
    $stmt_estudiante->close();
    $stmt_solicitud->close();
    $conn->close();
} else {
    // Si la solicitud no es POST, retornar error
    echo json_encode([
        'success' => false,
        'message' => 'Método de solicitud no válido.'
    ]);
}
