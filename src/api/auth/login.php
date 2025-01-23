<?php
session_start();

// Establecer el tipo de respuesta como JSON
header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
        if (!$correo || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'Correo electrónico no válido.']);
            exit();
        }

        $contrasena = $_POST['contrasena'];
        if (empty($contrasena)) {
            echo json_encode(['success' => false, 'message' => 'La contraseña es obligatoria.']);
            exit();
        }

        include('../../config/conexionDB.php');
        $conn = Database::getConnection();

        $stmt = $conn->prepare('SELECT id, nombre, apellido, telefono, correo, contrasena, rol_id FROM usuarios WHERE correo = ?');
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $stmt->store_result();


        if ($stmt->num_rows === 0) {
            echo json_encode(['success' => false, 'message' => 'Correo electrónico no registrado.']);
            exit();
        }

        $stmt->bind_result($id, $nombre, $apellido, $telefono, $correo_db, $contrasena_db, $rol_id);
        $stmt->fetch();

        if (!password_verify($contrasena, $contrasena_db)) {
            echo json_encode(['success' => false, 'message' => 'Contraseña incorrecta.']);
            exit();
        }

        // Buscar el id_tecnologico o id_region
        $tecnico_stmt = $conn->prepare('SELECT id_tecnologico FROM coordinadores_programa WHERE id_usuario = ?');
        $tecnico_stmt->bind_param('i', $id);
        $tecnico_stmt->execute();
        $tecnico_stmt->store_result();

        if ($tecnico_stmt->num_rows > 0) {
            $tecnico_stmt->bind_result($id_tecnologico);
            $tecnico_stmt->fetch();
            $id_region = null; // No aplica región
        } else {
            $regional_stmt = $conn->prepare('SELECT id_region FROM coordinadores_regionales WHERE id_usuario = ?');
            $regional_stmt->bind_param('i', $id);
            $regional_stmt->execute();
            $regional_stmt->store_result();

            if ($regional_stmt->num_rows > 0) {
                $regional_stmt->bind_result($id_region);
                $regional_stmt->fetch();
                $id_tecnologico = null; // No aplica tecnológico
            } else {
                $id_tecnologico = null;
                $id_region = null; // No se encuentra en ninguna tabla
            }
        }

        // Obtener el nombre del Tecnológico si aplica
        if ($id_tecnologico !== null) {
            $tecnologico_stmt = $conn->prepare('SELECT nombre FROM tecnologicos WHERE id = ?');
            $tecnologico_stmt->bind_param('i', $id_tecnologico);
            $tecnologico_stmt->execute();
            $tecnologico_stmt->store_result();

            if ($tecnologico_stmt->num_rows > 0) {
                $tecnologico_stmt->bind_result($nombre_tecnologico);
                $tecnologico_stmt->fetch();
            } else {
                $nombre_tecnologico = "Sin asignar";
            }
        } else {
            $nombre_tecnologico = "No aplica";
        }

        // Obtener el nombre de la región si aplica
        if ($id_region !== null) {
            $region_stmt = $conn->prepare('SELECT nombre FROM regiones WHERE id = ?');
            $region_stmt->bind_param('i', $id_region);
            $region_stmt->execute();
            $region_stmt->store_result();

            if ($region_stmt->num_rows > 0) {
                $region_stmt->bind_result($nombre_region);
                $region_stmt->fetch();
            } else {
                $nombre_region = "Sin asignar";
            }
        } else {
            $nombre_region = "No aplica";
        }

        // Iniciar sesión y almacenar los datos del usuario
        $_SESSION['id'] = $id;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['correo'] = $correo;
        $_SESSION['rol_id'] = $rol_id;
        $_SESSION['id_tecnologico'] = $id_tecnologico;
        $_SESSION['id_region'] = $id_region;
        $_SESSION['nombre_tecnologico'] = $nombre_tecnologico;
        $_SESSION['nombre_region'] = $nombre_region;

        // Consulta el nombre del rol y nivel de permiso
        $rol_stmt = $conn->prepare('SELECT nombre, nivel_permiso FROM roles WHERE id = ?');
        $rol_stmt->bind_param('i', $rol_id);
        $rol_stmt->execute();
        $rol_stmt->bind_result($rol_nombre, $nivel_permiso);
        $rol_stmt->fetch();

        // Enviar la respuesta al cliente
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
                'id_tecnologico' => $id_tecnologico,
                'id_region' => $id_region,
                'nombre_tecnologico' => $nombre_tecnologico,
                'nombre_region' => $nombre_region
            ],
            'nivel_permiso' => $nivel_permiso
        ]);
        exit();
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Hubo un error al procesar la solicitud.',
        'error_details' => $e->getMessage()
    ]);
    exit();
}
