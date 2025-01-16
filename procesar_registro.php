<?php
// Incluir el archivo de conexión
include('conexion.php');

// Obtener los datos del formulario
$instituto_id = $_POST['instituto_id'];  // Ahora recibimos instituto_id desde el formulario
$nombre_responsable = $_POST['nombre_responsable'];
$puesto = $_POST['puesto'];
$telefono_responsable = $_POST['telefono_responsable'];
$correo_institucional = $_POST['correo_institucional'];
$correo_personal = $_POST['correo_personal'];
$tipo_participante = $_POST['tipo_participante'];

// Variables adicionales basadas en el tipo de participante
$nombre_participante = '';
$telefono_participante = '';
$direccion_participante = '';
$modalidad_participacion = '';



if ($tipo_participante == 'estudiante') {
    $nombre_participante = $_POST['nombre_estudiante'];
    $telefono_participante = $_POST['telefono_estudiante'];
    $direccion_participante = $_POST['direccion_estudiante'];
    $modalidad_participacion = $_POST['modalidad_participacion'];
} elseif ($tipo_participante == 'docente') {
    $nombre_participante = $_POST['nombre_docente'];
    $telefono_participante = $_POST['telefono_docente'];
    $direccion_participante = $_POST['direccion_docente'];
    $modalidad_participacion = $_POST['modalidad_docente'];
} elseif ($tipo_participante == 'voluntario') {
    $nombre_participante = $_POST['nombre_voluntario'];
    $telefono_participante = $_POST['telefono_voluntario'];
    $direccion_participante = $_POST['direccion_voluntario'];
    $modalidad_participacion = $_POST['modalidad_voluntario'];
}

// Generar la consulta SQL para insertar los datos
$sql = "INSERT INTO participantes (instituto_id, tipo_participante, nombre, telefono, direccion, modalidad_participacion)
        VALUES ('$instituto_id', '$tipo_participante', '$nombre_participante', '$telefono_participante', '$direccion_participante', '$modalidad_participacion')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Registro guardado correctamente');
        window.location.href = 'participante.php';
    </script>";
} else {
    echo "<script>
        alert('Error al guardar el registro: " . $conn->error . "');
        window.location.href = 'participante.php';
    </script>";
}

// Cerrar la conexión
$conn->close();
?>
