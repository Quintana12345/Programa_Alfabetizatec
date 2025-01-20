<?php
// Incluir el archivo de conexión a la base de datos
include '../config/conexionDB.php';

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recibir los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
    $curp = isset($_POST['curp']) ? $_POST['curp'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $correo_inst = isset($_POST['correo_inst']) ? $_POST['correo_inst'] : null;
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;
    $rol_id = isset($_POST['rol_id']) ? $_POST['rol_id'] : null;
    $puesto = isset($_POST['puesto']) ? $_POST['puesto'] : null;
    $tipo_participante = isset($_POST['tipo_participante']) ? $_POST['tipo_participante'] : null;
    $modalidad = isset($_POST['modalidad']) ? $_POST['modalidad'] : null;
    $numero_control = isset($_POST['numero_control']) ? $_POST['numero_control'] : '';
    $carrera = isset($_POST['carrera']) ? $_POST['carrera'] : '';
    $id_tecnologico = isset($_POST['id_tecnologico']) ? $_POST['id_tecnologico'] : '';
    $semestre = isset($_POST['semestre']) ? $_POST['semestre'] : '';

    // Validación de campos obligatorios
    $missing_fields = [];

    if (!$nombre) {
        $missing_fields[] = 'nombre';
    }
    if (!$apellido) {
        $missing_fields[] = 'apellido';
    }
    if (!$telefono) {
        $missing_fields[] = 'telefono';
    }
    if (!$correo) {
        $missing_fields[] = 'correo';
    }
    if (!$contrasena) {
        $missing_fields[] = 'contrasena';
    }
    if (!$rol_id) {
        $missing_fields[] = 'rol_id';
    }
    if (!$tipo_participante) {
        $missing_fields[] = 'tipo_participante';
    }
    if (!$modalidad) {
        $missing_fields[] = 'modalidad';
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

    // Cifrar la contraseña antes de almacenarla
    $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);

    // Iniciar la transacción
    $conn->begin_transaction();

    try {
        // Insertar los datos en la tabla 'usuarios'
        $query_usuario = "INSERT INTO usuarios (nombre, apellido, curp, telefono, correo, correo_inst, contrasena, rol_id, puesto)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt_usuario = $conn->prepare($query_usuario);
        // Se ajustan los tipos de datos para la inserción: 'sssssiss' (string, string, string, string, string, int, int)
        $stmt_usuario->bind_param('sssssssis', $nombre, $apellido, $curp, $telefono, $correo, $correo_inst, $contrasena_hash, $rol_id, $puesto);
        $stmt_usuario->execute();

        // Obtener el ID del usuario recién insertado
        $id_usuario = $stmt_usuario->insert_id;

        // Insertar los datos en la tabla 'educadores' usando el ID del usuario insertado
        // Ahora ajustamos bind_param correctamente
        $query_educador = "INSERT INTO educadores (id_usuario, tipo_participante, modalidad, numero_control, carrera, id_tecnologico, semestre)
VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt_educador = $conn->prepare($query_educador);
        $stmt_educador->bind_param('issssii', $id_usuario, $tipo_participante, $modalidad, $numero_control, $carrera, $id_tecnologico, $semestre);
        $stmt_educador->execute();

        // Confirmar la transacción
        $conn->commit();

        // Respuesta exitosa
        echo json_encode([
            'success' => true,
            'message' => 'Datos insertados correctamente.'
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
    $stmt_usuario->close();
    $stmt_educador->close();
    $conn->close();
} else {
    // Si la solicitud no es POST, retornar error
    echo json_encode([
        'success' => false,
        'message' => 'Método de solicitud no válido.'
    ]);
}
