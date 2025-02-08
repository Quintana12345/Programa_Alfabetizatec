<?php
include '../config/conexionDB.php';
session_start(); // Asegúrate de iniciar la sesión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $primer_apellido = isset($_POST['primer_apellido']) ? $_POST['primer_apellido'] : '';
    $segundo_apellido = isset($_POST['segundo_apellido']) ? $_POST['segundo_apellido'] : '';
    $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';
    $telefono = isset($_POST['telefono']) ? str_replace(' ', '', $_POST['telefono']) : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $correo_inst = isset($_POST['correo_inst']) ? $_POST['correo_inst'] : '';
    $escolaridad = isset($_POST['escolaridad']) ? $_POST['escolaridad'] : '';
    $ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : '';
    $rol = isset($_POST['rol']) ? $_POST['rol'] : '';
    $fecha_registro = isset($_POST['fecha_registro']) ? $_POST['fecha_registro'] : '';
    $alianza = isset($_POST['alianza']) ? $_POST['alianza'] : '';
    $subproyecto = isset($_POST['subproyecto']) ? $_POST['subproyecto'] : '';
    $tipo_vinculacion = isset($_POST['tipo_vinculacion']) ? $_POST['tipo_vinculacion'] : '';
    $puesto = '';
    $tipo_participante = isset($_POST['tipo_participante']) ? $_POST['tipo_participante'] : '';
    $modalidad = isset($_POST['modalidad']) ? $_POST['modalidad'] : '';
    $carrera = isset($_POST['carrera']) ? intval($_POST['carrera']) : NULL; // Convertir a entero
    $semestre = isset($_POST['semestre']) ? intval($_POST['semestre']) : 0; // Convertir a entero
    $rol_id = isset($_POST['rol_id']) ? intval($_POST['rol_id']) : 4; // Convertir a entero
    $id_tecnologico = isset($_SESSION['id_tecnologico']) ? intval($_SESSION['id_tecnologico']) : NULL; // Obtener de sesión
    $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : '';
    $entidad_nacimiento = isset($_POST['entidad_nacimiento']) ? $_POST['entidad_nacimiento'] : '';
    $curp = isset($_POST['curp']) ? $_POST['curp'] : '';
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $depedencia = isset($_POST['depedencia']) ? $_POST['depedencia'] : '';
    $estado_civil = isset($_POST['estado_civil']) ? $_POST['estado_civil'] : '';
    $num_hijos = isset($_POST['num_hijos']) ? $_POST['num_hijos'] : '';

    // Validación de campos obligatorios
    $missing_fields = [];
    $required_fields = ['nombre', 'telefono', 'correo', 'tipo_participante', 'modalidad'];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }

    if (!empty($missing_fields)) {
        echo json_encode([
            'success' => false,
            'message' => 'Faltan los siguientes campos: ' . implode(', ', $missing_fields)
        ]);
        exit;
    }

    $conn = Database::getConnection();
    $contrasena_hash = '$2y$10$Tlx2JQtCvLDValQloBiKSuk/qp5owPEgdVTRwO4e0TYYnuGXL5Ui.';

    $conn->begin_transaction();

    try {
        // Construir apellido completo
        $apellido = trim($primer_apellido . " " . $segundo_apellido);

        // Insertar usuario
        $query_usuario = "INSERT INTO usuarios (nombre, apellido, fecha_nacimiento, telefono, correo, correo_inst, contrasena, rol_id, puesto)
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt_usuario = $conn->prepare($query_usuario);
        $stmt_usuario->bind_param(
            'sssssssss',
            $nombre,
            $apellido,
            $fecha_nacimiento,
            $telefono,
            $correo,
            $correo_inst,
            $contrasena_hash,
            $rol_id,
            $puesto
        );
        $stmt_usuario->execute();
        $id_usuario = $stmt_usuario->insert_id;

        // Insertar educador
        $query_educador = "INSERT INTO educadores (
            id_usuario, tipo_participante, modalidad, 
            id_tecnologico, semestre, nacionalidad, 
            entidad_nacimiento, curp, sexo, estado_civil, num_hijos,
            escolaridad, ocupacion, fecha_registro, alianza, 
            subproyecto, tipo_vinculacion, dependencia
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

        $stmt_educador = $conn->prepare($query_educador);
        $stmt_educador->bind_param(
            'isssiissssssssssss',
            $id_usuario,
            $tipo_participante,
            $modalidad,
            $id_tecnologico,
            $semestre,
            $nacionalidad,
            $entidad_nacimiento,
            $curp,
            $sexo,
            $estado_civil,
            $num_hijos,
            $escolaridad,
            $ocupacion,
            $fecha_registro,
            $alianza,
            $subproyecto,
            $tipo_vinculacion,
            $depedencia
        );

        $stmt_educador->execute();
        
        $conn->commit();

        echo json_encode([
            'success' => true,
            'message' => 'Datos insertados correctamente.'
        ]);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode([
            'success' => false,
            'message' => 'Error al insertar los datos: ' . $e->getMessage()
        ]);
    } finally {
        if (isset($stmt_usuario)) $stmt_usuario->close();
        if (isset($stmt_educador)) $stmt_educador->close();
        $conn->close();
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Método de solicitud no válido.'
    ]);
}