<?php

// Obtener el ID del educador desde la URL
$idEducador = isset($_GET['id']) ? $_GET['id'] : null;

// Verificar si se proporcionó el ID del educador
if (empty($idEducador)) {
    echo json_encode([
        'success' => false,
        'message' => 'No se proporcionó el ID del educador.'
    ]);
    exit();
}

// Obtener los datos JSON enviados en el cuerpo de la solicitud
$datos = json_decode(file_get_contents('php://input'), true);

// Verificar si la decodificación JSON fue exitosa
if ($datos === null) {
    echo json_encode([
        'success' => false,
        'message' => 'No se pudo procesar los datos JSON.'
    ]);
    exit();
}

// Obtener los datos enviados desde el JSON
$apellido = isset($datos['apellido']) ? $datos['apellido'] : '';
$correo = isset($datos['correo']) ? $datos['correo'] : '';
$curp = isset($datos['curp']) ? $datos['curp'] : '';
$nombre = isset($datos['nombre']) ? $datos['nombre'] : '';
$telefono = isset($datos['telefono']) ? $datos['telefono'] : '';

// Inicializar un array para los errores
$errores = [];

// Verificar qué campos faltan
if (empty($apellido)) {
    $errores[] = 'Apellido';
}
if (empty($correo)) {
    $errores[] = 'Correo';
}

if (empty($nombre)) {
    $errores[] = 'Nombre';
}
if (empty($telefono)) {
    $errores[] = 'Teléfono';
}

// Si hay errores, mostrar qué datos faltan
if (count($errores) > 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Faltan los siguientes datos: ' . implode(', ', $errores)
    ]);
    exit();
}

try {
    // Incluir el archivo de conexión
    include('../config/conexionDB.php');
    $conn = Database::getConnection();

    // Preparar la consulta SQL para actualizar los datos del educador
    $query = "
        UPDATE usuarios
        SET nombre = ?, apellido = ?, curp = ?, telefono = ?, correo = ?
        WHERE id = ?
    ";

    // Preparar la consulta
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssssi', $nombre, $apellido, $curp, $telefono, $correo, $idEducador);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Los datos del educador fueron actualizados correctamente.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Hubo un error al actualizar los datos.'
        ]);
    }

    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Hubo un error al procesar la solicitud.',
        'error_details' => $e->getMessage()
    ]);
}
?>
