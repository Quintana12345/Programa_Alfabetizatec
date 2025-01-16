<?php
require 'vendor/autoload.php'; // Carga PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

// Configuración de la base de datos
$host = 'localhost';
$user = 'root';
$pass = ''; // Cambia según tu configuración
$db = 'tecnologicos_programa';

try {
    // Conexión a la base de datos
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        throw new Exception("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Verifica si la tabla existe
    $check_table = $conn->query("SHOW TABLES LIKE 'tecnologicos'");
    if ($check_table->num_rows === 0) {
        throw new Exception("La tabla 'tecnologicos' no existe en la base de datos '$db'.");
    }

    // Ruta del archivo Excel
    $filePath = './tec.xlsx'; // Cambia por la ruta de tu archivo Excel

    // Carga el archivo Excel
    if (!file_exists($filePath)) {
        throw new Exception("El archivo '$filePath' no existe.");
    }
    $spreadsheet = IOFactory::load($filePath); // Carga el archivo Excel
    $sheet = $spreadsheet->getActiveSheet();  // Obtiene la hoja activa

    // Convierte las filas de la hoja a un array
    $rows = $sheet->toArray(null, true, true, true);

    // Procesa las filas (omite la cabecera)
    foreach ($rows as $index => $row) {
        if ($index === 1) continue; // Salta la cabecera (primera fila)

        // Obtiene los valores de las columnas
        $estado = $conn->real_escape_string($row['A']);      // Columna A: Estado
        $nombre = $conn->real_escape_string($row['B']);      // Columna B: Nombre
        $tipo_plantel = $conn->real_escape_string($row['C']); // Columna C: Tipo de plantel
        $programa = $conn->real_escape_string($row['D']);     // Columna D: Programa
        $modalidad = $conn->real_escape_string($row['E']);    // Columna E: Modalidad

        // Verifica si el registro ya existe
        $query_check = "SELECT id FROM tecnologicos WHERE nombre='$nombre' AND programa='$programa' AND estado='$estado'";
        $result_check = $conn->query($query_check);

        if ($result_check === false) {
            throw new Exception("Error al verificar existencia de registros: " . $conn->error);
        }

        if ($result_check->num_rows > 0) {
            echo "Ya existe: $estado - $nombre - $programa<br>";
            continue;
        }

        // Inserta el registro en la base de datos
        $query = "INSERT INTO tecnologicos (estado, nombre, tipo_plantel, programa, modalidad) 
                  VALUES ('$estado', '$nombre', '$tipo_plantel', '$programa', '$modalidad')";

        if ($conn->query($query)) {
            echo "Insertado: $estado - $nombre - $programa<br>";
        } else {
            echo "Error al insertar $estado - $nombre - $programa: " . $conn->error . "<br>";
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Cierra la conexión a la base de datos
    if (isset($conn) && $conn->ping()) {
        $conn->close();
    }
}
?>
