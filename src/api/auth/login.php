<?php
session_start();

// Establecer el tipo de respuesta como JSON
header('Content-Type: application/json');

try {
    // Verificar si el formulario ha sido enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitizar y validar los datos del formulario
        $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
        if (!$correo || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo json_encode([
                'success' => false,
                'message' => 'Correo electrónico no válido.'
            ]);
            exit();
        }

        // Obtener la contraseña ingresada por el usuario
        $contrasena = $_POST['contrasena'];  // Se obtiene la contraseña del formulario
        if (empty($contrasena)) {
            echo json_encode([
                'success' => false,
                'message' => 'La contraseña es obligatoria.'
            ]);
            exit();
        }

        // Incluir el archivo de conexión
        include('../../config/conexionDB.php');

        // Obtener la conexión
        $conn = Database::getConnection();

        // Preparar la consulta para evitar inyecciones SQL
        $stmt = $conn->prepare('SELECT id, nombre, apellido, telefono, correo, contrasena, rol_id FROM usuarios WHERE correo = ?');
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $stmt->store_result();

        // Verificar si el correo existe
        if ($stmt->num_rows === 0) {
            echo json_encode([
                'success' => false,
                'message' => 'Correo electrónico no registrado.'
            ]);
            exit();
        }

        // Vincular los resultados
        $stmt->bind_result($id, $nombre, $apellido, $telefono, $correo_db, $contrasena_db, $rol_id);
        $stmt->fetch();

        // Verificar la contraseña
        if (!password_verify($contrasena, $contrasena_db)) {
            echo json_encode([
                'success' => false,
                'message' => 'Contraseña incorrecta.'
            ]);
            exit();
        }

        // Obtener el id_tecnologico del coordinador
        $tecnico_stmt = $conn->prepare('SELECT id_tecnologico FROM coordinadores_programa WHERE id_usuario = ?');
        $tecnico_stmt->bind_param('i', $id);
        $tecnico_stmt->execute();
        $tecnico_stmt->store_result();

        if ($tecnico_stmt->num_rows > 0) {
            $tecnico_stmt->bind_result($id_tecnologico);
            $tecnico_stmt->fetch();
        } else {
            $id_tecnologico = null;  // Si no se encuentra, asignar null o un valor por defecto
        }

        // Obtener el nombre del Tecnológico si existe
        $tecnologico_stmt = $conn->prepare('SELECT nombre FROM tecnologicos WHERE id = ?');
        $tecnologico_stmt->bind_param('i', $id_tecnologico);
        $tecnologico_stmt->execute();
        $tecnologico_stmt->store_result();

        if ($tecnologico_stmt->num_rows > 0) {
            $tecnologico_stmt->bind_result($nombre_tecnologico);
            $tecnologico_stmt->fetch();
        } else {
            $nombre_tecnologico = "qpddd";  // Si no se encuentra, asignar un valor por defecto
        }

        // Iniciar sesión y almacenar los datos del usuario
        $_SESSION['id'] = $id;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['correo'] = $correo;
        $_SESSION['rol_id'] = $rol_id;
        $_SESSION['id_tecnologico'] = $id_tecnologico;
        $_SESSION['nombre_tecnologico'] = $nombre_tecnologico;

        // Consulta el nombre del rol y el nivel de permiso
        $rol_stmt = $conn->prepare('SELECT nombre, nivel_permiso FROM roles WHERE id = ?');
        $rol_stmt->bind_param('i', $rol_id);
        $rol_stmt->execute();
        $rol_stmt->bind_result($rol_nombre, $nivel_permiso);
        $rol_stmt->fetch();

        // Enviar los datos de sesión junto con el nivel de permiso al cliente
        echo json_encode([
            'success' => true,
            'message' => 'Inicio de sesión exitoso.',
            'user' => [
                'id' => $id,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'telefono' => $telefono,
                'correo' => $correo,
                'rol_id' => $rol_id,
                'id_tecnologico' => $id_tecnologico,  // Agregar el id_tecnologico a la respuesta
                'nombre_tecnologico' => $nombre_tecnologico  // Agregar el nombre del Tecnológico
            ],
            'nivel_permiso' => $nivel_permiso
        ]);
        exit();
    }
} catch (Exception $e) {
    // En caso de error, enviar un mensaje con los detalles del error
    echo json_encode([
        'success' => false,
        'message' => 'Hubo un error al procesar la solicitud.',
        'error_details' => $e->getMessage()
    ]);
    exit();
}
?>
