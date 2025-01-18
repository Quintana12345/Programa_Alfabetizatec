<?php
require '../vendor/autoload.php'; // Carga PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

// Configuración de la base de datos
$host = 'localhost';
$user = 'root';
$pass = ''; // Cambia según tu configuración
$db = 'alfabetizatec';
$conn = new mysqli($host, $user, password: $pass, database: $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Cargar el archivo Excel
$filePath = './tec.xlsx'; // Cambia esto por la ruta de tu archivo
$spreadsheet = IOFactory::load($filePath);
$worksheet = $spreadsheet->getActiveSheet();

// Iterar por las filas del Excel
foreach ($worksheet->getRowIterator(2) as $row) { // Empieza en la fila 2 (asumiendo que la fila 1 tiene encabezados)
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);

    $data = [];
    foreach ($cellIterator as $cell) {
        $data[] = $cell->getValue();
    }

    // Extraer datos relevantes
    $entidad = $data[0];          // Columna A: Entidad
    $nombreInstituto = $data[1];  // Columna B: Nombre del Instituto
    $modalidad = $data[4];        // Columna E: Modalidad

    // Obtener el ID del estado desde la tabla "estados"
    $queryEstado = "SELECT id FROM estados WHERE nombre = ?";
    $stmt = $conn->prepare($queryEstado);
    $stmt->bind_param("s", $entidad);
    $stmt->execute();
    $resultEstado = $stmt->get_result();

    if ($resultEstado->num_rows > 0) {
        $estado = $resultEstado->fetch_assoc();
        $estadoId = $estado['id'];

        // Verificar si ya existe el nombre del instituto
        $queryCheck = "SELECT id FROM tecnologicos WHERE nombre = ? AND estado_id = ?";
        $stmtCheck = $conn->prepare($queryCheck);
        $stmtCheck->bind_param("si", $nombreInstituto, $estadoId);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows === 0) {
            // Insertar en la tabla tecnológica
            $queryInsert = "INSERT INTO tecnologicos (nombre, modalidad, estado_id) VALUES (?, ?, ?)";
            $stmtInsert = $conn->prepare($queryInsert);
            $stmtInsert->bind_param("ssi", $nombreInstituto, $modalidad, $estadoId);

            if ($stmtInsert->execute()) {
                echo "Registro insertado: $nombreInstituto, $modalidad, Estado ID: $estadoId\n";
            } else {
                echo "Error al insertar: " . $stmtInsert->error . "\n";
            }
        } else {
            echo "El instituto '$nombreInstituto' ya existe en la base de datos.\n";
        }
    } else {
        echo "Estado no encontrado para: $entidad\n";
    }
}

// Cerrar conexión
$conn->close();
?>
