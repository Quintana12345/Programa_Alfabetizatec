<?php
// Conexión a la base de datos
$host = "localhost";
$dbname = "Alfabetizatec";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Cargar la librería de PHPExcel (puedes usar PhpSpreadsheet si es más moderno)
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Leer el archivo Excel
$file = "tec.xlsx"; // Reemplaza con tu archivo
$spreadsheet = IOFactory::load($file);
$sheet = $spreadsheet->getActiveSheet();
$data = $sheet->toArray();

// Normalizar nombres (ejemplo: eliminando prefijos para comparación)
function normalizeName($name)
{
    $name = strtolower($name);
    $name = str_replace(["instituto tecnológico de", "i.t.", "tecnológico de"], "", $name);
    return trim($name);
}

// Insertar los tecnológicos no duplicados
foreach ($data as $index => $row) {
    if ($index == 0) continue; // Saltar la primera fila (encabezados)

    $nombre = $row[0];
    $tipo_de_institucion = $row[1];
    $programa = $row[2];
    $modalidad = $row[3];

    // Normalizar el nombre
    $nombreNormalizado = normalizeName($nombre);

    // Verificar si ya existe en la base de datos
    $stmt = $conn->prepare("SELECT id FROM tecnologicos WHERE LOWER(REPLACE(nombre, 'I.T.', '')) LIKE :nombre");
    $stmt->execute(['nombre' => "%$nombreNormalizado%"]);
    $exists = $stmt->fetch();

    if (!$exists) {
        // Agregar el prefijo "I.T. de" al nombre
        $nombreConPrefijo = "I.T. de " . ucfirst($nombreNormalizado);

        // Insertar el tecnológico
        $insertStmt = $conn->prepare("INSERT INTO tecnologicos (nombre, tipo_de_institucion, modalidad) VALUES (:nombre, :tipo, :modalidad)");
        $insertStmt->execute([
            'nombre' => $nombreConPrefijo,
            'tipo' => $tipo_de_institucion,
            'modalidad' => $modalidad
        ]);

        echo "Insertado: $nombreConPrefijo\n";
    } else {
        echo "Ya existe: $nombre\n";
    }
}
