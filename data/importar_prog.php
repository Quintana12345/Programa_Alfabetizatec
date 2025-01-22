<?php
require '../vendor/autoload.php'; // Autocarga de PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

// Conexión a la base de datos
$host = 'localhost';
$username = 'root';
$password = ''; // Cambia según tu configuración
$dbname = 'Alfabetizatec';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Ruta del archivo Excel
$archivoExcel = './datos_prog.xlsx';

try {
    // Leer el archivo Excel
    $spreadsheet = IOFactory::load($archivoExcel);
    $hoja = $spreadsheet->getActiveSheet();
    $filas = $hoja->toArray();

    // Ignorar la primera fila (cabeceras)
    unset($filas[0]);

    foreach ($filas as $fila) {
        // Extraer los datos
        $nombre = $fila[0];
        $apellido_paterno = $fila[1];
        $apellido_materno = $fila[2];
        $curp = $fila[3];
        $correo_inst = $fila[4];
        $telefono = $fila[5];
        $puesto = $fila[6];
        $tipo_institucion = $fila[7];
        $nombre_tecnologico = $fila[8];

        // Buscar el ID del tecnológico
        $sqlTecnologico = "SELECT id FROM tecnologicos WHERE nombre = ?";
        $stmtTecnologico = $conn->prepare($sqlTecnologico);
        $stmtTecnologico->bind_param("s", $nombre_tecnologico);
        $stmtTecnologico->execute();
        $resultado = $stmtTecnologico->get_result();

        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $id_tecnologico = $row['id'];
        } else {
            echo "Error: Tecnológico no encontrado para '$nombre_tecnologico'.<br>";
            continue;
        }

        // Insertar en la tabla usuarios
        $sqlUsuario = "INSERT INTO usuarios (nombre, apellido, curp, telefono, correo_inst, puesto, contrasena, rol_id) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtUsuario = $conn->prepare($sqlUsuario);
        $contrasena = password_hash("password_default", PASSWORD_DEFAULT);
        $rol_id = 2; // Supongamos que el rol por defecto es 2
        $stmtUsuario->bind_param("sssssssi", $nombre, $apellido_paterno, $curp, $telefono, $correo_inst, $puesto, $contrasena, $rol_id);

        if ($stmtUsuario->execute()) {
            // Obtener el ID del último usuario insertado
            $id_usuario = $conn->insert_id;

            // Insertar en coordinadores_programa
            $sqlCoordinador = "INSERT INTO coordinadores_programa (id_usuario, id_tecnologico) VALUES (?, ?)";
            $stmtCoordinador = $conn->prepare($sqlCoordinador);
            $stmtCoordinador->bind_param("ii", $id_usuario, $id_tecnologico);

            if ($stmtCoordinador->execute()) {
                echo "Usuario '$nombre' importado con éxito.<br>";
            } else {
                echo "Error al insertar coordinador para '$nombre'.<br>";
            }
        } else {
            echo "Error al insertar usuario '$nombre'.<br>";
        }
    }
} catch (Exception $e) {
    echo "Error al procesar el archivo Excel: " . $e->getMessage();
}

// Cerrar la conexión
$conn->close();
?>
