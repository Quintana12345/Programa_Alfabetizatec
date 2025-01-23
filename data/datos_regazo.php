<?php
require '../vendor/autoload.php'; // Autocarga de PhpSpreadsheet
ini_set('memory_limit', '1G');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$inputFileName = './regazo/estado/Rez_educxloc2020_Zac.xlsx'; // Ruta a tu archivo de Excel

// Cargar la hoja de cálculo
$spreadsheet = IOFactory::load($inputFileName);
$worksheet = $spreadsheet->getActiveSheet();

// Variables para almacenar las sumas
$sumaTotal = 0;
$sumaAnafalbetas = 0;

// Iterar sobre las filas
for ($row = 13; $row <= $worksheet->getHighestRow(); $row++) {
    $valorCelda = $worksheet->getCell('M' . $row)->getValue();
    
    // Verificar si la celda está vacía o contiene símbolos no válidos
    if (is_numeric($valorCelda)) {
        $sumaTotal += $valorCelda;

        // Suponiendo que las anafalbetas se determinan por algún criterio (ajustar según sea necesario)
        if ($valorCelda < 10) { // Ajustar la condición según tu criterio
            $sumaAnafalbetas += $valorCelda;
        }
    }
}

echo "Suma total de las celdas M13, M14, etc.: $sumaTotal\n";
echo "Suma de anafalbetas: $sumaAnafalbetas\n";
?>