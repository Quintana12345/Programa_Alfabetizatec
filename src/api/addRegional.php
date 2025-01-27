<?php
// Incluir el archivo de conexión a la base de datos
include '../config/conexionDB.php';

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtener los datos enviados en formato JSON
    $data = json_decode(file_get_contents('php://input'), true);

    // Verificar si la decodificación fue exitosa
    if (!$data) {
        echo json_encode([
            'success' => false,
            'message' => 'Datos JSON inválidos.'
        ]);
        exit;
    }

    // Asignar los valores del JSON a las variables
    $nombre = isset($data['nombre']) ? $data['nombre'] : '';
    $apellido = isset($data['apellido']) ? $data['apellido'] : '';
    $curp = isset($data['curp']) ? $data['curp'] : '';
    $telefono = isset($data['telefono']) ? $data['telefono'] : '';
    $correo = isset($data['correo']) ? $data['correo'] : '';
    $correo_inst = isset($data['correo_inst']) ? $data['correo_inst'] : '';
    $contrasena = isset($data['contrasena']) ? $data['contrasena'] : '';
    $rol_id = isset($data['rol_id']) ? $data['rol_id'] : '';
    $id_region = isset($data['id_region']) ? $data['id_region'] : ''; // Nueva variable para la región
    $id_tecnologico = isset($data['id_tecnologico']) ? $data['id_tecnologico'] : ''; // ID Tecnológico

    // Validación de campos obligatorios
    $missing_fields = [];
    if (!$nombre) $missing_fields[] = 'nombre';
    if (!$apellido) $missing_fields[] = 'apellido';
    if (!$telefono) $missing_fields[] = 'telefono';
    if (!$correo) $missing_fields[] = 'correo';
    if (!$contrasena) $missing_fields[] = 'contrasena';
    if (!$rol_id) $missing_fields[] = 'rol_id';
    if (!$id_region && !$id_tecnologico) $missing_fields[] = 'id_region o id_tecnologico';

    if (!empty($missing_fields)) {
        echo json_encode([
            'success' => false,
            'message' => 'Faltan los siguientes campos: ' . implode(', ', $missing_fields)
        ]);
        exit;
    }

    // Obtener la conexión a la base de datos
    $conn = Database::getConnection();

    // Cifrar la contraseña
    $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);

    // Iniciar la transacción
    $conn->begin_transaction();

    try {
        // Insertar los datos en la tabla 'usuarios'
        $query_usuario = "INSERT INTO usuarios (nombre, apellido, curp, telefono, correo, correo_inst, contrasena, rol_id)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_usuario = $conn->prepare($query_usuario);
        $stmt_usuario->bind_param('sssssssi', $nombre, $apellido, $curp, $telefono, $correo, $correo_inst, $contrasena_hash, $rol_id);
        $stmt_usuario->execute();

        // Obtener el ID del usuario recién insertado
        $id_usuario = $stmt_usuario->insert_id;

        // Verificar si se recibió id_region o id_tecnologico
        if ($id_region) {
            // Insertar los datos en la tabla 'coordinadores_regionales'
            $query_coordinador = "INSERT INTO coordinadores_regionales (id_usuario, id_region)
                                  VALUES (?, ?)";
            $stmt_coordinador = $conn->prepare($query_coordinador);
            $stmt_coordinador->bind_param('ii', $id_usuario, $id_region);
            $stmt_coordinador->execute();
        } elseif ($id_tecnologico) {
            // Insertar los datos en la tabla 'coordinadores_programa'
            $query_coordinador_programa = "INSERT INTO coordinadores_programa (id_usuario, id_tecnologico)
                                          VALUES (?, ?)";
            $stmt_coordinador_programa = $conn->prepare($query_coordinador_programa);
            $stmt_coordinador_programa->bind_param('ii', $id_usuario, $id_tecnologico);
            $stmt_coordinador_programa->execute();
        }

        // Confirmar la transacción
        $conn->commit();

        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'message' => 'Coordinador agregado correctamente.'
        ]);
        
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conn->rollback();
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => 'Error al insertar los datos: ' . $e->getMessage()
        ]);
    }

    // Cerrar las declaraciones
    $stmt_usuario->close();
    if (isset($stmt_coordinador)) $stmt_coordinador->close();
    if (isset($stmt_coordinador_programa)) $stmt_coordinador_programa->close();
    $conn->close();
} else {
    // Si la solicitud no es POST
    echo json_encode([
        'success' => false,
        'message' => 'Método de solicitud no válido.'
    ]);
}
?>
